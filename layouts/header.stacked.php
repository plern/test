<nav class="tm-navbar uk-navbar"
    <?php if ($this['config']->get('navbar_sticky')) echo 'data-uk-sticky="{\'top\': \'.uk-block\', \'animation\': \'uk-animation-slide-top\'}"'; ?>>

    <?php if ($this['widgets']->count('logo')) : ?>
    <div class="uk-text-center uk-hidden-small">
        <a class="tm-logo" href="<?php echo $this['config']->get('site_url'); ?>">
            <?php echo $this['widgets']->render('logo'); ?>
        </a>
    </div>
    <?php endif; ?>

    <div class="uk-container uk-container-center uk-margin-top">

        <?php if ($this['widgets']->count('menu + logo')) : ?>
        <div class="uk-flex uk-flex-center uk-flex-middle uk-hidden-small">
            <?php echo $this['widgets']->render('menu'); ?>
        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('logo-small + offcanvas')) : ?>
        <div class="uk-flex uk-flex-middle uk-flex-space-between uk-visible-small">

            <?php if ($this['widgets']->count('logo-small')) : ?>
            <a class="tm-logo-small uk-visible-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a>
            <?php endif; ?>

            <?php if ($this['widgets']->count('offcanvas')) : ?>
            <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
            <?php endif; ?>

        </div>
        <?php endif; ?>

    </div>

    <?php if ($this['widgets']->count('search')) : ?>
    <div class="tm-search">
        <div class="uk-visible-large"><?php echo $this['widgets']->render('search'); ?></div>
    </div>
    <?php endif; ?>

</nav>
