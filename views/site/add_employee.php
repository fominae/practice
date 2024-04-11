<div class="login_form">
    <h1>ДОБАВЛЕНИЕ НОВОГО СОТРУДНИКА ОТДЕЛА КАДРОВ</h1>
    <form class="add_employee_container" method="post">
        <h4 class="error_message"><?= $message ?? ''; ?></h4>
        <div class="log">
            <p class="title_add">Фамилия*</p>
            <input class= "login_input" type="text" placeholder="Иванов" name="login">
        </div>
        <div class="log">
            <p class="title_add">Имя*</p>
            <input class= "login_input" type="text" placeholder="Иван" name="text">
        </div>
        <div class="password">
            <p class="title_add">Отчество</p>
            <input class= "login_input" type="text" placeholder="Иванович" name="text">
        </div>
        <div class="log">
            <p class="title_add">Логин</p>
            <input class= "login_input" type="text" placeholder="Логин" name="login">
        </div>
        <div class="password">
            <p class="title_add">Пароль</p>
            <input class= "login_input" type="password" placeholder="Пароль" name="password">
        </div>
        <button class="button_login">Добавить</button>
    </form>
</div>
