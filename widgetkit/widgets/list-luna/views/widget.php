<?php
/**
* @package   yoo_luna
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

use YOOtheme\Widgetkit\Content\Content;

// Link Target
$link_target = ($settings['link_target']) ? ' target="_blank"' : '';

// List
$list = 'uk-list';
$list .= $settings['list'] ? ' uk-list-' . $settings['list'] : '';

// Title Size
$title_size = 'uk-' . $settings['title_size'];

// Link Color
$link_color = ($settings['link_color'] != 'link') ? 'uk-link-' . $settings['link_color'] : '';

?>

<ul class="tm-list-luna <?php echo $list; ?> <?php echo $settings['class']; ?>">

<?php foreach ($items as $i => $item) :

    // Media Type
    $attrs  = array('class' => '');
    $width  = $item['media.width'];
    $height = $item['media.height'];

    if ($item->type('media') == 'image') {
        $attrs['alt'] = strip_tags($item['title']);
        $width  = ($settings['image_width'] != 'auto') ? $settings['image_width'] : '';
        $height = ($settings['image_height'] != 'auto') ? $settings['image_height'] : '';
    }

    $attrs['width']  = ($width) ? $width : '';
    $attrs['height'] = ($height) ? $height : '';

    if (($item->type('media') == 'image') && ($settings['image_width'] != 'auto' || $settings['image_height'] != 'auto')) {
        $media = $item->thumbnail('media', $width, $height, $attrs);
    } else {
        $media = $item->media('media', $attrs);
    }

    ?>

    <li>

        <div class="uk-grid" data-uk-grid-margin>

            <?php if ($media && $settings['media']) : ?>
            <div class="uk-width-1-1 uk-width-medium-1-4">
                <?php echo $media; ?>
            </div>

            <div class="uk-width-1-1 uk-width-medium-1-4">
            <?php else: ?>
            <div class="uk-width-1-1 uk-width-medium-2-5">
            <?php endif; ?>

                <?php if ($item['title']) : ?>
                <h3 class="<?php echo $title_size; ?> uk-margin-bottom-remove"><?php echo $item['title']; ?></h3>
                <?php endif; ?>

                <?php if ($item['subtitle']) : ?>
                <span class="tm-text-lead uk-display-block uk-text-muted"><?php echo $item['subtitle']; ?></span>
                <?php endif; ?>

            </div>
            <?php if ($media && $settings['media']) : ?>
            <div class="uk-width-1-1 uk-width-medium-1-2">
            <?php else: ?>
            <div class="uk-width-1-1 uk-width-medium-3-5">
            <?php endif; ?>
                <p><?php echo $item['content']; ?></p>

                <?php if ($item['link'] && $settings['link']) : ?>
                <a class="<?php echo $link_color; ?>" href="<?php echo $item->escape('link') ?>"<?php echo $link_target; ?>><?php echo $settings['link_text']; ?></a>
                <?php endif; ?>

            </div>

        </div>

    </li>

<?php endforeach; ?>

</ul>

<?php if ($settings['general_link'] && $settings['general_link_text']) : ?>
<div class="uk-container uk-container-center tm-margin-xlarge uk-text-center">
    <a href="<?php echo $settings['general_link']; ?>" class="uk-button"><?php echo $settings['general_link_text']; ?></a>
</div>
<?php endif; ?>
