<?php
/**
* @package   yoo_luna
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

return array(

    'name' => 'widget/slideshow-luna',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'slideshow-luna',
        'label' => 'Slideshow Luna',
        'core'  => false,
        'icon'  => 'plugins/widgets/slideshow-luna/widget.svg',
        'view'  => 'plugins/widgets/slideshow-luna/views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'fields' => array(
            array(
                'type'  => 'text',
                'name'  => 'watermark',
                'label' => 'Watermark'
            )
        ),
        'settings' => array(

            'panel'             => 'primary',
            'nav_contrast'      => true,
            'animation'         => 'scroll',
            'duration'          => '500',
            'autoplay'          => false,
            'interval'          => '3000',
            'autoplay_pause'    => true,

            'title'             => true,
            'content'           => true,
            'title_size'        => 'h3',
            'content_size'       => '',
            'link'              => true,

            'link_target'       => false,
            'class'             => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('slideshow-luna.edit', 'plugins/widgets/slideshow-luna/views/edit.php', true);
        }

    )

);
