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
                    <?php 
                    if( have_rows('quiz') ):
                        while ( have_rows('quiz') ) : the_row(); ?>

                            <div class="quiz-graph">
                                <h3><?php echo get_sub_field('graph_label'); ?></h3>
                                <?php if( have_rows('options') ):
                                    while ( have_rows('options') ) : the_row();
                                        $value = get_sub_field('value'); ?>
                            
                                        <div class="quiz-bar">
                                            <span class="bar-value"><?php echo $value ?>%</span>
                                        </div>                    
                                    <?php endwhile;
                                endif; ?>
                            </div>

                        <?php endwhile;
                    endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>