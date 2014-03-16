<?php get_header(); ?>
    <div id="content" class="cf">
        <div class="home-row cf">
            <div class="left-col"><div id="gallery" class="fotorama" data-width="598" data-height="245" data-autoplay="true" data-loop="true">
		<?php
                    // Select 5 most recent media images to display in the gallery
                    $images = get_posts( array(
                                                'post_type' => 'attachment',
                                                'post_mime_type' => 'image',
                                                'numberposts' => 5,
                                                'post_status' => null)
                                        );
                    foreach ( $images as $img ) {
                        echo '<img src="' . wp_get_attachment_url($img->ID) . '" />';
                    }
		?>
            </div></div>
            <div class="right-col"><div id="involved-box">
                <h2><?= __('Get Involved!', 'col-wp') ?></h2>
                <ul>
                    <li><a href="<?php echo home_url('/'); ?>pray/"><?= __('pray', 'col-wp'); ?></a></li>
                    <li><a href="<?php echo home_url('/'); ?>volunteer/"><?= __('volunteer', 'col-wp'); ?></a></li>
                    <li><a href="<?php echo home_url('/'); ?>donate/"><?= __('donate', 'col-wp'); ?></a></li>
                    <li><a href="<?php echo home_url('/'); ?>connect/"><?= __('connect', 'col-wp'); ?></a></li>
                </ul>
            </div></div>
        </div>
        <div class="home-row cf">
             <div class="left-col lc-sm">
                <?php
                    /*
                     * Query for the first featured post
                     */
                    query_posts('posts_per_page=1&featured=yes');
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $featured_post_ID = $post->ID; // keep track of this post so we don't show it again on this page
                ?>
                <a href="<?php the_permalink(); ?>" class="story-box-link">
                <div id="featured-box" class="story-box">
                    
                    <?php
                      if ( has_post_thumbnail() ) {
                        // Insert the thumbnail and identify its orientation with a class
                        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                        // If width > height, the thumbnail is landscape
			// width/height ratio: 360/275
                        if ($thumbnail[1]/$thumbnail[2] >= 360/275) {
                            echo get_the_post_thumbnail($post->ID, array(360, 275), array('class' => 'landscape'));
                        } else {
                            echo get_the_post_thumbnail($post->ID, 'medium', array('class' => 'portrait'));
                        }
                      }  
                    ?>
                    <div class="overlay">
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo implode(' ', array_slice(explode(' ', strip_tags($post->post_content, '')), 0, 10)); ?></p>
                    </div>
                </div>
                </a>
                <?php endwhile; else: ?>
                    <div id="featured-box" class="story-box">
                        <div class="overlay">
                            <h2><?= __('No featured story today.', 'col-wp'); ?></h2>
                        </div>
                    </div>
                <?php endif; wp_reset_query(); ?>
            </div>
            <div class="right-col rc-lg"><div id="about-box" >
                <h2><?= __('who are we?', 'col-wp'); ?></h2>
                <p>The description with a <a href="#">Link</a>.<br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultricies dolor quis tempus pellentesque. Nulla nec augue ac nibh posuere ullamcorper. Etiam facilisis, urna vel lobortis rhoncus, lorem ante imperdiet sem, in ornare dolor turpis tincidunt urna. Pellentesque eu eros justo. Curabitur sed quam malesuada, sagittis urna nec, imperdiet urna. Mauris in odio eu libero lobortis luctus. Nunc vestibulum, risus ac malesuada porttitor, enim velit ullamcorper dolor, vitae volutpat lectus velit sed elit. Aenean adipiscing velit ipsum, nec consequat turpis iaculis vel. Aliquam ullamcorper neque at fermentum tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur rhoncus at tortor in tincidunt.
                </p>
            </div></div>
        </div>
        <div class="home-row cf">
            <div class="left-col lc-sm">
                <?php
                    /*
                     * Query for the most recent post (exclude prayer requests)
                     */
                    query_posts('posts_per_page=1');
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                    if ($post->ID == $featured_post_ID) continue; // skip the featured post if it comes up
                    
                    $new_post_ID = $post->ID; // keep track of this post so we don't show it again on this page                  
                ?>
                <a href="<?php the_permalink(); ?>" class="story-box-link">
                <div id="new-box" class="story-box">
                    
                    <?php
                      if ( has_post_thumbnail() ) {
                        // Insert the thumbnail and identify its orientation with a class
                        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                        // If width > height, the thumbnail is landscape
                        if ($thumbnail[1] > $thumbnail[2]) {
                            echo get_the_post_thumbnail($post->ID, 'large', array('class' => 'landscape'));
                        } else {
                            echo get_the_post_thumbnail($post->ID, 'large', array('class' => 'portrait'));
                        }
                      }  
                    ?>
                    <div class="overlay">
                        <h2><?php the_title(); ?></h2>
                        <!-- Echo the first 10 words of the post content, without HTML formatting -->
                        <p><?php echo implode(' ', array_slice(explode(' ', strip_tags($post->post_content, '')), 0, 10)); ?></p>
                    </div>
                </div>
                </a>
                <?php endwhile; else: ?>
                    <div id="featured-box" class="story-box">
                        <div class="overlay">
                            <h2><?= __('No new story today.', 'col-wp'); ?></h2>                            
                        </div>
                    </div>
                <?php endif; wp_reset_query(); ?>
            </div>
            <div class="mid-col"><div id="posts-box">
                <h3><?= __('More Posts', 'col-wp'); ?></h3>
                <ul>
                    <?php query_posts('posts_per_page=5');
			$count = 0;
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
			    if ($count == 3) break;
                            // Don't show posts that have already been shown
                            if ($post->ID == $featured_post_ID || $post->ID == $new_post_ID) continue;
			    $count++;
                    ?>
                        <li><a href="<?php the_permalink(); ?>">
                            <h6><?php the_title(); ?></h6>
                            <!-- Echo the first 10 words of the post content, without HTML formatting -->
                            <p><?php echo implode(' ', array_slice(explode(' ', strip_tags($post->post_content, '')), 0, 10)); ?></p>
                        </a></li>
                    <?php endwhile; endif; wp_reset_query(); ?>
                    <li><a href="<?php echo home_url('/'); ?>our-stories/" id="read-more-link">
                        <?= __('Read More', 'col-wp'); ?>
                    </a></li>
                </ul>
            </div></div>
            <div class="right-col">
                <?php include 'fb-like-box.php'; ?>
            </div>
        </div>
    </div>    
<?php get_footer(); ?>