<?php
$sharing = get_field('social_sharing', 'option');
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:title" content="<?php echo $sharing['title']?>">
    <meta property="og:description" content="<?php echo $sharing['sub-title']?>">
    <meta property="og:image"  content="<?php echo $sharing['img']?>">
    <title><?php echo get_the_title(); ?></title>
    <?php wp_head();?>
</head>
<body>
<header class="header">
    <div class="header__container container">
        <a href="<?php echo home_url(); ?>" class="header__logo">Слiди на дорозi</a>
        <div class="header__menu menu">
            <div class="menu__icon">
                <span></span>
            </div>
            <div class="menu_wrapper">
                <nav class="menu__nav">
                    <?php
                    $menu_items = wp_get_nav_menu_items('header-menu');

                    if ($menu_items) {
                        echo '<ul class="menu__list">
                                 <li><a href="' . home_url() . '" class="menu__item menu__item-mob">Головна</a></li>';

                        foreach ($menu_items as $menu_item) {
                            $url = $menu_item->url;
                            $title = $menu_item->title;
                            echo '<li><a href="' . esc_url($url) . '" class="menu__item" target="_blank">' . esc_html($title) . '</a></li>';
                        }

                        echo '</ul>';
                    }
                    ?>
                    <ul class="">
                    </ul>
                    <button class="header__button btn header__button-dt" onclick="openPopUpForm()">Замовити</button>
                </nav>
            </div>
        </div>
        <button class="header__button btn header__button-mob" onclick="openPopUpForm()">Замовити</button>
    </div>
</header>