<?php
/* Template Name: Archive Template */
?>
<?php get_header(); ?>

<div id="content" class="cf">
    <div id="left-col">
        <div class="col-title red">
            <h2><?= __('Our Stories', 'col-wp'); ?></h2>
        </div>
        <?php
            query_posts('posts_per_page=-1');
            if ( have_posts() ) : while ( have_posts() ) : the_post();
        ?>
        <div class="text-box">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?>
            </div>
        <?php endwhile; else: ?>
        <p><?= __('Oddly we have no stories.', 'col-wp'); ?></p>
        <?php endif; wp_reset_query(); ?>
        </div>
    <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>