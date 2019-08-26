<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog 2.1.2                                                             |
// +---------------------------------------------------------------------------+
// | index.php                                                                 |
// |                                                                           |
// | Rich Filemanager                                                          |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2014-2019 by the following authors:                         |
// |                                                                           |
// | Authors: Riaan Los        - mail AT riaanlos DOT nl                       |
// |          Simon Georget    - simon AT linea21 DOT com                      |
// |	      Pavel Solomienko - <https://github.com/servocoder/>              |
// |          Kenji ITO        - geeklog AT mystral-kk DOT net                 |
// +---------------------------------------------------------------------------+
// | Original file "index.html" is licensed under MIT License.                 |
// |                                                                           |
// | This program is free software; you can redistribute it and/or             |
// | modify it under the terms of the GNU General Public License               |
// | as published by the Free Software Foundation; either version 2            |
// | of the License, or (at your option) any later version.                    |
// |                                                                           |
// | This program is distributed in the hope that it will be useful,           |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             |
// | GNU General Public License for more details.                              |
// |                                                                           |
// | You should have received a copy of the GNU General Public License         |
// | along with this program; if not, write to the Free Software Foundation,   |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.           |
// |                                                                           |
// +---------------------------------------------------------------------------+

global $_CONF_FCK, $_USER;

require_once dirname(__DIR__) . '/lib-common.php';

// First of all, check if Filemanager is allowed at all
if ($_CONF['filemanager_disabled']) {
    $content = COM_showMessageText($LANG01['error_filemanager_disabled'], $LANG01['error_filemanager_disabled']);
    $display = COM_createHTMLDocument($content, ['pagetitle' => $LANG01['error_filemanager_disabled']]);
    COM_accessLog("User {$_USER['username']} tried to illegally access the Filemanager.");
    COM_output($display);
    exit;
} elseif (COM_isDemoMode()) {
    $content = COM_showMessageText($LANG_ACCESS['demo_mode_denied_msg'], $LANG_ACCESS['accessdenied']);
    $display = COM_createHTMLDocument($content, ['pagetitle' => $LANG_ACCESS['accessdenied']]);
    COM_output($display);
    exit;
}

// Then, check if the current user has access to Filemanager
$isAdmin = false;

if (SEC_inGroup('Root') || SEC_inGroup('Filemanager Admin')
    || SEC_hasRights('filemanager.admin')) {
    $isAdmin = true;
} elseif (SEC_hasRights('story.edit') || SEC_hasRights('story.submit')) {
    $isAdmin = false;
} else {
    $content = COM_showMessageText($MESSAGE[29], $MESSAGE[30]);
    $display = COM_createHTMLDocument($content, ['pagetitle' => $MESSAGE[30]] );

    // Log illegal attempt to access.log
    COM_accessLog("User {$_USER['username']} tried to illegally access the Filemanager.");
    COM_output($display);
    exit;
}

$langISO639 = COM_getLangIso639Code();

