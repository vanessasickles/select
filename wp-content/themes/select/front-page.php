<?php get_header(); ?>
    <div class="main">
        <div class="container">
        <!-- Feature Banners -->
            <div class="feature-banners">
                <?php 
                    if( have_rows('feature_banner') ):
                        while ( have_rows('feature_banner') ) : the_row(); ?>
                                <?php 
                                $post_object = get_sub_field('featured_post');
                                $post = $post_object;
                                setup_postdata( $post );
                                $post_id = get_the_ID(); 

                                include(locate_template( 'partials/tile-item.php', get_post_format() ));
                                    
                            wp_reset_postdata();
                        endwhile;
                    endif;
                ?>
            </div>

            <div class="front-main">
                <!-- Left Main Content -->
                <div class="left-content">

                    <!-- Recent Posts -->
                    <div class="tile-roll-block">
                        <div class="header-bar">
                            <h2>Recent</h2>
                        </div>
                        <div class="tile-roll">
                            <?php 
                                $args = array('posts_per_page' => '4', 'ignore_sticky_posts' => 1);
                                $recent_posts = $query_name;
                                    include(locate_template( 'partials/tile-loop.php', get_post_format() )); 
                            ?>
                        </div>
                    </div>

                    <div class="see-all-bar">
                        <a href="<?php echo site_url() . '/recent' ?>" class="text-link">see all recent articles</a>
                    </div>

                    <!-- Feature Posts -->
                    <div class="tile-roll-block">
                        <div class="header-bar">
                            <h2>Features</h2>
                        </div>
                        <div class="tile-roll">
                            <?php 
                                $args = array('posts_per_page' => '4', 'category_name' => 'features', 'ignore_sticky_posts' => 1);
                                $feature_posts = $query_name;
                                    include(locate_template( 'partials/tile-loop.php', get_post_format() )); 
                            ?>
                        </div>
                    </div>

                    <div class="see-all-bar">
                        <a href="<?php echo site_url() . '/category/features' ?>" class="text-link">see all feature articles</a>
                    </div>
                </div>

                <div class="sidebar">
                    <div class="header-bar">
                        <h2>News</h2>
                    </div>

                    <div class="sidebar-roll">
                        <?php 
                            $args = array('posts_per_page' => '7', 'category_name' => 'news', 'ignore_sticky_posts' => 1);
                            $news_posts = $query_name;
                                include(locate_template( 'partials/sidebar-loop.php', get_post_format() )); 
                        ?>
                    </div>

                    <div class="see-all-bar">
                        <a href="<?php echo site_url() . '/category/news' ?>" class="text-link">see all news articles</a>
                    </div>
                    
                    <!-- Featured Page Tile -->
                    <div class="post-tile featured-page-tile">
                        <?php $featured_page_link = get_field('featured_page');
                        $featured_page_image = wp_get_attachment_image(get_field('featured_page_image'), 'medium');
                        $featured_page_text = get_field('featured_page_text'); ?>

                        <a class="post-link" href="<?php echo $featured_page_link ?>"></a>
                        <div class="vignette"></div>
                        <?php echo $featured_page_image ?>
                        <div class="tile-title">
                            <div class="tile-info">
                                <a href="<?php echo $featured_page_link ?>"><h3><?php echo $featured_page_text ?></h3></a>
                            </div>
                            <a class="tile-read-more" href="<?php echo $featured_page_link ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow.svg"></a>
                        </div>
                    </div>

                    <div class="header-bar">
                        <h2>Spotlights</h2>
                    </div>
                    <div class="sidebar-roll">
                        <?php 
                            $args = array('posts_per_page' => '7', 'category_name' => 'news', 'ignore_sticky_posts' => 1);
                            $spotlight_posts = $query_name;
                                include(locate_template( 'partials/sidebar-loop.php', get_post_format() )); 
                        ?>
                    </div>

                    <div class="see-all-bar">
                        <a href="<?php echo site_url() . '/category/news' ?>" class="text-link">see all spotlight articles</a>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="cta">
                <div class="cta-callout"><h3>Want updates when we release awesome content?</h3></div>
                <div class="cta-form"><?php echo do_shortcode('[contact-form-7 id="39" title="Newsletter Signup"]')?></div>
            </div>
                
            
            <!-- Spoiler-Free Reviews Swiper -->
            
            <div class="review-swiper">
                <h2>Spoiler-free Reviews</h2>
                <div class="swiper-container">
                    <div class="swiper-wrapper items-center">
                        <!-- Slides -->
                        <?php 
                            if( have_rows('slider') ):
                                while ( have_rows('slider') ) : the_row();
                                    get_template_part( 'partials/review-slide', get_post_format() );
                                endwhile;
                            endif;
                        ?>
                    </div>

                    <div class="button-gradient"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            </div>

            <div class="secondary-content">
                <!-- Secondary Content -->
                <div class="left-content">

                    <!-- Analysis Posts -->
                    <div class="archive-section">
                        <div class="header-bar">
                            <h2>Analysis</h2>
                        </div>
                        <div class="archive-roll-container">
                            <div class="archive-roll">
                                <?php 
                                    $args = array('posts_per_page' => '4', 'category_name' => 'analysis');
                                    $analysis_posts = $query_name;
                                        include(locate_template( 'partials/archive-loop.php', get_post_format() )); 
                                ?>
                            </div>
                        </div>

                        <div class="see-all-bar">
                            <a href="<?php echo site_url() . '/category/analysis' ?>" class="text-link">see all analysis articles</a>
                        </div>

                    </div>
                </div>

                <!-- news Posts -->
                <div class="archive-section">
                        <div class="header-bar">
                            <h2>news</h2>
                        </div>
                        <div class="archive-roll-container">
                            <div class="archive-roll">
                                <?php 
                                    $args = array('posts_per_page' => '4', 'category_name' => 'news');
                                    $news_posts = $query_name;
                                        include(locate_template( 'partials/archive-loop.php', get_post_format() )); 
                                ?>
                            </div>
                        </div>

                        <div class="see-all-bar">
                            <a href="<?php echo site_url() . '/category/news' ?>" class="text-link">see all news articles</a>
                        </div>

                    </div>
                </div>
                
            </div>

            
    </div> 
<?php get_footer(); ?>