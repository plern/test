<?php
/**
* @package   yoo_luna
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

$settings['id'] = uniqid('wk-');

$nav = 'uk-dotnav';
$nav .= $settings['nav_contrast'] ? ' uk-dotnav-contrast' : '';

// JS Options
$options = array();
$options[] = ($settings['animation'] != 'fade') ? 'animation: \'' . $settings['animation'] . '\'' : '';
$options[] = ($settings['duration'] != '500') ? 'duration: ' . $settings['duration'] : '';
$options[] = ($settings['autoplay']) ? 'autoplay: true ' : '';
$options[] = ($settings['interval'] != '3000') ? 'autoplayInterval: ' . $settings['interval'] : '';
$options[] = ($settings['autoplay_pause']) ? '' : 'pauseOnHover: false';

$options = '{'.implode(',', array_filter($options)).'}';

// Title Size
switch ($settings['title_size']) {
    case 'large':
        $title_size = 'uk-heading-large';
        break;
    default:
        $title_size = 'uk-' . $settings['title_size'];
}

// Panel
$panel = 'uk-panel';
switch ($settings['panel']) {
    case 'box' :
        $panel .= ' uk-panel-box';
        break;
    case 'primary' :
        $panel .= ' uk-panel-box uk-panel-box-primary';
        break;
    case 'secondary' :
        $panel .= ' uk-panel-box uk-panel-box-secondary';
        break;
}

// Content Size
switch ($settings['content_size']) {
    case 'large':
        $content_size = 'uk-text-large';
        break;
    case 'h2':
    case 'h3':
    case 'h4':
        $content_size = 'uk-' . $settings['content_size'];
        break;
    default:
        $content_size = '';
}

?>

<div id="<?php echo $settings['id']; ?>" class="tm-slideshow-luna uk-slidenav-position">

    <div class="<?php echo $panel; ?> uk-text-center">

        <div data-uk-slideshow="<?php echo $options; ?>">

            <ul class="uk-slideshow tm-slideshow-luna-content">

                <?php foreach ($items as $item) :

                    // watermark
                    $watermark = $item['watermark'] ? 'data-tm-watermark="'.$item['watermark'].'"' : '';

                    ?>

                    <li <?php echo $watermark; ?>>
                        <div class="uk-width-medium-3-5 uk-container-center">
                            <?php if ($item['title'] && $settings['title']) : ?>
                            <h3 class="<?php echo $title_size; ?>"><?php echo $item['title']; ?></h3>
                            <?php endif; ?>

                            <?php if ($item['content'] && $settings['content']) : ?>
                            <div class="<?php echo $content_size; ?>"><?php echo $item['content']; ?></div>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>

            </ul>

            <ul class="<?php echo $nav; ?> uk-margin-remove uk-flex-center uk-position-relative uk-position-z-index">
                <?php foreach ($items as $i => $item) : ?>
                <li class="" data-uk-slideshow-item="<?php echo $i; ?>"><a href="#"></a></li>
                <?php endforeach; ?>
            </ul>

        </div>

    </div>

    <div data-uk-slideshow>

        <ul class="uk-slideshow tm-slideshow-luna-avatar">
            <?php foreach ($items as $i => $item) :

                $media = '';

                if ($item->type('media') == 'image') {
                    $attrs['alt'] = strip_tags($item['title']);
                    $media = $item->thumbnail('media', 150, 150, $attrs);
                }

                ?>

                <li>
                    <?php if ($item['media']) echo $media; ?>

                    <?php if ($item['link'] && $settings['link']) : ?>
                    <a href="<?php echo $item['link']; ?>" class="uk-position-cover"></a>
                    <?php endif; ?>
                </li>

            <?php endforeach; ?>
        </ul>

    </div>

</div>

<script>

    (function($){

        var settings   = <?php echo json_encode($settings); ?>,
            container  = $('#<?php echo $settings["id"]; ?>'),
            slideshows = container.find('[data-uk-slideshow]');

        if (slideshows.length > 1) {
            container.on('beforeshow.uk.slideshow', function(e, next) {
                slideshows.not(next.closest('[data-uk-slideshow]')[0]).data('slideshow').show(next.index());
            });
        }

        if (settings.autoplay && settings.autoplay_pause) {

            container.on({
                mouseenter: function() {
                    slideshows.each(function(){
                        $(this).data('slideshow').stop();
                    });
                },
                mouseleave: function() {
                    slideshows.each(function(){
                        $(this).data('slideshow').start();
                    });
                }
            });
        }

    })(jQuery);

</script>
