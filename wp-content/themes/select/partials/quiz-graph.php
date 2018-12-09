<div class="quiz-graph-outer">
    <h3><?php echo get_sub_field('graph_label'); ?></h3>
    <div class="quiz-graph-inner">
        <?php if( have_rows('options') ):
            while ( have_rows('options') ) : the_row();
                $value = get_sub_field('value'); ?>

                <?php  $label = get_sub_field('label'); ?>
                <div class="quiz-bar">
                    <span class="bar-label"><?php echo $label ?></span>
                    <span class="bar-value"><?php echo $value ?>%</span>
                </div>                    
            <?php endwhile;
        endif; ?>
    </div>
    <span class="graph-label floor">0%</span><span class="graph-label ceiling"><?php echo get_field('percentage_ceiling'); ?>%</span>
</div>