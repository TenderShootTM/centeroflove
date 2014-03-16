<?php
/* Template Name: Page Involved Template */
?>
<?php get_header(); ?>

<?php
    $url = parse_url(site_url(), PHP_URL_PATH);
    switch ($_SERVER['REQUEST_URI']) {
        case $url."/pray/":
        case $url."/ar/pray/":
            $is_prayer = true;
            break;
        case $url."/connect/":
        case $url."/ar/connect/":
            $is_connect = true;
            break;
        default:
            break;
    }
?>
<div id="content" class="cf">
    <div id="left-col">
        <div class="col-title gold center">
            <?php if ($is_prayer) : ?>
            <h2><?= __('Prayer Requests', 'col-wp'); ?></h2>
        </div>
        <div id="pray-list" class="cf"><ul>
        <?php
            $prayers = get_posts( array( 'post_type' => 'pray', 'suppress_filters' => false ) );
            if (!empty($prayers)) : foreach( $prayers as $post ) : setup_postdata($post); ?>
                <li><a href="<?php the_permalink(); ?>"><p><?php the_content(); ?></p></a></li>
        <?php endforeach; endif; ?>
        </ul></div>
            <?php else: ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="text-box lg-text">
            <?php the_content(); ?>
        </div>
        
        <?php if ( $is_connect ) : ?>
        <div id="connect-wrapper" class="cf">
            <a href="#"><div class="connect-box">
                <?= __('Facebook', 'col-wp'); ?>
            </div></a>
            <a href="mailto:centeroflove2010&#64;gmail&#46;com"><div class="connect-box">
                <?= __('Email', 'col-wp'); ?>
            </div></a>
            <a href="<?php bloginfo('rss2_url'); ?>"><div class="connect-box">
                <?= __('RSS Feed', 'col-wp'); ?>
            </div></a>
        </div>
        <?php endif; ?>
        
        <?php endwhile; else: ?>
        <p><?= __('Oddly this page does not exist.', 'col-wp'); ?></p>
        <?php endif; endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div>
 
<?php get_footer(); ?>