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
        <div class="item-byline">
            <span>by <a href="<?php the_author_link() ?>"><?php the_author() ?></a></span>
            <span><?php the_date() ?></span>
        </div>
    <?php 
        get_template_part('content', get_post_format());
    endwhile; endif; ?>
    </div>
</div>
<?php get_footer(); ?>