<div class="new_employee_form">
    <h1>ДОБАВЛЕНИЕ НОВОГО СОТРУДНИКА</h1>
    <form class="add_employee" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <h4 class="error_message"><?= $message ?? ''; ?></h4>
        <div class="log">
            <p>Фамилия*</p>
            <?= isset($errors['surname']) ? '<div class="error">' . implode(', ', $errors['surname']) . '</div>' : '' ?>
            <input class="login_input" type="text" placeholder="Иванов" name="surname">
        </div>
        <div class="log">
            <p>Имя*</p>
            <?= isset($errors['name']) ? '<div class="error">' . implode(', ', $errors['name']) . '</div>' : '' ?>
            <input class="login_input" type="text" placeholder="Иван" name="name">
        </div>
        <div class="password">
            <p>Отчество</p>
            <input class="login_input" type="text" placeholder="Иванович" name="patronymic">
        </div>
        <div class="gender">
            <p>Пол</p>
            <input type="radio" name="gender" value="Женский" checked> Женский
            <input type="radio" name="gender" value="Мужской"> Мужской
        </div>
        <div class="date">
            <p>Дата рождения</p>
            <?= isset($errors['birthdate']) ? '<div class="error">' . implode(', ', $errors['birthdate']) . '</div>' : '' ?>
            <input class="login_input" type="date" placeholder="Дата рождения" name="birthdate">
        </div>
        <div class="adress">
            <p>Адрес прописки</p>
            <?= isset($errors['address']) ? '<div class="error">' . implode(', ', $errors['address']) . '</div>' : '' ?>
            <input class="login_input" type="text" placeholder="Адрес" name="address">
        </div>
        <div class="new_employee_view_dropdown">
            <p>Состав</p>
           <select class="new_employee_department_structures" name="staff_id">
                <?php
                // Получение данных из базы данных
                foreach ($staff as $staff) {
                    echo "<option label='$staff->title'>$staff->id</option>";
                }
                ?>
            </select>
        </div>
        <div class="button_dropdown">
            <button class="back">Далее</button>
        </div>
    </form>
</div>
</div>