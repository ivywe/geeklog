<?php

namespace Geeklog;

use InvalidArgumentException;

/**
 * Class Log
 * @package Geeklog
 */
abstract class Log
{
    const MAX_RETRY = 3;
    const RETRY_WAIT = 100000;

    private static $isInitialized = false;

    /**
     * @var string
     */
    private static $pathToLogDir;

    /**
     * @var string
     * @see https://www.php.net/manual/en/function.strftime.php
     */
    private static $timeStampFormat = '%c';

    /**
     * Initialize the Log class
     *
     * @param  string  $pathToLogDir
     * @throws InvalidArgumentException
     */
    public static function init($pathToLogDir)
    {
        if (self::$isInitialized) {
            return;
        }

        $pathToLogDir = rtrim($pathToLogDir, '/\\') . DIRECTORY_SEPARATOR;
        if (!is_dir($pathToLogDir)) {
            throw new InvalidArgumentException(__METHOD__ . ': the path given is invalid');
        }

        self::$pathToLogDir = $pathToLogDir;
        self::$isInitialized = true;
    }

    /**
     * Set timestamp format
     *
     * @param  string  $format
     * @see https://www.php.net/manual/en/function.strftime.php
     */
    public static function setTimeStampFormat($format)
    {
        // On Windows, strftime() could return false if you specify an invalid format
        if (@strftime($format) !== false) {
            self::$timeStampFormat = $format;
        }
    }

    /**
     * Return timestamp format
     *
     * @return string
     * @see https://www.php.net/manual/en/function.strftime.php
     */
    public static function getTimeStampFormat()
    {
        return self::$timeStampFormat;
    }

    /**
     * Format timestamp
     *
     * @param  int  $timestamp
     * @return string
     */
    public static function formatTimeStamp($timestamp = null)
    {
        if ($timestamp === null) {
            $timestamp = time();
        }

        return strftime(self::$timeStampFormat, $timestamp);
    }

    /**
     * Check a log file name
     *
     * @param  string  $fileName
     * @return string
     */
    private static function checkPath($fileName)
    {
        $path = self::$pathToLogDir . strtolower(basename($fileName));
        if (!is_readable($path)) {
            $path = self::$pathToLogDir . 'error.log';
        }

        return $path;
    }

    /**
     * Clear a log file
     *
     * @param  string  $fileName  e.g. 'error.log', 'access.log', 'spamx.log'
     * @return bool
     */
    public static function clear($fileName)
    {
        $path = self::checkPath($fileName);

        for ($i = 0; $i < self::MAX_RETRY; $i++) {
            $timestamp = self::formatTimeStamp();
            if (@file_put_contents($path, "{$timestamp} - Log File Cleared " . PHP_EOL, LOCK_EX) !== false) {
                return true;
            }

            usleep(self::RETRY_WAIT);
        }

        // Couldn't lock the log file for write access
        return false;
    }

    /**
     * Add an entry to a log file
     *
     * @param  string  $entry
     * @param  string  $fileName
     * @return bool
     */
    public static function addEntry($entry, $fileName = 'error.log')
    {
        if (empty($entry)) {
            return true;
        }

        // Replace PHP start and end tags
        $entry = str_replace(['<?', '?>'], ['(@', '@)'], $entry);
        $fileName = strtolower(basename($fileName));
        $path = self::checkPath($fileName);
        $timestamp = self::formatTimeStamp();
        $remoteAddress = Input::server('REMOTE_ADDR', '?');

        if ($fileName === 'access.log') {
            $uid = Session::getUid();
            $byUser = ($uid > Session::ANON_USER_ID)
                ? $uid . '@' . $remoteAddress
                : 'anon@' . $remoteAddress;
            $entry = "{$timestamp} ({$byUser}) - {$entry}" . PHP_EOL;
        } else {
            // for "error.log" and the others
            $entry = "{$timestamp} - {$remoteAddress} - {$entry}" . PHP_EOL;
        }

        if (@file_put_contents($path, $entry, FILE_APPEND || LOCK_EX) !== false) {
            return true;
        } elseif ($fileName !== 'error.log') {
            self::addEntry('Error, could not write to the log file "' . $fileName . '"', 'error.log');

            return false;
        } else {
            die('Error, could not write to the log file "' . $fileName . '"');
        }
    }

    /**
     * Return the contents of a log file
     *
     * @param  string  $fileName
     * @return false|string
     */
    public static function getContents($fileName)
    {
        $path = self::checkPath($fileName);

        return @file_get_contents($path);
    }

    /**
     * Truncate the long file
     *
     * @param  string  $fileName
     * @param  int     $ceiling  max size of the log file in bytes
     * @return bool
     */
    public static function truncate($fileName, $ceiling)
    {
        // Check arguments
        $path = self::checkPath($fileName);
        $ceiling = (int) $ceiling;
        if ($ceiling < 50) {
            return true;
        }

        // Check file size
        $fileSize = @filesize($path);
        if ($fileSize === false) {
            return false;
        } elseif ($fileSize <= $ceiling) {
            // The log file has not grown too large
            return true;
        }

        // Open the log file
        $fp = @fopen($path, 'rb');
        if ($fp === false) {
            return false;
        }

        // Search for the offset to meet the condition
        $retval = false;
        $hasRead = 0;

        while (!feof($fp)) {
            $line = fgets($fp);

            if ($line === false) {
                break;
            } else {
                $hasRead += strlen($line);
                if ($fileSize - $hasRead < $ceiling) {
                    $retval = true;
                    break;
                }
            }
        }

        // Fetch the rest of the file
        $remainder = '';

        if ($retval) {
            while (!feof($fp)) {
                $line = fgets($fp);

                if ($line === false) {
                    break;
                } else {
                    $remainder .= $line;
                }
            }
        }

        if (!fclose($fp)) {
            return false;
        }

        // Write the content back into the log file
        if ($retval) {
            $timestamp = self::formatTimeStamp();
            $remainder .= "{$timestamp} - Log File Truncated " . PHP_EOL;
            $retval = (@file_put_contents($path, $remainder, LOCK_EX) !== false);
        }

        return $retval;
    }
}
