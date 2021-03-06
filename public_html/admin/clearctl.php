<?php

// +--------------------------------------------------------------------------+
// | Geeklog 2.2                                                              |
// +---------------------------------------------------------------------------+
// | clearctl.php                                                             |
// |                                                                          |
// | Removed all cached templates                                             |
// +--------------------------------------------------------------------------+
// | Copyright (C) 2008 by the following authors:                             |
// |                                                                          |
// | Mark R. Evans          mark AT glfusion DOT org                          |
// +--------------------------------------------------------------------------+
// |                                                                          |
// | This program is free software; you can redistribute it and/or            |
// | modify it under the terms of the GNU General Public License              |
// | as published by the Free Software Foundation; either version 2           |
// | of the License, or (at your option) any later version.                   |
// |                                                                          |
// | This program is distributed in the hope that it will be useful,          |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of           |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            |
// | GNU General Public License for more details.                             |
// |                                                                          |
// | You should have received a copy of the GNU General Public License        |
// | along with this program; if not, write to the Free Software Foundation,  |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.          |
// |                                                                          |
// +--------------------------------------------------------------------------+

require_once '../lib-common.php';

$display = '';

if (!SEC_inGroup('Root') && !SEC_inGroup('Theme Admin')) {
    $display .= COM_showMessageText($MESSAGE[29], $MESSAGE[30]);
    $display = COM_createHTMLDocument($display, array('pagetitle' => $MESSAGE[30]));
    COM_accessLog("User {$_USER['username']} tried to illegally access the clear cache.");
    COM_output($display);
    exit;
}

// Clean directory
function clean_directory($dir, $leave_dirs = array(), $leave_files = array()) { 

    foreach( glob("$dir/*") as $file ) {
        if (is_dir($file)) {
            if (!in_array(basename($file), $leave_dirs)) {
                delete_files($file); // delete all sub directories and files in those directories
            }
        } elseif( !in_array(basename($file), $leave_files) ) {
            unlink($file);
        }
    }
}

// Delete all files in a directory and any sub directory
function delete_files($dir) { 
  
    foreach(glob($dir . '/*') as $file) { 
        if (is_dir($file)) {
            delete_files($file); 
        } else {
            unlink($file); 
        }
    } 
    rmdir($dir); 
}

/*
 * Main processing
 */
 
// Clearing Theme Template Cache
CTL_clearCache(); 

// Clearing Resource Cache (CSS, and Javascript concatenated and minified files)
Geeklog\Cache::clear(); 

// Clean out Data directory (includes things like temp uploaded plugin files, user batch files, etc...)
$leave_dirs = array('cache', 'layout_cache', 'layout_css');
$leave_files = array('cacert.pem', 'README');
clean_directory($_CONF['path_data'], $leave_dirs, $leave_files);

// Clean out File Manager Thumbnail Files
$leave_dirs = array();
$leave_files = array('index.html');
clean_directory($_CONF['path_images'] . '_thumbs/articles/', $leave_dirs, $leave_files);

$leave_dirs = array();
$leave_files = array('index.html');
clean_directory($_CONF['path_images'] . '_thumbs/userphotos/', $leave_dirs, $leave_files);

$leave_dirs = array();
$leave_files = array('index.html');
clean_directory($_CONF['path_images'] . '_thumbs/library/image/', $leave_dirs, $leave_files);

$leave_dirs = array('Image');
$leave_files = array();
clean_directory($_CONF['path_images'] . '_thumbs/library/', $leave_dirs, $leave_files);

$leave_dirs = array('articles', 'library', 'userphotos');
$leave_files = array();
clean_directory($_CONF['path_images'] . '_thumbs/', $leave_dirs, $leave_files);

// Allow Plugins to clear any cached items
PLG_clearCache(); 

COM_redirect($_CONF['site_admin_url'] . '/index.php?msg=500');

