<div class="new_employee_form">
    <h1>ДОБАВЛЕНИЕ НОВОГО СОТРУДНИКА</h1>
    <form class="add_employees" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <h4 class="error_message"><?= $message ?? ''; ?></h4>
        <input type="hidden" name="employeer_id" value="<?= $_SESSION['employeer_id'] ?? '' ?>">
        <div class="new_employee_employee_dropdown">
            <div class="new_employee_view_dropdown">
                <p>Должность</p>
                <select class="new_employee_department_structure" name="position_id">
                    <?php
                    // Получение данных из базы данных
                    foreach ($positions as $position) {
                        echo "<option label='$position->title'>$position->id</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="new_employee_view_dropdown">
                <p>Название подразделения</p>
                <select class="new_employee_department_structure" name="department_id">
                    <?php
                    // Получение данных из базы данных
                    foreach ($departments as $department) {
                        echo "<option label='$department->title'>$department->id</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="new_employee_view_dropdown">
                <p>Вид подразделения</p>
                <select class="new_employee_department_structure" name="departmen_type_id">
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