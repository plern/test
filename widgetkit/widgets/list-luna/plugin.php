<?php
/**
* @package   yoo_luna
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

return array(

    'name' => 'widget/list-luna',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'list-luna',
        'label' => 'List Luna',
        'core'  => false,
        'icon'  => 'plugins/widgets/list-luna/widget.svg',
        'view'  => 'plugins/widgets/list-luna/views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'fields' => array(
            array(
                'type'  => 'text',
                'name'  => 'subtitle',
                'label' => 'Subtitle'
            )
        ),
        'settings' => array(
            'list'              => 'line',

            'media'             => true,
            'image_width'       => 'auto',
            'image_height'      => 'auto',

            'title_size'        => 'panel-title',
            'link'              => true,
            'link_color'        => 'muted',
            'link_text'         => 'Read More',

            'general_link'      => '',
            'general_link_text' => '',
            'link_target'       => false,
            'class'             => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('list-luna.edit', 'plugins/widgets/list-luna/views/edit.php', true);
        }

    )

);
