<?php
/* Template Name: Page Template */
?>
<?php get_header(); ?>

<div id="content" class="cf">
    <div id="left-col">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <div class="col-title red">
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="text-box">
            <?php the_content(); ?>
        </div>
        
        <?php endwhile; else: ?>
        <p><?= __('Oddly this page does not exist.', 'col-wp'); ?></p>
        <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div>
 
<?php get_footer(); ?>