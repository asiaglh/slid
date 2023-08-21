<section class="main-page">
    <div id="main-page__video">
        <video width="100%" autoplay muted playsinline loop preload poster="<?php echo get_template_directory_uri(); ?>./assets/bg-video.jpg">
            <source src="<?php echo get_field('video_link')?>" type="video/mp4">
        </video>
    </div>
    <div class="main-page__content">
        <div class="container">
            <div class="main-page__container">
                <div class="main-page__description">
                    <h4 class="main-page__subtitle"><?php echo get_field('author')?></h4>
                    <h1 class="main-page__title"><?php echo get_field('title')?></h1>
                    <div class="main-page__block">
                        <?php $digital = get_field('digital');
                              $ditital_links = $digital['digital-link'];
                        ?>
                        <?php if ($digital) : ?>
                            <div class="main-page__row">
                                <p class="main-page__label"><?php echo $digital['title-block']; ?></p>
                                <div class="btns">
                                    <?php foreach($ditital_links as $item) { ?>
                                    <a href="<?php echo $item['link-url'] ?>"
                                       target="_blank">
                                        <?php
                                        $img = $item['link-img'];
                                        if ($img) {
                                            echo '<img src="' . esc_url($img['url']) . '" class="main-page__app" alt="' . esc_attr($img['alt']) . '">';
                                        }
                                        ?>
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php $printed = get_field('printed'); ?>
                        <?php if ($printed['title-block']) : ?>
                            <div class="main-page__row">
                                <p class="main-page__label"><?php echo $printed['title-block']; ?></p>
                                <div class="btns">
                                    <button class="main-page__btn btn btn-online" id="btn-online" onclick="openPopUpForm()">Онлайн</button>
<!--                                    <a href="--><?php //echo  $cards = get_field('button-contact', 'option');?><!--" target="_blank" class="main-page__btn btn btn-store" id="btn-store">В магазині</a>-->
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="main-page__img">
                    <?php
                    $img = get_field('img');
                    if ($img) {
                        echo '<img src="' . esc_url($img['url']) . '" class="logo" alt="' . esc_attr($img['alt']) . '">';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>