<div class="login_form">
    <h1>СОТРУДНИКИ</h1>
    <div class="employee_container">
        <div class="add">
            <div class="add_department">
                <a class="employee_link" href="<?= app()->route->getUrl('/create') ?>"> Добавить сотрудника</a>
            </div>
            <div class="add_department">
                <a class="employee_link" href="<?= app()->route->getUrl('/add_departmen') ?>"> Добавить
                    подразделение</a>
            </div>
        </div>
        <form class="employee" method="get">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <div class="employee_dropdown">
                <div class="view_dropdown">
                    <select class="department_structure" name="staff_id">
                        <option label="Состав" value="1" selected></option>
                        <?php
                        // Получение данных из базы данных
                        foreach ($staffs as $staff) {
                            echo "<option value='$staff->id'>$staff->title</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="view_dropdown">
                    <?php
                    // Получение данных из базы данных
                    foreach ($departments as $department) {
                        echo "<input type='checkbox' name='department_id[]' value='$department->id'>$department->title</input>";
                    }
                    ?>
                </div>
                <div class="button_dropdown">
                    <button class="back">Поиск</button>
                </div>
            </div>
        </form>
        <div class="counting">
            <p class="text_counting">Подсчитать средний возраст сотрудников по подразделениям </p>
            <p class="line_counting"></p>
            <input type="checkbox" id="music" name="interest" value="music"/>
        </div>

        <?php
        if (isset($_GET['department_id'])) {
            foreach ($_GET['department_id'] as $el) {

                foreach ($department_types as $department_type) {
                    foreach ($departments as $department) {
                        if ($department->id == $el&&$department_type->id == $department->departmen_type_id) {
                            foreach ($department_employees as $department_employee) {
                                if ($department_employee->department_id == $department->id) {
                                    foreach ($employees as $employee) {
                                        if ($employee->id == $department_employee->employeer_id && $department_employee->department_id == $department->id ) {
                                            echo '<div class="content_form">';
                                            echo '<div class="information_form_employee">';
                                            echo '<h2>';
                                            echo $employee->surname;
                                            echo ' ';
                                            echo $employee->name;
                                            echo ' ';
                                            echo $employee->patronymic;
                                            echo '</h2>';
                                            echo '<p class="line_information"></p>';
                                            echo '</p>';
                                            echo '<p class="text_information">';
                                            echo $employee->gender;
                                            echo '</p>';
                                            echo '<p class="line_information"></p>';
                                            echo '</p>';
                                            echo '<p class="text_information">';
                                            echo $employee->birthdate;
                                            echo '</p>';
                                            echo '<p class="line_information"></p>';
                                            echo '</p>';
                                            echo '<p class="text_information">';
                                            echo $employee->address;
                                            echo '</p>';
                                            echo '<p class="line_information"></p>';
                                            echo '</p>';
                                            echo '</div>';


                                            echo '<div class="information_form_employee">';
                                            echo '<h2>';
                                            echo $department->title;
                                            echo '</h2>';
                                            echo '<p class="line_information"></p>';
                                            echo '</p>';
                                            echo '<p class="text_information">';
                                            echo $department_type->department_type;
                                            echo '</p>';
                                            echo '<p class="line_information"></p>';
                                            echo '</p>';
                                            echo '<p class="text_information">';

                                            foreach ($current_positions as $current_position) {
                                                if ($employee->id == $current_position->employeer_id) {
                                                    foreach ($positions as $position) {
                                                        if ($position->id == $current_position->position_id) {
                                                            echo $position->title;
                                                        }
                                                    }
                                                }

                                            }
                                            echo '</p>';
                                            echo '<p class="line_information"></p>';
                                            echo '</p>';
                                            echo '<p class="text_information">';
                                            foreach ($staffs as $staffss) {
                                                if ($staffss->id == $employee->staff_id) {
                                                    echo $staffss->title;
                                                }
                                            }
                                            echo '</p>';
                                            echo '<p class="line_information"></p>';
                                            echo '</p>';
                                            echo '</div>';

                                            echo '</div>';

                                        } else {
                                            echo ' ';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        if (isset($_GET['staff_id'])) {
            foreach ($employees as $employee) {
                if ($employee->staff_id == $_GET['staff_id']) {
                    echo '<div class="content_form">';
                    echo '<div class="information_form_employee">';
                    echo '<h2>';
                    echo $employee->surname;
                    echo ' ';
                    echo $employee->name;
                    echo ' ';
                    echo $employee->patronymic;
                    echo '</h2>';
                    echo '<p class="line_information"></p>';
                    echo '</p>';
                    echo '<p class="text_information">';
                    echo $employee->gender;
                    echo '</p>';
                    echo '<p class="line_information"></p>';
                    echo '</p>';
                    echo '<p class="text_information">';
                    echo $employee->birthdate;
                    echo '</p>';
                    echo '<p class="line_information"></p>';
                    echo '</p>';
                    echo '<p class="text_information">';
                    echo $employee->address;
                    echo '</p>';
                    echo '<p class="line_information"></p>';
                    echo '</p>';
                    echo '</div>';


                    echo '<div class="information_form_employee">';
                    echo '<h2>';

                    foreach ($department_employees as $department_employee) {
                        if ($employee->id == $department_employee->employeer_id) {
                            foreach ($departments as $department) {
                                if ($department->id == $department_employee->department_id) {
                                    echo $department->title;
                                }
                            }
                        }
                    }
                    echo '</h2>';
                    echo '<p class="line_information"></p>';
                    echo '</p>';
                    echo '<p class="text_information">';
                    echo $department_type->department_type;
                    echo '</p>';
                    echo '<p class="line_information"></p>';
                    echo '</p>';
                    echo '<p class="text_information">';

                    foreach ($current_positions as $current_position) {
                        if ($employee->id == $current_position->employeer_id) {
                            foreach ($positions as $position) {
                                if ($position->id == $current_position->position_id) {
                                    echo $position->title;
                                }
                            }
                        }

                    }
                    echo '</p>';
                    echo '<p class="line_information"></p>';
                    echo '</p>';
                    echo '<p class="text_information">';
                    foreach ($staffs as $staffss) {
                        if ($staffss->id == $employee->staff_id) {
                            echo $staffss->title;
                        }
                    }
                    echo '</p>';
                    echo '<p class="line_information"></p>';
                    echo '</p>';
                    echo '</div>';

                    echo '</div>';
                }
            }

        }
        echo '</div>';
        ?>
    </div>
</div>
</div>