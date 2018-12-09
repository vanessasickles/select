<?php get_header(); ?>

<div class="main author-profile">
    <div class="header-image">
        <?php 
            $author_id=$post->post_author;
            $profile_banner_id = get_field('profile_banner', 'user_'.$author_id);
            $profile_banner = wp_get_attachment_image($profile_banner_id, 'full');
        ?>
        <?php if($profile_banner) { 
            
            echo $profile_banner;
        }; ?> 
    </div>
    <?php get_template_part( 'partials/author-blurb', get_post_format() ); ?>
    <div class="container archive-container">
        <div class="secondary-content">
            <?php
                $args = array(
                    'cat' => $cat,
                    'post__not_in' => $sticky,
                    'ignore_sticky_posts' => 1,
                );
                $category_posts = $query_name;

                include(locate_template( 'partials/archive-loop.php', get_post_format() )); 
            ?>
        </div>
    </div>
</div> 

<?php get_footer(); ?>