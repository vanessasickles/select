<div class="quiz-slide">
    <div class="quiz-front">
        <?php 
        
        $question = get_sub_field('question'); ?>
        <h2><?php echo $question; ?></h2>
        
        <?php if( have_rows('options') ):
            while ( have_rows('options') ) : the_row();
                $label = get_sub_field('label');
                $correct_option = get_sub_field('correct_option'); ?>

                <button data-answer="<?php echo ($correct_option == true ? 'correct' : 'incorrect') ?>"  class="option"><?php echo $label ?></button>
                
            <?php endwhile;
        endif; ?>

        <div class="quiz-error"></div>
        <button class="submit-answer">check answer</button>
    </div>

    <div class="quiz-back">
        <?php 
            $question = get_sub_field('question');
            $answer_text = get_sub_field('answer_text'); 
        ?>
        <h2 class="answer-message"></h2>
        <span class="answer-description"><?php echo $answer_text ?></span>

        <?php include(locate_template( 'partials/quiz-graph.php', get_post_format() )); ?>

        <button class="next-question">Next Question</button>
    </div>

</div>