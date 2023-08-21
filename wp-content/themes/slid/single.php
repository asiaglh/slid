<?php

get_header();?>

<main class="main">
    <section class="excerpt">
        <div class="container">
            <div class="content__wrapper">
                <h2 class="excerpt__title title"><?php the_title(); ?></h2>
                <a href="/#excerpts" class="excerpt__btn more__btn top">Назад до списку уривків</a>
                <div class="excerpt__text">
                    <?php the_content(); ?>
                </div>
                <a href="/#excerpts" class="excerpt__btn more__btn">Назад до списку уривків</a>
            </div>
        </div>
    </section>
</main>


<?php

get_footer();?>