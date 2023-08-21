<section class="book">
    <div class="container">
        <div class="content__wrapper book_wrapper">
            <div class="book__description">
                <?php echo get_field('book-content'); ?>
            </div>
            <div class="book__links">
                <?php
                $img = get_field('img');
                if ($img) {
                    echo '<img src="' . esc_url($img['url']) . '" class="book__img" alt="' . esc_attr($img['alt']) . '">';
                }
                ?>
               <div class="book__btns btns">
                    <button target="_blank" class="book__btn  btn btn-online" onclick="openPopUpForm()">Замовити книгу</button>
<!--                    <a href="--><?php //echo  $cards = get_field('button-contact', 'option');?><!--" target="_blank" class="book__btn btn btn-store">Знайти в магазині</a>-->
                </div>
                <?php
                $qr_code = get_field('qr-code');
                if ($qr_code) {
                    echo '<img src="' . esc_url($qr_code['url']) . '" class="book__qrcode" alt="' . esc_attr($qr_code['alt']) . '">';
                }
                ?>
            </div>
        </div>
    </div>
</section>
