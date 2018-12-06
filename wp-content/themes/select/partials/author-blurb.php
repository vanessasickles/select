<div class="author-blurb">
    <div class="container">
        <?php $author_id=$post->post_author; ?>
        <a class="author-avatar" href="<?php the_author_link() ?>">
            <?php echo get_avatar($author_id, 'thumbnail'); ?>
        </a>
        <div class="author-info">
            <div class="author-details">
                <div class="author-container">

                    <a class="author-nickname" href="<?php the_author_link() ?>"><?php echo get_the_author_meta('nickname') ?></a>

                    <?php $author_id = get_the_author_meta('ID'); ?>

                    <?php if (get_field('twitter', 'user_'.$author_id)) {?>
                        <a class="twitter-icon" href="<?php the_field('twitter', 'user_'.$author_id) ?>">
                            <i class="fab fa-twitter"></i>
                        </a>
                    <?php }; ?>

                    <?php if (get_field('instagram', 'user_'.$author_id)) {
        ?>
                        <a class="instagram-icon" href="<?php the_field('instagram', 'user_'.$author_id) ?>">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php }; ?>

                    <?php if (get_the_author_meta('user_email')) { ?>
                        <a class="email-icon" href="mailto:<?php echo get_the_author_meta('user_email') ?>">
                            <i class="far fa-envelope"></i>
                        </a>
                    <?php }; ?>
                </div>
            </div>

            <p class="author-bio">
                <?php echo get_the_author_meta('description') ?>
            </p>
        </div>

    </div>
</div>