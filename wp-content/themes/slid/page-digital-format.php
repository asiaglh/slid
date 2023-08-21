<?php

/* Template Name: Digital */

get_header(); ?>

    <main class="main digital-main">
        <section class="digital">
            <div class="container">
                <div class="content__wrapper">
                    <h2 class="digital__title title"><?php the_title(); ?></h2>
                    <div class="digital__text">
                        <p><?php echo get_field('sub-info') ?></p>
                    </div>
                </div>
                <div class="digital__slider">
                    <div class="digital__screenshots">
                        <?php $slider = get_field('slider'); ?>
                        <?php if ($slider) : ?>
                            <?php foreach($slider as $item) { ?>
                                <?php
                                $photo = $item['img'] ;
                                if ($photo) {
                                    echo '<img src="' . esc_url($photo['url']) . '" class="digital__screenshot"   alt="' . esc_attr($photo['alt']) . '">';
                                }
                                ?>
                            <?php } ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="content__wrapper">
                    <div class="digital__flex">
                        <?php $text_block = get_field('text-block');
                              $links =  $text_block['links']  ?>
                        <?php if ($text_block) : ?>
                            <div class="digital__text">
                                <p><?php echo $text_block['text1']; ?></p>
                            </div>
                            <div class="digital__payments">
                                <?php
                                $photo = $text_block['sub-img'] ;
                                if ($photo) {
                                    echo '<img src="' . esc_url($photo['url']) . '" class="digital__payments-img"   alt="' . esc_attr($photo['alt']) . '">';
                                }
                                ?>
                                <?php foreach($links as $item) { ?>
                                    <div class="digital__block">
                                        <div class="digital__payment">
                                            <p class="digital__payment-label"><?php echo $item['link-label']; ?></p>
                                            <a class="digital__payment-ios payment-link" href="<?php echo $item['link-url']; ?>" target="_blank">
                                                <?php
                                                $link_img = $item['link-img'] ;
                                                if ($link_img) {
                                                    echo '<img src="' . esc_url($link_img['url']) . '" alt="' . esc_attr($link_img['alt']) . '">';
                                                }
                                                ?>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="digital__text">
                                <p><?php echo $text_block['text2']; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="audiobook">
            <?php $audiobook = get_field('audio-book'); ?>
            <?php if ($audiobook) : ?>
                <div class="container">
                    <div class="content__wrapper">
                        <h2 class="audiobook__title title"><?php echo $audiobook['title']  ?></h2>
                    </div>
                    <div class="audiobook__video video">
                        <?php
                        $img = $audiobook['prev-img'] ;
                        if ($img) {
                            echo '<img src="' . esc_url($img['url']) . '" class="video__thumbnail" alt="' . esc_attr($img['alt']) . '">';
                        }
                        ?>
                        <iframe class="video__iframe" src="<?php echo $audiobook['link']  ?>" title="Сліди на дорозі - Аудіокнига"
                                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            <?php endif; ?>

        </section>
    </main>

<?php get_footer(); ?>