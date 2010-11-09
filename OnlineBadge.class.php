<?php
/*
 * OnlineBadge.class.php - A notifier for count of online users
 * Copyright (c) 2010  Andr� Kla�en
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation; either version 2 of
 * the License, or (at your option) any later version.
 */

require_once 'vendor/trails/trails.php';

class OnlineBadge extends StudipPlugin implements SystemPlugin
{
    /**
     * Initialize a new instance of the plugin.
     */
    function __construct()
    {
        parent::__construct();
        // setting up the navigation
        $style_attributes = array(
            'rel'   => 'stylesheet',
            'href'  => $GLOBALS['CANONICAL_RELATIVE_PATH_STUDIP'] . $this->getPluginPath() . '/stylesheets/online_badge.css');
        PageLayout::addHeadElement('link',  array_merge($style_attributes, array())); 

        $script_attributes = array(
            'src'   => $GLOBALS['CANONICAL_RELATIVE_PATH_STUDIP'] . $this->getPluginPath() . '/javascripts/application.js');
        PageLayout::addHeadElement('script', $script_attributes, '');
    }

    function show_action()
    {
        $active_time = $my_messaging_settings['active_time'];
        echo (int) get_users_online_count($active_time ? $active_time : 5);
    }
}
