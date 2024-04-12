<?php
if (!app()->auth::check()):
    ?>
    <div class="login_form">
        <h1>ВХОД</h1>
        <form class="login-container" method="post">
            <h4 class="error_message"><?= $message ?? ''; ?></h4>
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <div class="log">
                <p class="login_text">Логин</p>
                <input class="login_input" type="text" placeholder="Логин" name="login">
            </div>
            <div class="password">
                <p class="login_text"> Пароль</p>
                <input class="login_input" type="password" placeholder="Пароль" name="password">
            </div>
            <button class="back">Вход</button>
        </form>
    </div>

<?php endif;