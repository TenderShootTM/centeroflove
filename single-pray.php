<?php
/*
Template Name: Prayer Request Template
*/
?>
<?php get_header(); ?>
    <div id="content" class="cf">
        <div id="left-col">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div id="story" class="text-box lg-text">
                    <?php
                      if ( has_post_thumbnail() ) {
                        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                        echo get_the_post_thumbnail($post->ID, 'full');
                      }
                    ?>
                    <?php the_content(); ?>
                </div>
            <?php endwhile; else: ?>
                <div id="story" class="text-box"> 
                    <p><?= __('Sorry, no posts matched your criteria.', 'col-wp'); ?></p>
                </div>
            <?php endif; ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>