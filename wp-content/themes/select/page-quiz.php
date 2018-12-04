<?php
/**
 * Template Name: Interactive Quiz
 */
?>

<?php get_header(); ?>

<div class="main">
    <div class="container">
        <div class="quiz-container">
            <div class="quiz-inner">
                <div class="quiz-progress">
                    <?php if( have_rows('quiz') ):
                        while ( have_rows('quiz') ) : the_row(); ?>
                            <div class="quiz-marker">
                            </div>
                        <?php endwhile;
                    endif;
                    ?>
                </div>

                <div class="quiz-opener">
                    <h1><?php the_title() ?></h1>
                    <p><?php echo get_field('description') ?></p>

                    <button class="start-quiz">Take the Quiz</button>

                    <a class="skip-quiz">skip to statistics</a>
                </div>

                <!-- Quiz Slides -->
                <?php 
                if( have_rows('quiz') ):
                    while ( have_rows('quiz') ) : the_row();
                        get_template_part( 'partials/quiz-slide');
                    endwhile;
                endif;
                ?>

                <!-- Quiz Results -->
                <div class="quiz-results">
                    <h2>You answered <span class="final-score"></span> of the questions correctly!</h2>

                    <div class="all-statistics">
                        <?php 
                        if( have_rows('quiz') ):
                            while ( have_rows('quiz') ) : the_row(); ?>
                                <?php include(locate_template( 'partials/quiz-graph.php', get_post_format() )); ?>
                            <?php endwhile;
                        endif; 
                        ?>
                    </div>

                    <div class="quiz-article">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <h2><?php the_title() ?></h2>
                            <div class="item-byline">
                                <span>by <a href="<?php the_author_link() ?>"><?php the_author() ?></a></span>
                                <span><?php the_date() ?></span>
                            </div>
                            <div class="page-content">
                                <?php get_template_part( 'content', get_post_format() ); ?>
                            </div>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>