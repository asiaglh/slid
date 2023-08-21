<section class="excerpts" id="excerpts">
    <div class="container">
        <div class="content__wrapper">
            <h2 class="excerpts__title title"><?php echo get_field('title') ?></h2>
            <div class="excerpts__block">
                <?php $excerpts = get_field('excerpt'); ?>
                <?php foreach($excerpts as $item) { ?>
                    <?php $excerpt_post = $item['post']; ?>
                    <article class="excerpt">
                        <div class="excerpt__num">
                            <?php
                            $img = $item['num'] ;
                            if ($img) {
                                echo '<img src="' . esc_url($img['url']) . '"  alt="' . esc_attr($img['alt']) . '">';
                            }
                            ?>
                        </div>
                        <h3 class="excerpt__title"><?php echo get_the_title($excerpt_post); ?></h3>
                        <p class="excerpt__text">
                            <?php $prev_text = get_field('prev-text', $excerpt_post); ?>
                            <?php echo $prev_text; ?>
                        </p>
                        <a class="excerpt__btn more__btn" href="<?php echo esc_url(get_permalink($excerpt_post)); ?>" target="_blank">Детальніше</a>
                    </article>
                <?php } ?>
            </div>
        </div>
    </div>
</section>