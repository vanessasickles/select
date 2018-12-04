<?php get_header(); ?>

    <div class="main">
        <div class="container page-404">
            <h1>Oops! Page not found.</h1>
            <div class="search">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <label>
                        <span class="screen-reader-text search-form-label"><?php echo _x( 'Search for:', 'label', 'twentysixteen' ); ?></span>
                        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                    </label>
                    <button type="submit" class="search-submit"><span class="screen-reader-text text-link"><?php echo _x( 'Search', 'submit button', 'twentysixteen' ); ?></span></button>
                </form>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>