<section class="trailer">
    <div class="container">
        <div class="content__wrapper">
            <h2 class="trailer__title title"><?php echo get_field('title') ?></h2>
            <div class="trailer__video video">
                <?php
                $img = get_field('poster');
                if ($img) {
                    echo '<img src="' . esc_url($img['url']) . '" class="video__thumbnail" alt="' . esc_attr($img['alt']) . '">';
                }
                ?>
                <iframe class="video__iframe" src="<?php echo get_field('link') ?>" title="Сліди на дорозі - трейлер"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</section>