<?php
/**
* @package   yoo_luna
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

/*
 * Generate 3-column layout
 */
$config          = $this['config'];
$sidebars        = $config->get('sidebars', array());
$columns         = array('main' => array('width' => 60, 'alignment' => 'right'));
$sidebar_classes = '';

$gcf = function($a, $b = 60) use(&$gcf) {
    return (int) ($b > 0 ? $gcf($b, $a % $b) : $a);
};

$fraction = function($nominator, $divider = 60) use(&$gcf) {
    return $nominator / ($factor = $gcf($nominator, $divider)) .'-'. $divider / $factor;
};

foreach ($sidebars as $name => $sidebar) {
    if (!$this['widgets']->count($name)) {
        unset($sidebars[$name]);
        continue;
    }

    $columns['main']['width'] -= @$sidebar['width'];
    $sidebar_classes .= " tm-{$name}-".@$sidebar['alignment'];
}

if ($count = count($sidebars)) {
    $sidebar_classes .= ' tm-sidebars-'.$count;
}

$columns += $sidebars;
foreach ($columns as $name => &$column) {

    $column['width']     = isset($column['width']) ? $column['width'] : 0;
    $column['alignment'] = isset($column['alignment']) ? $column['alignment'] : 'left';
    $column['class']     = sprintf('tm-%s uk-width-medium-%s%s', $name, $fraction($column['width']), ' uk-flex-order-'.($column['alignment'] == 'left' ? 'first' : 'last'));

}

/*
 * Add grid classes
 */
$positions = array_keys($config->get('grid', array()));
$displays  = array('small', 'medium', 'large');
$grid_classes = array();
$display_classes = array();
foreach ($positions as $position) {

    $grid_classes[$position] = array();
    $grid_classes[$position][] = "tm-{$position} uk-grid";
    $display_classes[$position][] = '';

    if ($this['config']->get("grid.{$position}.divider", false)) {
        $grid_classes[$position][] = 'uk-grid-divider';
    }

    $widgets = $this['widgets']->load($position);

    foreach($displays as $display) {
        if (!array_filter($widgets, function($widget) use ($config, $display) { return (bool) $config->get("widgets.{$widget->id}.display.{$display}", true); })) {
            $display_classes[$position][] = "uk-hidden-{$display}";
        }
    }

    $display_classes[$position] = implode(" ", $display_classes[$position]);
    $grid_classes[$position] = implode(" ", $grid_classes[$position]);

}

/*
 * Add block classes
 */
$blocks          = array_keys($config->get('block', array()));
$block_classes   = array();
$block_first     = '';
$nav_class       = '';

foreach ($blocks as $block) {

    $block_classes[$block]  = "uk-block";
    $block_classes[$block] .= $config->get("block.{$block}.block-bg");
    $block_classes[$block] .= $config->get("block.{$block}.block-padding");
    $block_classes[$block] .= $config->get("block.{$block}.content-width");
    $block_classes[$block] .= ($config->get("block.{$block}.block-fullheight")) ? ' uk-height-viewport uk-flex uk-flex-middle' : '';

    $styles["block.$block"] = '';

    if ($this['config']->get("block.{$block}.class", false)) {
        $block_classes[$block] .= ' ' . ($this['config']->get("block.{$block}.class"));
    }

    if (!$block_first && $this['widgets']->count($block)) {
        $block_first = $block;

        switch ($config->get("block.{$block}.block-bg")) {
            case ' uk-block-muted':
                $nav_class = 'tm-navbar-muted';
                break;

            case ' uk-block-primary uk-contrast':
                $nav_class = 'tm-navbar-primary';
                break;

            case ' uk-block-secondary':
                $nav_class = 'tm-navbar-secondary';
                break;
        }
    }

}

/*
 * Add body classes
 */

$body_classes  = $sidebar_classes;
$body_classes .= $this['system']->isBlog() ? ' tm-isblog' : ' tm-noblog';
$body_classes .= ' '.$config->get('page_class');

$config->set('body_classes', trim($body_classes));

/*
 * Add social buttons
 */

$body_config = array();
$body_config['twitter']  = (int) $config->get('twitter', 0);
$body_config['plusone']  = (int) $config->get('plusone', 0);
$body_config['facebook'] = (int) $config->get('facebook', 0);
$body_config['style']    = $config->get('style');

$config->set('body_config', json_encode($body_config));

/*
 * Add assets
 */

// add css
$this['asset']->addFile('css', 'css:theme.css');
$this['asset']->addFile('css', 'css:custom.css');

// add scripts
$this['asset']->addFile('js', 'js:uikit.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/autocomplete.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/search.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/tooltip.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/sticky.js');
$this['asset']->addFile('js', 'js:social.js');
$this['asset']->addFile('js', 'js:theme.js');

/*
 * Background Animations
 */

if ($bg = $config->get('tm_background')) {
    switch ($bg) {
        case 'fireflies':
            $this['asset']->addFile('js', 'js:fireflies.js');
            break;

        case 'geometries':
            $this['asset']->addFile('js', 'js:lib/jquery.parallaxify.js');
            $this['asset']->addFile('js', 'js:geometries.js');
            break;

        case 'shapes':
            $this['asset']->addFile('js', 'js:lib/jquery.parallaxify.js');
            $this['asset']->addFile('js', 'js:shapes.js');
            break;

        case 'circles':
            $this['asset']->addFile('js', 'js:lib/jquery.parallaxify.js');
            $this['asset']->addFile('js', 'js:circles.js');
            break;

        case 'particles':
            $this['asset']->addFile('js', 'js:lib/particles.min.js');
            $this['asset']->addFile('js', 'js:particles.js');
            break;

        default:
            break;
    }
}

// internet explorer
if ($this['useragent']->browser() == 'msie') {
    $head[] = sprintf('<!--[if IE 8]><link rel="stylesheet" href="%s"><![endif]-->', $this['path']->url('css:ie8.css'));
    $head[] = sprintf('<!--[if lte IE 8]><script src="%s"></script><![endif]-->', $this['path']->url('js:html5.js'));
}

if (isset($head)) {
    $this['template']->set('head', implode("\n", $head));
}
