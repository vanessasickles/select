<?php
/*
 * Template Name: Featured Post
 * Template Post Type: post
 */
 
 get_header(); ?>
<div class="featured-vignette"></div>
<?php 
    $post_id = get_the_ID();
    $featured_image = get_the_post_thumbnail($post_id, 'full');
?>

<div class="main">
    <div class="container featured-container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1><?php the_title() ?></h1>
            <?php get_template_part('partials/item-byline', get_post_format()); ?>
        <?php 
            get_template_part('content', get_post_format());
        endwhile; endif; ?>


        <?php include(locate_template( 'partials/author-blurb.php', get_post_format() )); 
            include(locate_template( 'partials/share-article.php', get_post_format() ));
         ?>
    </div>

    <?php include(locate_template( 'partials/related-posts.php', get_post_format() )); ?>
</div>
<?php get_footer(); ?>