<?php get_header(); ?>
    <div class="main">
        <div class="container">

            <!-- Feature Banner -->
            <?php 
                $post_object = get_field('feature_banner');
                if($post_object): {
                    $post = $post_object;
                    setup_postdata( $post );
                    $post_id = get_the_ID(); ?>

                    <div class="feature-banner">
                        <div class="post-tile">
                            <a class="post-link" href="<?php get_permalink() ?>"></a>
                            <?php the_post_thumbnail($post_id) ?>
                            <div class="tile-title">
                                <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h3>
                                <?php the_category() ?>
                            </div>
                        </div>
                    </div>

                <?php } endif;
            ?>

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
                                $args = array('posts_per_page' => '4');
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
                            <h2>Feature</h2>
                        </div>
                        <div class="tile-roll">
                            <?php 
                                $args = array('posts_per_page' => '4', 'category_name' => 'features');
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
                            $args = array('posts_per_page' => '8', 'category_name' => 'news');
                            $news_posts = $query_name;
                                include(locate_template( 'partials/sidebar-loop.php', get_post_format() )); 
                        ?>
                    </div>

                    <div class="see-all-bar">
                        <a href="<?php echo site_url() . '/category/news' ?>" class="text-link">see all news articles</a>
                    </div>

                    <div class="header-bar">
                        <h2>Spotlights</h2>
                    </div>
                    <div class="sidebar-roll">
                        <?php 
                            $args = array('posts_per_page' => '8', 'category_name' => 'news');
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

                <!-- Analysis Posts -->
                <div class="archive-section">
                        <div class="header-bar">
                            <h2>Analysis</h2>
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