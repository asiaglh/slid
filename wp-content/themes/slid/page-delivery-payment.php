<?php

/* Template Name: Delivery-Payment */

get_header(); ?>

    <main class="main delivery-main">
        <?php $content_item = get_field('content-item'); ?>
        <?php if ($content_item) : ?>
            <?php foreach($content_item as $item) { ?>
                <section class="delivery">
                    <div class="container">
                        <div class="content__wrapper">
                            <h2 class="delivery__title title"><?php echo $item['title'] ?></h2>
                            <div class="delivery__text text">
                                <?php echo $item['content'] ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        <?php endif; ?>
    </main>

<?php get_footer(); ?>