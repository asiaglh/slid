<section class="contacts" id="contacts">
    <div class="container">
        <div class="content__wrapper">
            <h2 class="contacts__title title"><?php echo get_field('title') ?></h2>
            <div class="contacts__info">
                <?php
                $contact_tel = get_field('tel');
                $number = $contact_tel['number'];
                $formatted_number = formatPhoneNumber($number);

                ?>
                <?php if ($contact_tel) : ?>
                    <div class="contacts__row">
                        <div class="contacts__column">
                            <?php
                            $img = $contact_tel['tel-img'] ;
                            if ($img) {
                                echo '<img src="' . esc_url($img['url']) . '" class="contacts__icon" alt="' . esc_attr($img['alt']) . '">';
                            }
                            ?>
                            <a href="tel:<?php echo $number ?>" class="contacts__label"><?php echo $formatted_number ?></a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php
                $contact_mail = get_field('mail');
                $email = $contact_mail['email'];
                ?>
                <?php if ($contact_mail) : ?>
                    <div class="contacts__row">
                        <div class="contacts__column">
                            <?php
                            $img = $contact_mail['mail-img'] ;
                            if ($img) {
                                echo '<img src="' . esc_url($img['url']) . '" class="contacts__icon" alt="' . esc_attr($img['alt']) . '">';
                            }
                            ?>
                            <a href="mailto:<?php echo $email ?>" class="contacts__label"><?php echo $email ?></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php if(get_field('show-store')) : ?>
    <section class="store">
        <div class="container">
            <div class="content__wrapper">
                <h2 class="store__title title">Продаж в магазинах</h2>
            </div>
            <div class="store__content">
                <div class="store__tabs">
                    <div class="store__tabs-row">
                        <?php
                        $locations = get_terms(array(
                            'taxonomy' => 'location',
                            'hide_empty' => false,
                            'parent' => 0,
                        ));

                        if (!empty($locations)) {
                            foreach ($locations as $location) {
                                echo '<div class="store__tab" data-tab="' . esc_attr($location->slug) . '">' . esc_html($location->name) . '</div>';
                            }
                        }
                        ?>
                    </div>
                    <div class="store__tabs-row">
                        <?php
                        if (!empty($locations)) {
                            foreach ($locations as $location) {
                                $child_locations = get_terms(array(
                                    'taxonomy' => 'location',
                                    'hide_empty' => false,
                                    'parent' => $location->term_id,
                                ));

                                if (!empty($child_locations)) {
                                    $sorted_child_locations = array();

                                    foreach ($child_locations as $child_location) {
                                        $sorted_child_locations[$child_location->term_id] = $child_location;
                                    }

                                    ksort($sorted_child_locations);

                                    foreach ($sorted_child_locations as $child_location) {
                                        $tab_class = ($child_location->slug === 'kyiv') ? 'store__tab active' : 'store__tab'; // Add "active" class to the 'kiyv' tab
                                        echo '<div class="' . $tab_class . '" data-tab="' . esc_attr($child_location->slug) . '">' . esc_html($child_location->name) . '</div>';
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="store__info">
                    <div class="store__info">
                        <?php
                        $locations = get_terms(array(
                            'taxonomy' => 'location',
                            'hide_empty' => false,
                        ));

                        if (!empty($locations)) {
                            foreach ($locations as $location) {
                                $query_args = array(
                                    'post_type' => 'store',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'location',
                                            'field' => 'slug',
                                            'terms' => $location->slug,
                                        ),
                                    ),
                                    'order' => 'ASC',
                                );

                                $posts_query = new WP_Query($query_args);

                                $block_class = ($location->slug === 'kyiv') ? 'store__block active' : 'store__block'; // Add "active" class to the 'kiyv' info block
                                echo '<div class="' . $block_class . '" data-block="' . esc_attr($location->slug) . '">';

                                // Check if there are any posts for the current location
                                if ($posts_query->have_posts()) {
                                    while ($posts_query->have_posts()) {
                                        $posts_query->the_post();
                                        $title = get_the_title();
                                        $address_block = get_field('address-block');

                                        // Check if the address_block is an array and not empty
                                        if (is_array($address_block) && !empty($address_block)) {
                                            ?>
                                            <div class="store__section">
                                                <h3 class="store__subtitle"><?php echo esc_html($title); ?></h3>
                                                <div class="store__contacts">
                                                    <?php foreach ($address_block as $item) { ?>
                                                        <div class="store__contact">
                                                            <p class="store__address"><?php echo $item['address']; ?></p>
                                                            <p class="store__open"><?php echo $item['work-schedule']; ?></p>
                                                            <div class="store__links">
                                                                <?php if ($item['tel']) { ?>
                                                                    <a href="tel:<?php echo $item['tel']; ?>"><?php echo formatPhoneNumber($item['tel']); ?></a> /
                                                                <?php } ?>
                                                                <a href="<?php echo $item['map-url']; ?>" target="_blank">На карті</a>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            // If address_block is empty or not an array, display the location title
                                            ?>
                                            <div class="store__section">
                                                <h3 class="store__subtitle"><?php echo esc_html($location->name); ?></h3>
                                            </div>
                                            <?php
                                        }
                                    }
                                } else {
                                    // If there are no posts for the current location, display the location title
                                    ?>
                                    <div class="store__section">
                                        <h3 class="store__subtitle"><?php echo esc_html($location->name); ?></h3>
                                    </div>
                                    <?php
                                }

                                echo '</div>';

                                wp_reset_postdata();
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php endif; ?>