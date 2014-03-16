<?php
/* Template Name: Search Template */
?>
<?php get_header(); ?>

<div id="content" class="cf">
    <div id="left-col">
        <div class="col-title red">
            <h2><?= __('Search Results:', 'col-wp'); ?></h2>
        </div>
        <div id="search-results">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <a href="<?php the_permalink(); ?>"><div class="text-box">
                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
        </div></a>
        <?php endwhile; else: ?>
        <p><?= __('No search results found for ', 'col-wp'); ?>'<?php the_search_query(); ?>'.</p>
        <?php endif; ?>
	</div>
    </div>
    <?php get_sidebar(); ?>
</div>
 
<?php get_footer(); ?>