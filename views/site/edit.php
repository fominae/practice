<div class="new_employee_form">
    <h1>РЕДАКТИРОВАНИЕ</h1>
    <form class="edit_employee" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <h4 class="error_message"><?= $message ?? ''; ?></h4>
        <div class="log">
            <p>Фамилия*</p>
            <input class="login_input" type="text" placeholder="Иванов" name="login">
        </div>
        <div class="log">
            <p>Имя*</p>
            <input class="login_input" type="text" placeholder="Иван" name="login">
        </div>
        <div class="password">
            <p>Отчество</p>
            <input class="login_input" type="password" placeholder="Иванович" name="password">
        </div>
        <div class="gender">
            <p>Пол</p>
            <input type="radio" name="gender" value="male"> Женский
            <input type="radio" name="gender" value="female"> Мужской
        </div>
        <div class="date">
            <p>Дата рождения</p>
            <input class="login_input" type="date" placeholder="Иванович" name="password">
        </div>
        <div class="adress">
            <p>Адрес прописки</p>
            <input class="login_input" type="text" placeholder="Адрес" name="password">
        </div>
        <div class="new_employee_employee_dropdown">
            <div class="new_employee_view_dropdown">
                <select class="new_employee_department_structure">
                    <option label="Должность" value="1" selected></option>
                    <option>Должность 1</option>
                    <option>Должность 2</option>
                    <option>Должность 3</option>
                </select>
            </div>
            <div class="new_employee_view_dropdown">
                <select class="new_employee_department_structure">
                    <option label="Подразделение" value="1" selected></option>
                    <option>Подразделение 1</option>
                    <option>Подразделение 2</option>
                    <option>Подразделение 3</option>
                </select>
            </div>
            <div class="new_employee_view_dropdown">
                <select class="new_employee_department_structure">
                    <option label="Состав" value="1" selected></option>
                    <option>Состав 1</option>
                    <option>Состав 2</option>
                    <option>Состав 3</option>
                </select>
            </div>
        </div>
        <div class="button_dropdown">
            <button class="edit_employee_button">РЕДАКТИРОВАТЬ</button>
        </div>
    </form>
</div>