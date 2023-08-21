<?php

/* Template Name: Offer */

get_header(); ?>

    <main class="main contract-main">

        <section class="contract">
            <div class="container">
                <div class="content__wrapper">
                    <h2 class="contract__title title"><?php the_title(); ?></h2>
                    <div class="contract__desc">
                        <div class="contract__block">
                            <?php echo the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

<?php get_footer(); ?>