// Default values defined in filemanager.config.js.dist
$_FM_CONF = [
    '_comment'        => 'IMPORTANT : go to the wiki page to know about options configuration https://github.com/servocoder/RichFilemanager/wiki/Configuration-options',
    'options'         => [
        'theme'                 => 'flat-dark',             // No configuration as of GL-2.2.1
        'showTitleAttr'         => false,
        'showConfirmation'      => $_CONF['filemanager_show_confirmation'],
        'browseOnly'            => false,
        'fileSorting'           => $_CONF['filemanager_file_sorting'],
        'folderPosition'        => 'bottom',
        'quickSelect'           => false,                   // since GL-2.1.2
        'logger'                => false,
        'allowFolderDownload'   => $isAdmin,                // No configuration as of GL-2.2.1
        'allowChangeExtensions' => false,                   // No configuration as of GL-2.2.1
        'capabilities'          => [
            'select', 'upload', 'download', 'rename', 'copy', 'move', 'delete',
        ],
    ],
    'language'        => [
        'default'   => COM_getLangIso639Code(),
        'available' => [
            'ar', 'bs', 'ca', 'cs', 'da', 'de', 'el', 'en', 'es', 'fa', 'fi', 'fr', 'he',
            'hu', 'it', 'ja', 'nl', 'pl', 'pt', 'ru', 'sv', 'th', 'tr', 'vi', 'zh-CN', 'zh-TW',
        ],
    ],
    'formatter'       => [
        'datetime' => [
            'skeleton' => 'yMMMdHm',
        ],
    ],
    'filetree'        => [
        'enabled'       => true,
        'foldersOnly'   => false,
        'reloadOnClick' => true,
        'expandSpeed'   => 200,
        'showLine'      => true,
        'width'         => 200,
        'minWidth'      => 200,
    ],
    'manager'         => [
        'defaultViewMode' => $_CONF['filemanager_default_view_mode'],
        'dblClickOpen'    => false,
        'selection'       => [
            'enabled'    => true,
            'useCtrlKey' => true,
        ],
        'renderer'        => [
            'position'  => false,
            'indexFile' => 'readme.md',
        ],
    ],
    'api'             => [
        'lang'          => 'php',
        'connectorUrl'  => false,
        'requestParams' => [
            'GET'   => [],
            'POST'  => [],
            'MIXED' => [],
        ],
    ],
    'upload'          => [
        'multiple'         => true,
        'maxNumberOfFiles' => 5,
        'chunkSize'        => false,
    ],
    'clipboard'       => [
        'enabled'       => true,
        'encodeCopyUrl' => true,
    ],
    'filter'          => [
        'image'   => ['jpg', 'jpeg', 'gif', 'png', 'svg'],
        'media'   => ['ogv', 'avi', 'mkv', 'mp4', 'webm', 'm4v', 'ogg', 'mp3', 'wav'],
        'office'  => ['txt', 'pdf', 'odp', 'ods', 'odt', 'rtf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'csv', 'md'],
        'archive' => ['zip', 'tar', 'rar'],
        'audio'   => ['ogg', 'mp3', 'wav'],
        'video'   => ['ogv', 'avi', 'mkv', 'mp4', 'webm', 'm4v'],
    ],
    'search'          => [
        'enabled'       => $_CONF['filemanager_search_box'],
        'recursive'     => false,
        'caseSensitive' => false,
        'typingDelay'   => 500,
    ],
    'viewer'          => [
        'absolutePath'       => true,
        'previewUrl'         => false,
        'image'              => [
            'enabled'       => true,
            'lazyLoad'      => true,
            'showThumbs'    => $_CONF['filemanager_show_thumbs'],
            'thumbMaxWidth' => 64,
            'extensions'    => $_CONF['filemanager_images_ext'],
        ],
        'video'              => [
            'enabled'      => $_CONF['filemanager_show_video_player'],
            'extensions'   => $_CONF['filemanager_videos_ext'],
            'playerWidth'  => $_CONF['filemanager_videos_player_width'],
            'playerHeight' => $_CONF['filemanager_videos_player_height'],
        ],
        'audio'              => [
            'enabled'    => $_CONF['filemanager_show_audio_player'],
            'extensions' => $_CONF['filemanager_audios_ext'],
        ],
        'iframe'             => [
            'enabled'      => false,    // Default was true
            'extensions'   => [
                'htm',
                'html',
            ],
            'readerWidth'  => '95%',
            'readerHeight' => '600',
        ],
        'opendoc'            => [
            'enabled'      => false,    // Default was true
            'extensions'   => ['pdf', 'odt', 'odp', 'ods'],
            'readerWidth'  => '640',
            'readerHeight' => '480',
        ],
        'google'             => [
            'enabled'      => false,    // Default was true
            'extensions'   => ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'],
            'readerWidth'  => '640',
            'readerHeight' => '480',
        ],
        'codeMirrorRenderer' => [
            'enabled'    => false,      // Default was true
            'extensions' => [
                'txt',
                'csv',
            ],
        ],
        'markdownRenderer'   => [
            'enabled'    => false,      // Default was true
            'extensions' => [
                'md',
            ],
        ],
    ],
    'editor'          => [
        'enabled'       => false,       // Default was true
        'theme'         => 'default',
        'lineNumbers'   => true,
        'lineWrapping'  => true,
        'codeHighlight' => true,
        'matchBrackets' => true,
        'extensions'    => ['html', 'txt', 'csv', 'md'],
    ],
    'customScrollbar' => [
        'enabled' => true,
        'theme'   => 'inset-2-dark',
        'button'  => true,
    ],
    'extras'          => [
        'extra_js'       => [],
        'extra_js_async' => true,
    ],
    'url'             => 'https://github.com/servocoder/RichFilemanager',
    'version'         => '2.7.6',
];

// Add capabilities for admin
if ($isAdmin) {
    $_FM_CONF['options']['capabilities'][] = 'extract';
    $_FM_CONF['options']['capabilities'][] = 'createFolder';
}

// Writes back into config file
$path = $_CONF['path_html'] . 'filemanager/config/filemanager.config.json';
$data = json_encode($_FM_CONF);

if (is_callable('json_last_error') && (json_last_error() !== JSON_ERROR_NONE)) {
    $data = false;
    COM_errorLog('Filemanager: json_encode() failed.  Error code = ' . json_last_error());
}

if ($data !== false) {
    if (@file_put_contents($path, $data) === false) {
        COM_errorLog('Filemanager: configuration file "' . $path . '" is not writable');
    }
}

// Display
header('Expires: on, 01 Jan 1970 00:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="<?php echo $langISO639; ?>">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Rich FileManager</title>

    <link rel="stylesheet" type="text/css" href="src/css/libs-main.css"/>
    <link rel="stylesheet" type="text/css" href="src/css/filemanager.min.css"/>

    <style type="text/css">
        .fm-container .fm-loading-wrap {
            position: fixed;
            height: 100%;
            width: 100%;
            overflow: hidden;
            top: 0;
            left: 0;
            display: block;
            background: white url(./images/spinner.gif) no-repeat center center;
            z-index: 999;
        }
    </style>
    <!-- CSS dynamically added using 'config.options.theme' defined in config file -->
</head>

<body>
<div class="fm-container">
    <div class="fm-loading-wrap"><!-- loading wrapper / removed when loaded --></div>
    <div class="fm-wrapper">
        <div class="fm-header">
            <div class="breadcrumbs">
                <div class="nav-title" data-bind="text: breadcrumbsModel.getLabel"></div>
                <div data-bind="foreach: {data: breadcrumbsModel.items, as: 'bcItem'}">
                    <div data-bind="text: bcItem.label, click: bcItem.goto, css: bcItem.itemClass()"></div>
                    <!-- ko if: !bcItem.active -->
                    <div class="separator">&gt;</div>
                    <!-- /ko -->
                </div>
            </div>
            <div class="buttons-panel">
                <div class="button-group navigate-controls">
                    <button class="btn btn-nav-level-up no-label" type="button"
                            data-bind="click: headerModel.navLevelUp, attr: {title: lg.nav_level_up}">
                        <span>&nbsp;</span>
                    </button>
                    <button class="btn btn-nav-home no-label" type="button"
                            data-bind="click: headerModel.navHome, attr: {title: lg.nav_home}">
                        <span>&nbsp;</span>
                    </button>
                    <button class="btn btn-nav-refresh no-label" type="button"
                            data-bind="click: headerModel.navRefresh, attr: {title: lg.nav_refresh}">
                        <span>&nbsp;</span>
                    </button>
                </div>
                <div class="button-group">
                    <button class="separator" type="button">&nbsp;</button>
                </div>
                <div class="button-group viewmode-controls">
                    <button class="btn btn-grid-mode no-label" type="button"
                            data-bind="click: headerModel.displayGrid, attr: {title: lg.grid_view}, css: {active: viewMode() === 'grid'}">
                        <span>&nbsp;</span>
                    </button>
                    <button class="btn btn-list-mode no-label" type="button"
                            data-bind="click: headerModel.displayList, attr: {title: lg.list_view}, css: {active: viewMode() === 'list'}">
                        <span>&nbsp;</span>
                    </button>
                </div>
                <div class="button-group">
                    <button class="separator" type="button">&nbsp;</button>
                </div>
                <div class="button-group filter-controls">
                    <button class="btn btn-filter-image no-label" type="button"
                            data-bind="event: {click: function(data, event) {filterModel.filter('image')}}, attr: {title: lg.filter_image}, css: {active: filterModel.name() === 'image'}">
                        <span>&nbsp;</span></button>
                    <button class="btn btn-filter-media no-label" type="button"
                            data-bind="event: {click: function(data, event) {filterModel.filter('media')}}, attr: {title: lg.filter_media}, css: {active: filterModel.name() === 'media'}">
                        <span>&nbsp;</span></button>
                    <button class="btn btn-filter-office no-label" type="button"
                            data-bind="event: {click: function(data, event) {filterModel.filter('office')}}, attr: {title: lg.filter_office}, css: {active: filterModel.name() === 'office'}">
                        <span>&nbsp;</span></button>
                    <button class="btn btn-filter-archive no-label" type="button"
                            data-bind="event: {click: function(data, event) {filterModel.filter('archive')}}, attr: {title: lg.filter_archive}, css: {active: filterModel.name() === 'archive'}">
                        <span>&nbsp;</span></button>
                    <!--<button class="btn btn-filter-audio no-label" type="button" data-bind="event: {click: function(data, event) {filterModel.filter('audio')}}, attr: {title: lg.filter_audio}, css: {active: filterModel.name() === 'audio'}"><span>&nbsp;</span></button>-->
                    <!--<button class="btn btn-filter-video no-label" type="button" data-bind="event: {click: function(data, event) {filterModel.filter('video')}}, attr: {title: lg.filter_video}, css: {active: filterModel.name() === 'video'}"><span>&nbsp;</span></button>-->
                    <button class="btn btn-filter-reset no-label" type="button"
                            data-bind="event: {click: function(data, event) {filterModel.reset()}}, attr: {title: lg.filter_reset}, css: {active: filterModel.name() === null}">
                        <span>&nbsp;</span></button>
                </div>
                <div class="button-group">
                    <button class="separator" type="button">&nbsp;</button>
                </div>
                <!-- ko if: clipboardModel.enabled() -->
                <div class="button-group clipboard-controls">
                    <button class="btn btn-clipboard-copy no-label" type="button"
                            data-bind="click: clipboardModel.copy, visible: clipboardModel.hasCapability('copy'), attr: {title: lg.clipboard_copy}">
                        <span>&nbsp;</span></button>
                    <button class="btn btn-clipboard-cut no-label" type="button"
                            data-bind="click: clipboardModel.cut, visible: clipboardModel.hasCapability('cut'), attr: {title: lg.clipboard_cut}">
                        <span>&nbsp;</span></button>
                    <button class="btn btn-clipboard-paste no-label" type="button"
                            data-bind="click: clipboardModel.paste, visible: clipboardModel.hasCapability('paste'), attr: {title: lg.clipboard_paste_full}, css: {disabled: clipboardModel.itemsNum() === 0}">
                        <span>&nbsp;</span></button>
                    <button class="btn btn-clipboard-clear no-label" type="button"
                            data-bind="click: clipboardModel.clear, visible: clipboardModel.hasCapability('clear'), attr: {title: lg.clipboard_clear_full}, css: {disabled: clipboardModel.itemsNum() === 0}">
                        <span>&nbsp;</span></button>
                </div>
                <div class="button-group">
                    <button class="separator" type="button">&nbsp;</button>
                </div>
                <!-- /ko -->
                <!-- ko if: isCapable('upload') && !browseOnly() -->
                <div class="button-group upload-controls">
                    <form class="fm-uploader" method="post">
                        <input id="mode" type="hidden" value="add"/>
                        <input id="newfile" class="hidden-file-input" name="newfile" type="file"/>

                        <button class="btn fm-upload" type="button">
                            <span data-bind="text: lg.action_upload"></span>
                        </button>
                    </form>
                </div>
                <!-- /ko -->
                <!-- ko if: isCapable('createFolder') && !browseOnly() -->
                <div class="button-group create-controls">
                    <button class="btn btn-create-folder" type="button" data-bind="click: headerModel.createFolder">
                        <span data-bind="text: lg.new_folder"></span>
                    </button>
                </div>
                <!-- /ko -->
                <!-- ko if: headerModel.langSwitcher -->
                <div class="button-group">
                    <select class="btn lang-selector"
                            data-bind="value: currentLang, options: config().language.available, optionsText: function(item) {return item.toUpperCase();}, event: {change: function(data, event) {headerModel.switchLang(event)}}"></select>
                </div>
                <!-- /ko -->
                <!-- ko if: headerModel.closeButton() -->
                <div class="button-group">
                    <button class="btn btn-close-window no-label" type="button"
                            data-bind="click: headerModel.closeButtonOnClick, attr: {title: lg.close}">
                        <span>&nbsp;</span>
                    </button>
                </div>
                <!-- /ko -->
            </div>
        </div>

        <div class="fm-splitter">
            <div class="fm-filetree" data-bind="visible: config().filetree.enabled">
                <div data-bind="template: {name: 'node-parent-template', foreach: treeModel.rootNode.children, as: 'koNode', afterRender: treeModel.nodeRendered}"></div>
            </div>

            <div class="fm-fileinfo">
                <div class="fm-loading-view" data-bind="visible: loadingView()"></div>

                <div class="view-items-wrapper" data-bind="visible: !loadingView() && !previewFile()">
                    <!-- ko if: config().manager.renderer.position === 'top' && itemsModel.descriptivePanel.renderer() -->
                    <div class="fm-renderer-wrapper" data-bind="visible: itemsModel.descriptivePanel.content()">
                        <!-- ko template: {name: 'renderer-template', data: itemsModel.descriptivePanel} --><!-- /ko -->
                    </div>
                    <!-- /ko -->

                    <div class="view-items">
                        <ul class="grid" data-bind="visible: viewMode() === 'grid'">
                            <!-- ko with: itemsModel.parentItem -->
                            <!-- ko if: $data -->
                            <li class="directory-parent"
                                data-bind="event: {click: open, dblclick: open}, droppableView: $data, css: itemClass()"
                                oncontextmenu="return false;">
                                <div class="clip">
                                    <img src="" class="grid-icon ico_folder_parent"
                                         data-bind="attr: {src: null, width: $root.config().viewer.image.thumbMaxWidth}"/>
                                </div>
                                <p>..</p>
                            </li>
                            <!-- /ko -->
                            <!-- /ko -->

                            <!-- ko foreach: {data: itemsModel.objects, as: 'koItem'} -->
                            <li data-bind="event: {click: koItem.open, dblclick: koItem.open, mousedown: koItem.mouseDown}, droppableView: koItem, visible: koItem.visible, attr: {title: koItem.title()}, css: koItem.itemClass()">
                                <div class="item-background"></div>
                                <div class="item-content" data-bind="draggableView: koItem">
                                    <div class="clip">
                                        <!-- ko if: koItem.lazyPreview -->
                                        <img src=""
                                             data-bind="css: koItem.gridIconClass(), attr: {'data-original': koItem.cdo.imageUrl, width: koItem.cdo.previewWidth}"/>
                                        <!-- /ko -->
                                        <!-- ko if: !koItem.lazyPreview -->
                                        <img src=""
                                             data-bind="css: koItem.gridIconClass(), attr: {src: koItem.cdo.imageUrl, width: koItem.cdo.previewWidth}"/>
                                        <!-- /ko -->
                                    </div>
                                    <p data-bind="text: koItem.rdo.attributes.name"></p>
                                </div>
                            </li>
                            <!-- /ko -->
                        </ul>

                        <table class="list" data-bind="visible: viewMode() === 'list'">
                            <thead>
                            <tr class="rowHeader" data-bind="with: tableViewModel">
                                <th data-bind="click: thName.sort, css: thName.sortClass()"><span
                                            data-bind="text: $root.lg.name"></span></th>
                                <th data-bind="click: thType.sort, css: thType.sortClass()"><span
                                            data-bind="text: $root.lg.type"></span></th>
                                <th data-bind="click: thSize.sort, css: thSize.sortClass()"><span
                                            data-bind="text: $root.lg.size"></span></th>
                                <th data-bind="click: thDimensions.sort, css: thDimensions.sortClass()"><span
                                            data-bind="text: $root.lg.dimensions"></span></th>
                                <th data-bind="click: thModified.sort, css: thModified.sortClass()"><span
                                            data-bind="text: $root.lg.modified"></span></th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- ko with: itemsModel.parentItem -->
                            <!-- ko if: $data -->
                            <tr class="directory-parent"
                                data-bind="event: {click: open, dblclick: open}, droppableView: $data, css: itemClass()"
                                oncontextmenu="return false;">
                                <td>
                                    <div class="list-item">..</div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <!-- /ko -->
                            <!-- /ko -->

                            <!-- ko foreach: {data: itemsModel.objects, as: 'koItem'} -->
                            <tr data-bind="event: {click: koItem.open, dblclick: koItem.open, mousedown: koItem.mouseDown}, droppableView: koItem, visible: koItem.visible, attr: {title: koItem.title()}, css: koItem.itemClass()"
                                oncontextmenu="return false;">
                                <td>
                                    <div class="list-item" data-bind="draggableView: koItem">
                                        <span class="list-icon" data-bind="css: koItem.listIconClass()"></span>
                                        <span data-bind="text: koItem.rdo.attributes.name"></span>
                                    </div>
                                </td>
                                <td data-bind="text: koItem.cdo.extension"></td>
                                <td data-bind="text: koItem.cdo.sizeFormatted"></td>
                                <td data-bind="text: koItem.cdo.dimensions"></td>
                                <td data-bind="text: koItem.cdo.modifiedFormatted"></td>
                            </tr>
                            <!-- /ko -->
                            </tbody>
                        </table>
                    </div>

                    <!-- ko if: config().manager.renderer.position === 'bottom' && itemsModel.descriptivePanel.renderer() -->
                    <div class="fm-renderer-wrapper" data-bind="visible: itemsModel.descriptivePanel.content()">
                        <!-- ko template: {name: 'renderer-template', data: itemsModel.descriptivePanel} --><!-- /ko -->
                    </div>
                    <!-- /ko -->
                </div>


                <div class="fm-preview-wrapper" data-bind="visible: !loadingView() && previewFile()">
                    <!-- ko template: {if: previewFile(), afterRender: previewModel.afterRender} -->
                    <div class="fm-preview" data-bind="with: previewModel">
                        <div class="fm-preview-toolbar button-group">
                            <form id="fm-js-preview-toolbar">
                                <button class="btn btn-file-preview-close" type="button"
                                        data-bind="click: closePreview">
                                    <span data-bind="text: $root.lg.close"></span>
                                </button>
                                <!-- ko if: buttonVisibility('select') -->
                                <button class="btn btn-file-select" type="button"
                                        data-bind="event: {click: function(data, event) {bindToolbar('select')}}">
                                    <span data-bind="text: $root.lg.action_select"></span>
                                </button>
                                <!-- /ko -->
                                <!-- ko if: buttonVisibility('download') -->
                                <button class="btn btn-file-download" type="button"
                                        data-bind="event: {click: function(data, event) {bindToolbar('download')}}">
                                    <span data-bind="text: $root.lg.action_download"></span>
                                </button>
                                <!-- /ko -->
                                <!-- ko if: buttonVisibility('rename') -->
                                <button class="btn btn-file-rename" type="button"
                                        data-bind="event: {click: function(data, event) {bindToolbar('rename')}}">
                                    <span data-bind="text: $root.lg.action_rename"></span>
                                </button>
                                <!-- /ko -->
                                <!-- ko if: buttonVisibility('move') -->
                                <button class="btn btn-file-move" type="button"
                                        data-bind="event: {click: function(data, event) {bindToolbar('move')}}">
                                    <span data-bind="text: $root.lg.action_move"></span>
                                </button>
                                <!-- /ko -->
                                <!-- ko if: buttonVisibility('delete') -->
                                <button class="btn btn-file-delete" type="button"
                                        data-bind="event: {click: function(data, event) {bindToolbar('delete')}}">
                                    <span data-bind="text: $root.lg.action_delete"></span>
                                </button>
                                <!-- /ko -->
                                <!-- ko if: viewer.isEditable() && !editor.enabled() -->
                                <button class="btn btn-file-edit" type="button" data-bind="click: editFile">
                                    <span data-bind="text: $root.lg.editor_edit"></span>
                                </button>
                                <!-- /ko -->
                                <!-- ko if: viewer.isEditable() && editor.enabled() -->
                                <button class="btn btn-file-save" type="button" data-bind="click: saveFile">
                                    <span data-bind="text: $root.lg.editor_save"></span>
                                </button>
                                <button class="btn btn-file-editor-close" type="button" data-bind="click: closeEditor">
                                    <span data-bind="text: $root.lg.editor_quit"></span>
                                </button>
                                <!-- /ko -->
                            </form>
                        </div>

                        <div class="fm-preview-viewer"
                             data-bind="css: {'side-by-side-panels': editor.enabled() && editor.isInteractive()}">
                            <!-- ko template: {if: viewer.isEditable(), afterRender: initiateEditor} -->
                            <div class="fm-preview-edit-panel" data-bind="visible: editor.enabled()">
                                <form id="fm-js-editor-form">
                                    <textarea class="fm-cm-editor-content" name="content"
                                              data-bind="textInput: editor.content()"></textarea>
                                    <input type="hidden" name="mode" value="savefile"/>
                                    <input type="hidden" name="path" value="" data-bind="textInput: rdo().id"/>
                                </form>
                            </div>
                            <!-- /ko -->

                            <div class="fm-preview-view-panel">
                                <!-- ko if: viewer.type() === 'default' -->
                                <img src="" data-bind="css: previewIconClass(), attr: {src: null}"/>
                                <!-- /ko -->
                                <!-- ko if: viewer.type() === 'image' -->
                                <img src="" data-bind="css: previewIconClass(), attr: {src: viewer.url()}"/>
                                <!-- /ko -->
                                <!-- ko if: viewer.type() === 'audio' -->
                                <audio src="" controls="controls" data-bind="attr: {src: viewer.url()}"></audio>
                                <!-- /ko -->
                                <!-- ko if: viewer.type() === 'video' -->
                                <video src="" controls="controls"
                                       data-bind="attr: {src: viewer.url(), width: viewer.options().width, height: viewer.options().height}"></video>
                                <!-- /ko -->
                                <!-- ko if: viewer.type() === 'onlyoffice' -->
                                <iframe src=""
                                        data-bind="attr: {src: viewer.url(), width: viewer.options().width, height: viewer.options().height}"
                                        allowfullscreen webkitallowfullscreen></iframe>
                                <!-- /ko -->
                                <!-- ko if: viewer.type() === 'opendoc' -->
                                <iframe src=""
                                        data-bind="attr: {src: viewer.url(), width: viewer.options().width, height: viewer.options().height}"
                                        allowfullscreen webkitallowfullscreen></iframe>
                                <!-- /ko -->
                                <!-- ko if: viewer.type() === 'google' -->
                                <iframe src=""
                                        data-bind="attr: {src: viewer.url(), width: viewer.options().width, height: viewer.options().height}"
                                        allowfullscreen webkitallowfullscreen></iframe>
                                <!-- /ko -->
                                <!-- ko if: viewer.type() === 'iframe' && !editor.enabled() -->
                                <iframe src=""
                                        data-bind="attr: {src: viewer.url(), width: viewer.options().width, height: viewer.options().height}"
                                        allowfullscreen webkitallowfullscreen></iframe>
                                <!-- /ko -->
                                <!-- ko if: viewer.type() === 'renderer' && renderer.renderer() -->
                                <div data-bind="visible: !editor.enabled() || editor.isInteractive()">
                                    <!-- ko template: {name: 'renderer-template', data: renderer} --><!-- /ko -->
                                </div>
                                <!-- /ko -->
                            </div>
                        </div>

                        <div class="fm-preview-title">
                            <h1 data-bind="text: rdo().attributes.name, attr: {title: rdo().id}"></h1>
                            <div class="fm-preview-title-controls">
                                <a href="#" class="btn-copy-url"
                                   data-bind="attr: {title: $root.lg.copy_to_clipboard, 'data-clipboard-text': viewer.pureUrl()}"></a>
                                <!-- ko if: viewer.isEditable() && !editor.enabled() && viewer.options().is_writable -->
                                <a href="#" class="btn-editor-open"
                                   data-bind="attr: {title: $root.lg.editor_edit}, click: editFile"></a>
                                <!-- /ko -->
                                <!-- ko if: viewer.isEditable() && editor.enabled() -->
                                <a href="#" class="btn-editor-save"
                                   data-bind="attr: {title: $root.lg.editor_save}, click: saveFile"></a>
                                <a href="#" class="btn-editor-quit"
                                   data-bind="attr: {title: $root.lg.editor_quit}, click: closeEditor"></a>
                                <!-- /ko -->
                            </div>
                        </div>

                        <div class="fm-preview-details">
                            <table>
                                <tr data-bind="visible: cdo().sizeFormatted">
                                    <td data-bind="text: $root.lg.size"></td>
                                    <td data-bind="text: cdo().sizeFormatted"></td>
                                </tr>
                                <tr data-bind="visible: cdo().dimensions">
                                    <td data-bind="text: $root.lg.dimensions"></td>
                                    <td data-bind="text: cdo().dimensions"></td>
                                </tr>
                                <tr data-bind="visible: cdo().createdFormatted">
                                    <td data-bind="text: $root.lg.created"></td>
                                    <td data-bind="text: cdo().createdFormatted"></td>
                                </tr>
                                <tr data-bind="visible: cdo().modifiedFormatted">
                                    <td data-bind="text: $root.lg.modified"></td>
                                    <td data-bind="text: cdo().modifiedFormatted"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /ko -->
                </div>

            </div>
        </div>

        <div class="fm-footer">
            <div class="left">
                <div class="search-box input-group" data-bind="visible: config().search.enabled">
                    <span class="input-group-addon clickable" data-bind="event: {click: searchModel.seekItems}">
                        <span class="icon search-icon"></span>
                    </span>
                    <input class="input-group-input" type="text"
                           data-bind="value: searchModel.value, event: {keyup: searchModel.inputKeyUp}"/>
                    <span class="input-group-addon clickable" data-bind="event: {click: searchModel.reset}">
                        <span class="icon reset-icon"></span>
                    </span>
                </div>
            </div>

            <div class="right">
                <div id="folder-info">
                    <span data-bind="text: itemsModel.objectsNumber() + ' ' + lg.items"></span> -
                    <span data-bind="text: lg.size + ': ' + itemsModel.objectsSize()"></span>
                </div>
                <div id="summary" data-bind="click: summaryModel.doSummarize"></div>
                <a href="" target="_blank" id="link-to-project"
                   data-bind="attr: {href: config().url, title: lg.support_fm + ' [' + lg.version + ' : ' + config().version + ']'}"></a>
            </div>
            <div style="clear: both"></div>
        </div>

        <!-- ko if: summaryModel.enabled() -->
        <div id="summary-popup" data-bind="visible: false">
            <div class="title" data-bind="text: lg.summary_title"></div>
            <div class="line" data-bind="text: lg.summary_files + ': ' + summaryModel.files()"></div>
            <div class="line"
                 data-bind="text: lg.summary_folders + ': ' + summaryModel.folders(), visible: summaryModel.folders()"></div>
            <div class="line" data-bind="text: lg.summary_size + ': ' + summaryModel.size()"></div>
        </div>
        <!-- /ko -->


        <!-- TEMPLATES Start -->
        <script type="text/html" id="renderer-template">
            <!-- ko template: {afterRender: setContainer} -->
            <div class="fm-renderer-container">
                <!-- ko if: renderer().name === 'markdown' -->
                <div class="fm-markdown-renderer" data-bind="html: content()"></div>
                <!-- /ko -->
                <!-- ko if: renderer().name === 'codeMirror' -->
                <textarea class="fm-cm-renderer-content" data-bind="textInput: content()"></textarea>
                <!-- /ko -->
            </div>
            <!-- /ko -->
        </script>

        <script type="text/html" id="node-parent-template">
            <li data-bind="template: {name: 'node-template', data: koNode}, css: koNode.itemClass(), visible: koNode.visible"></li>
        </script>

        <script type="text/html" id="node-template">
            <div class="row" data-bind="droppableTree: $data"></div>
            <span class="button switch" data-bind="css: switcherClass(), click: switchNode"></span>
            <a data-bind="attr: {class: cdo.cssItemClass}, event: {click: nodeClick, dblclick: nodeDblClick, mousedown: mouseDown}, draggableTree: $data">
                <span class="button" data-bind="css: iconClass()"></span>
                <span class="node_name" data-bind="text: nodeTitle(), attr: {title: title()}"></span>
            </a>
            <ul data-bind="template: {name: 'node-parent-template', if: children().length > 0, foreach: children, as: 'koNode', afterRender: $root.treeModel.nodeRendered}, css: clusterClass(), toggleNodeVisibility: $data"></ul>
        </script>
        <!-- TEMPLATES End-->


        <div id="drag-helper-template" style="display: none">
            <div class="drag-helper">
                <div class="item-background"></div>
                <div class="item-content">
                    <div class="clip grid-icon"></div>
                </div>
                <div class="dragging-stop">
                    <div class="cancel-image"></div>
                </div>
                <div class="dragging-counter" data-bind="visible: itemsModel.selectedNumber() > 1">
                    <span data-bind="text: itemsModel.selectedNumber()"></span>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="src/js/libs-main.js"></script>
        <script type="text/javascript" src="src/js/filemanager.min.js"></script>
        <script type="text/javascript" src="config/filemanager.init.js"></script>

        <!-- Start RichFilemanager plugin -->
        <script type="application/javascript">
            $(function () {
                $('.fm-container').richFilemanager();
            });
        </script>
    </div>
</div>
</body>

</html>
