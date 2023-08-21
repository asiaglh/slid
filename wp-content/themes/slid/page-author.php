<?php

/* Template Name: Author */

get_header();  ?>

    <main class="main">
        <section class="about">
            <div class="container about__container">
                <h2 class="about__title title"><?php the_title(); ?></h2>
                <?php
                $photo = get_field('main-img');
                if ($photo) {
                    echo '<img src="' . esc_url($photo['url']) . '" class="about__img about-img" alt="' . esc_attr($photo['alt']) . '">';
                }
                ?>
                <div class="about__text">
                    <div class="about-mainText">
                        <?php echo get_field('main-info') ?>
                    </div>
                    <div class="about-simpleText">
                        <?php echo get_field('sub-info') ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="description" style="margin-top: -32px;">
            <?php $text_block = get_field('text-block'); ?>
            <?php if ($text_block) : ?>
                <div class="container">
                    <div class="about-mainText">
                        <p><?php echo $text_block['center-text']; ?></p>
                    </div>
                    <div class="description__flex">
                        <?php
                        $photo = $text_block['sub-img'];
                        if ($photo) {
                            echo '<img src="' . esc_url($photo['url']) . '" class="description__img about-img" alt="' . esc_attr($photo['alt']) . '">';
                        }
                        ?>
                        <div class="about-simpleText">
                            <?php echo $text_block['right-text']; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            </section>


        <section class="footprints">
            <div class="container">
                <?php $about_book = get_field('about-book'); ?>
                <?php if ($about_book) : ?>
                    <div class="content__wrapper">
                        <h2 class="footprints__title title"><?php echo $about_book['title']; ?></h2>
                        <div class="about-simpleText">
                            <?php echo $about_book['text']; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>


<?php get_footer(); ?>