<footer class="footer">
    <div class="footer__img">
        <?php
        $img = get_field('footer-background', 'option') ;
        if ($img) {
            echo '<img src="' . esc_url($img['url']) . '"  alt="' . esc_attr($img['alt']) . '">';
        }
        ?>
    </div>
    <div class="footer__container">
        <div class="container">
            <div class="footer__blocks">
                <div class="footer__block">
                    <p class="footer__p">© 2023 Валерій Маркус</p>
                    <?php
                    $menu_items = wp_get_nav_menu_items('menu-footer');
                    if ($menu_items) {
                        foreach ($menu_items as $menu_item) {
                            $url = $menu_item->url;
                            $title = $menu_item->title;
                            echo '<a href="' . esc_url($url) . '" class="footer__contract" target="_blank">' . esc_html($title) . '</a>';
                        }
                    }
                    ?>
                </div>
                <div class="footer__block">
                    <p class="footer__p">Приймаємо оплату</p>
                    <div  class="footer__flex">
                        <?php
                        $cards = get_field('footer-cards', 'option');
                        if ($cards) { ?>
                        <?php foreach ($cards as $item) { ?>
                                <a href="<?php echo $item['link']?>" target="_blank">
                                    <?php
                                    $img = $item['img'];
                                    if ($img) {
                                        echo '<img src="' . esc_url($img['url']) . '"  alt="' . esc_attr($img['alt']) . '">';
                                    }
                                    ?>
                                </a>
                              <?php } ?>
                         <?php } ?>
                    </div>
                </div>
                <?php  $socials = get_field('socials', 'option');
                if($socials)  :  ?>
                <div class="footer__block">
                    <p class="footer__p">Соціальні мережі</p>
                    <div class="footer__flex">
                        <?php foreach($socials as $item) { ?>
                        <a href="<?php echo $item['social-link'] ?>" target="_blank">
                            <?php
                            $img = $item['social-img'] ;
                            if ($img) {
                                echo '<img src="' . esc_url($img['url']) . '" class="footer__social"    alt="' . esc_attr($img['alt']) . '">';
                            }
                            ?>
                        </a>
                        <?php } ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<div class="pop-up"></div>
</body>
</html>