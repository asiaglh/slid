<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>Помилка</title>
    <?php wp_head();?>
</head>

<body>
<main class="main">
    <section class="error">
        <div class="container error__container">
            <h1 class="error__title">Помилка 404</h1>
            <div class="error__content">
                <h4 class="error__subtitle">Сторінка не знайдена</h4>
                <p>На жаль, ти втратив слід.</p>
                <p>Але ти все ще можеш повернутись назад.</p>
            </div>
            <a href="<?php echo esc_url(home_url()); ?>" class="error__btn btn">Повернутись на головну</a>
        </div>
    </section>
</main>
</body>
</html>