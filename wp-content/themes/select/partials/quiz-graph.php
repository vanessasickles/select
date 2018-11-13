<div class="quiz-graph">
    <?php if( have_rows('options') ):
        while ( have_rows('options') ) : the_row();
            $value = get_sub_field('value'); ?>

            <div class="quiz-bar">
                <span class="bar-value"><?php echo $value ?>%</span>
            </div>                    
        <?php endwhile;
    endif; ?>
</div>