<?php

// Create "routes" table
$_SQL[] = "CREATE TABLE {$_TABLES['routes']} (
    `rid` int(11) NOT NULL AUTO_INCREMENT,
    `method` int(11) NOT NULL DEFAULT '1',
    `rule` varchar(255) NOT NULL DEFAULT '',
    `route` varchar(255) NOT NULL DEFAULT '',
    `priority` int(11) NOT NULL DEFAULT '100',
    PRIMARY KEY (`rid`)
)";

// Add sample routes to the table
$_SQL[] = "INSERT INTO {$_TABLES['routes']} (method, rule, route, priority) VALUES (1, '/article/@sid', '/article.php?story=@sid&mode=print', 100)";
$_SQL[] = "INSERT INTO {$_TABLES['routes']} (method, rule, route, priority) VALUES (1, '/article/@sid', '/article.php?story=@sid', 110)";
$_SQL[] = "INSERT INTO {$_TABLES['routes']} (method, rule, route, priority) VALUES (1, '/archives/@topic/@year/@month', '/directory.php?topic=@topic&year=@year&month=@month', 120)";
$_SQL[] = "INSERT INTO {$_TABLES['routes']} (method, rule, route, priority) VALUES (1, '/page/@page', '/staticpages/index.php?page=@page', 130)";
$_SQL[] = "INSERT INTO {$_TABLES['routes']} (method, rule, route, priority) VALUES (1, '/links/portal/@item', '/links/portal.php?what=link&item=@item', 140)";
$_SQL[] = "INSERT INTO {$_TABLES['routes']} (method, rule, route, priority) VALUES (1, '/links/category/@cat', '/links/index.php?category=@cat', 150)";
$_SQL[] = "INSERT INTO {$_TABLES['routes']} (method, rule, route, priority) VALUES (1, '/topic/@topic', '/index.php?topic=@topic', 160)";

/**
 * Add new config options
 *
 */
function update_ConfValuesFor212()
{
    global $_CONF;

    require_once $_CONF['path_system'] . 'classes/config.class.php';

    $c = config::get_instance();
    $me = 'Core';
    $c->add('url_routing',FALSE,'select',0,0,36,1850,TRUE, $me, 0);

    return true;
}