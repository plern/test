<?php
/**
* @package   yoo_luna
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

$settings['id'] = uniqid('wk-');

// Grid
$grid  = 'uk-grid-width-1-'.$settings['columns'];
$grid .= $settings['columns_small'] ? ' uk-grid-width-small-1-'.$settings['columns_small'] : '';
$grid .= $settings['columns_medium'] ? ' uk-grid-width-medium-1-'.$settings['columns_medium'] : '';
$grid .= $settings['columns_large'] ? ' uk-grid-width-large-1-'.$settings['columns_large'] : '';
$grid .= $settings['columns_xlarge'] ? ' uk-grid-width-xlarge-1-'.$settings['columns_xlarge'] : '';

$grid .= ' uk-grid uk-grid-match';
$grid .= in_array($settings['gutter'], array('collapse','large','medium','small')) ? ' uk-grid-'.$settings['gutter'] : '' ;

// Title Size
switch ($settings['title_size']) {
    case 'panel':
        $title_size = 'uk-panel-title';
        break;
    case 'large':
        $title_size = 'uk-heading-large uk-margin-top-remove';
        break;
    default:
        $title_size = 'uk-' . $settings['title_size'] . ' uk-margin-top-remove';
}

// Link Style
switch ($settings['link_style']) {
    case 'button':
        $link_style = 'uk-button';
        break;
    case 'primary':
        $link_style = 'uk-button uk-button-primary';
        break;
    case 'button-large':
        $link_style = 'uk-button uk-button-large';
        break;
    case 'primary-large':
        $link_style = 'uk-button uk-button-large uk-button-primary';
        break;
    case 'button-link':
        $link_style = 'uk-button uk-button-link';
        break;
    default:
        $link_style = '';
}

// Badge Style
switch ($settings['badge_style']) {
    case 'badge':
        $badge_style = 'uk-badge';
        break;
    case 'success':
        $badge_style = 'uk-badge uk-badge-success';
        break;
    case 'warning':
        $badge_style = 'uk-badge uk-badge-warning';
        break;
    case 'danger':
        $badge_style = 'uk-badge uk-badge-danger';
        break;
    case 'text-muted':
        $badge_style  = 'uk-text-muted';
        $badge_style .= ($settings['badge_position'] == 'panel') ? ' uk-panel-badge' : '';
        break;
    case 'text-primary':
        $badge_style  = 'uk-text-primary';
        $badge_style .= ($settings['badge_position'] == 'panel') ? ' uk-panel-badge' : '';
        break;
}

// Animation
$animation = ($settings['animation'] != 'none') ? ' data-uk-scrollspy="{cls:\'uk-animation-' . $settings['animation'] . ' uk-invisible\', target:\'> div > .uk-panel\', delay:300}"' : '';

// Link Target
$link_target = ($settings['link_target']) ? ' target="_blank"' : '';

?>

<div id="<?php echo $settings['id']; ?>" class="tm-grid-luna <?php echo $grid; ?> <?php echo $settings['class']; ?>" <?php echo $animation; ?>>

    <?php foreach ($items as $item) : ?>
    <div>
        <div class="uk-panel uk-panel-hover <?php if ($settings['animation'] != 'none') echo ' uk-invisible'; ?>">
            <div class="uk-grid uk-grid-small">

                <div class="uk-width-1-6 uk-width-large-1-10">
                    <div class="tm-check-icon uk-text-center uk-vertical-align">
                        <i class="uk-icon-check uk-vertical-align-middle"></i>
                    </div>
                </div>

                <div class="uk-width-5-6 uk-width-large-9-10">

                    <?php if ($item['badge'] && $settings['badge'] && $settings['badge_position'] == 'panel') : ?>
                    <div class="uk-panel-badge <?php echo $badge_style; ?>"><?php echo $item['badge']; ?></div>
                    <?php endif; ?>

                    <?php if ($item['title'] && $settings['title']) : ?>
                    <h3 class="<?php echo $title_size; ?>">
                        <?php echo $item['title']; ?>

                        <?php if ($item['badge'] && $settings['badge'] && $settings['badge_position'] == 'title') : ?>
                        <span class="uk-margin-small-left <?php echo $badge_style; ?>"><?php echo $item['badge']; ?></span>
                        <?php endif; ?>

                    </h3>
                    <?php endif; ?>

                    <?php if ($item['content'] && $settings['content']) : ?>
                    <p><?php echo $item['content']; ?></p>
                    <?php endif; ?>

                    <?php if ($item['link'] && $settings['link']) : ?>
                    <p><a<?php if($link_style) echo ' class="' . $link_style . '"'; ?> href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>><?php echo $app['translator']->trans($settings['link_text']); ?></a></p>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
    <?php endforeach; ?>

</div>
