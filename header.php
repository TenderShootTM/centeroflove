<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/layout.css" type="text/css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/colors.css" type="text/css">
    <?php if (get_current_lang() == 'ar') {
        // load rtl.css if the page is in Arabic
        $csslink = '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/rtl.css" type="text/css"/>';
        echo $csslink;
    }
    ?>
    
    <?php if (is_home()) : ?>
    <!-- Include code for homepage gallery slider -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/gallery/fotorama.css" type="text/css">
    
    <script src="<?php bloginfo('template_url'); ?>/gallery/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/gallery/fotorama.js"></script>
    
    <?php endif; // is_home() ?>
</head>
<body>
<div id="wrapper"> <!-- </div> tag for wrapper is in footer.php -->
    <div id="header">
        <h1><?= __('center of love', 'col-wp'); ?></h1>
        <?php get_lang_switcher(); ?>
        <div id="nav" class="cf">
            <?php
                // Identify which page we are on and give it class=selected
                $sel_involved_box = array(4);
                switch ($_SERVER['REQUEST_URI']) {
                    case "/ar/":
                    case "/":
                        $sel_nav[0] = 'class="selected"';
                        break;
                    case "/ar/about-us/":
                    case "/about-us/":
                        $sel_nav[1] = 'class="selected"';
                        break;
                    case "/ar/our-stories/":
                    case "/our-stories/":
                        $sel_nav[2] = 'class="selected"';
                        break;
                    case "/ar/how-to-help/":
                    case "/how-to-help/":
                        $sel_nav[3] = 'class="selected"';
                        break;
                    default:
                        break;
                }
            ?>
            <ul>
                <li><a href="<?= home_url('/'); ?>"              <?= $sel_nav[0] ?>><?= __('home', 'col-wp'); ?></a></li>
                <li><a href="<?= home_url('/'); ?>about-us/"     <?= $sel_nav[1] ?>><?= __('about us', 'col-wp'); ?></a></li>
                <li><a href="<?= home_url('/'); ?>our-stories/"  <?= $sel_nav[2] ?>><?= __('our stories', 'col-wp'); ?></a></li>
                <li><a href="<?= home_url('/'); ?>how-to-help/"  <?= $sel_nav[3] ?>><?= __('how to help', 'col-wp'); ?></a></li>
                
                <?php get_search_form(); ?>
            </ul>
        </div>
        <div id="bar">
            <span></span>
        </div>
    </div>