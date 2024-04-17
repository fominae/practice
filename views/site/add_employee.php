<?php

if (app()->auth::checkRole()):
    ?>
    <div class="login_form">
        <h1>ДОБАВЛЕНИЕ НОВОГО СОТРУДНИКА ОТДЕЛА КАДРОВ</h1>
        <form class="add_employee_container" method="post">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <h4 class="error_message"><?= $message ?? ''; ?></h4>
            <div class="log">
                <p class="title_add">Логин</p>
                <?= isset($errors['login']) ? '<div class="error">' . implode(', ', $errors['login']) . '</div>' : '' ?>
                <input class="login_input" type="text" placeholder="Логин" name="login">
            </div>
            <div class="password">
                <?= isset($errors['password']) ? '<div class="error">' . implode(', ', $errors['password']) . '</div>' : '' ?>
                <p class="title_add">Пароль</p>
                <input class="login_input" type="password" placeholder="Пароль" name="password">
            </div>
            <button class="button_login">Добавить</button>
        </form>
    </div>
<?php

else:
    ?>
    <p>Страница не админа</p>
<?php
endif;
?>