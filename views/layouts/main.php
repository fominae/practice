<!DOCTYPE html>
<head>
    <title>Human Resources</title>
    <link rel="stylesheet" href="/pop-it-mvc/public/css/style.css">
</head>
<body>
<div class="navbar">
    <div class="title"><a class="home_link" href="<?= app()->route->getUrl('/home') ?>"> Human Resources</a></div>
    <?php
    if (!app()->auth::check()):
        ?>

        <button class="back"><a class="login" href="<?= app()->route->getUrl('/login') ?>">Вход</a></button>
    <?php
    else:
        ?>
    <div class="nav_link">
               <?php
        if(!app()->auth::checkRole()):
            ?>
            <a class="employer_link" href="<?= app()->route->getUrl('/employee') ?>">Сотрудники</a>
        <?php
        endif;
               ?>
        <?php
        if(app()->auth::checkRole()):
            ?>
            <a class="employer_link" href="<?= app()->route->getUrl('/add_employee') ?>">Добавление нового сотрудника</a>
        <?php
        endif;
        ?>

        <button class="back"><a class="login" href="<?= app()->route->getUrl('/logout') ?>">Выход</a></button>
</div>
    <?php
    endif;
    ?>



</div>
<main>
    <?= $content ?? '' ?>
</main>
</body>


