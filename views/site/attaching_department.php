<div class="add_departmen">
    <h1>ПРИКРЕПЛЕНИЕ СОТРУДНИКА К ПОДРАЗДЕЛЕНИЮ</h1>
    <form class="add_departmen_container" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <div class="add_departmen">
            <select class="new_employee_department_structure" name="employeer_id">
                <?php
                foreach ($employees as $employee) {
                    echo "<option value='$employee->id'>$employee->surname $employee->name $employee->patronymic</option>";
                }
                ?>
            </select>
        </div>
        <div class="new_employee_view_dropdown">
            <select class="new_employee_department_structure" name="department_id">
                <?php
                foreach ($departments as $department) {
                    echo "<option value='$department->id'>$department->title</option>";
                }
                ?>
            </select>
        </div>
        <button class="back">Прикрепить</button>
    </form>
</div>
