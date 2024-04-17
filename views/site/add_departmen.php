<div class="add_departmen">
    <h1>ДОБАВЛЕНИЕ ПОДРАЗДЕЛЕНИЯ</h1>
    <form class="add_departmen_container" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <div class="add_departmen">
            <?= isset($errors['title']) ? '<div class="error">' . implode(', ', $errors['title']) . '</div>' : '' ?>
            <input class="login_input" type="text" placeholder="Название подразделения" name="title">
        </div>
        <div class="new_employee_view_dropdown">
            <select class="new_employee_department_structure" name="departmen_type_id">
                <?php
                // Получение данных из базы данных
                foreach ($department_types as $department_type) {
                    echo "<option label='$department_type->department_type'>$department_type->id</option>";
                }
                ?>
            </select>
        </div>
        <button class="back">Добавить</button>
    </form>
</div>