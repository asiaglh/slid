<section class="testimonials">
    <div class="container">
        <div class="content__wrapper">
            <h2 class="testimonials__title title"><?php echo get_field('title') ?></h2>
        </div>
        <div class="testimonials__block">
            <?php $reviews = get_field('review-item'); ?>
            <?php if ($reviews) : ?>
                <?php foreach($reviews as $item) { ?>
                    <article class="testimonial <?php echo $item['photo-align'] ?>">
                        <div class="testimonial__img">
                            <?php
                            $photo = $item['photo'] ;
                            if ($photo) {
                                echo '<img src="' . esc_url($photo['url']) . '"  alt="' . esc_attr($photo['alt']) . '">';
                            }
                            ?>
                        </div>
                        <div class="testimonial__description">
                            <h4 class="testimonial__name"><?php echo $item['name'] ?></h4>
                            <p class="testimonial__person"><?php echo $item['short-info'] ?></p>
                            <div class="testimonial__text"><?php echo $item['review-text'] ?></div>
                            <div class="testimonial__btn more__btn">Повністю</div>
                        </div>
                    </article>
                <?php } ?>
            <?php endif; ?>
        </div>
    </div>
</section>