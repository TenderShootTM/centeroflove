<?php
/* Template Name: How to Help */
?>
<?php get_header(); ?>
    <div id="content" class="cf">
        <div id="involved-bigbox" class="cf">
            <h2><?= __('Get Involved!', 'col-wp'); ?></h2>
            <a href="<?= home_url('/'); ?>pray/"><div class="involved-subbox">
                <h3><?= __('Pray', 'col-wp'); ?></h3>
                <div>
                    <p>This is an important description that spans a couple of lines and is quite long. Another one might be much shorter but this one is really long.<br>
                    Just in case, just to test. yeahahaha.</p>
                </div>
            </div></a>
            <a href="<?= home_url('/'); ?>volunteer/"><div class="involved-subbox">
                <h3><?= __('Volunteer', 'col-wp'); ?></h3>
                <div>
                    <p>This is an important description</p>
                </div>
            </div></a>
            <a href="<?= home_url('/'); ?>donate/"><div class="involved-subbox">
                <h3><?= __('Donate', 'col-wp'); ?></h3>
                <div>
                    <p>This is an important description</p>
                </div>
            </div></a>
            <a href="<?= home_url('/'); ?>connect/"><div class="involved-subbox">
                <h3><?= __('Connect', 'col-wp'); ?></h3>
                <div>
                    <p>This is an important description. This one has medium length. Woot.</p>
                </div>
            </div></a>
        </div>
    </div>
<?php get_footer(); ?>
