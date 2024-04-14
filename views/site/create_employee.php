<div class="new_employee_form">
    <h1>ДОБАВЛЕНИЕ НОВОГО СОТРУДНИКА</h1>
    <form class="add_employee" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <h4 class="error_message"><?= $message ?? ''; ?></h4>
        <input type="hidden" name="employee_id" value="<?= $_SESSION['employee_id'] ?? '' ?>">
        <div class="new_employee_employee_dropdown">
            <div class="new_employee_view_dropdown">
                <select class="new_employee_department_structure" name="position_id">
                    <option label="Должность" value="1" selected></option>
                    <?php
                    // Получение данных из базы данных
                    foreach ($positions as $position) {
                        echo "<option label='$position->title'>$position->id</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="new_employee_view_dropdown">
                <select class="new_employee_department_structure" name="departmen_type_id">
                    <option label="Подразделение" value="1" selected></option>
                    <?php
                    // Получение данных из базы данных
                    foreach ($department_types as $department_type) {
                        echo "<option label='$department_type->department_type'>$department_type->id</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="button_dropdown">
            <button class="back">Добавить</button>
        </div>
    </form>
</div>
</div>