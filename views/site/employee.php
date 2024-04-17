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
            <div class="add_department">
                <a class="employee_link" href="<?= app()->route->getUrl('/attaching_department') ?>"> Прикрепить
                    сотрудника к подразделению</a>
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
                    <h3>Подразделение</h3>
                    <?php
                    // Получение данных из базы данных
                    foreach ($departments as $department) {

                        echo "<div>";
                        echo '<p class="text_information">';
                        echo "<input type='checkbox' name='department_id[]' value='$department->id'>$department->title</input>";
                        echo "</p>";
                        echo "</div>";
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
            $uniqueEmployees = [];

            foreach ($_GET['department_id'] as $departmentId) {
                foreach ($department_employees as $department_employee) {
                    if ($department_employee->department_id == $departmentId) {
                        foreach ($employees as $employee) {
                            if ($employee->id == $department_employee->employeer_id) {
                                $uniqueEmployees[$employee->id] = $employee;
                            }
                        }
                    }
                }
            }


            foreach ($uniqueEmployees as $employee) {

                echo '<div class="content_form">';
                echo '<div class="information_form_employee">';
                echo '<h2>';
                echo $employee->surname . ' ' . $employee->name . ' ' . $employee->patronymic;
                echo '</h2>';
                echo '<p class="line_information"></p>';
                echo '<p class="text_information">' . $employee->gender . '</p>';
                echo '<p class="line_information"></p>';
                echo '<p class="text_information">' . $employee->birthdate . '</p>';
                echo '<p class="line_information"></p>';
                echo '<p class="text_information">' . $employee->address . '</p>';
                echo '<p class="line_information"></p>';
                echo '</div>';

                $departmentTitles = [];
                foreach ($department_employees as $department_employee) {
                    if ($department_employee->employeer_id == $employee->id) {
                        foreach ($departments as $department) {
                            if ($department->id == $department_employee->department_id) {
                                if (!in_array($department->title, $departmentTitles)) {
                                    $departmentTitles[] = $department->title;
                                }
                            }
                        }
                    }
                }

                $departmentTypes = [];
                foreach ($department_employees as $department_employee) {
                    if ($department_employee->employeer_id == $employee->id) {
                        foreach ($departments as $department) {
                            if ($department->id == $department_employee->department_id) {
                                if (!in_array($department->departmen_type_id, $departmentTypes)) {
                                    $departmentTypes[] = $department->departmen_type_id;
                                }
                            }
                        }
                    }
                }

                echo '<div class="information_form_employee">';
                foreach ($departmentTitles as $departmentTitle) {
                    echo '<h2>' . $departmentTitle . '</h2>';
                }
                echo '<p class="line_information"></p>';
                foreach ($departmentTypes as $departmentType) {
                    foreach ($department_types as $type) {
                        if ($type->id == $departmentType) {
                            echo '<p class="text_information">' . $type->department_type . '</p>';
                        }
                    }
                }
                echo '<p class="line_information"></p>';
                foreach ($current_positions as $current_position) {
                    if ($employee->id == $current_position->employeer_id) {
                        foreach ($positions as $position) {
                            if ($position->id == $current_position->position_id) {
                                echo '<p class="text_information">'. $position->title .'</p>';
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
                        if ($employee->id == $department_employee->employeer_id && $employee->staff_id == $_GET['staff_id']) {
                            foreach ($departments as $department) {
                                if ($department->id == $department_employee->department_id) {
                                    echo '<h2>';
                                    echo $department->title;
                                    echo '</h2>';
                                    foreach ($department_types as $department_type) {
                                        if ($department_type->id == $department->departmen_type_id) {
                                            echo '<p class="line_information"></p>';
                                            echo '</p>';
                                            echo '<p class="text_information">';
                                            echo $department_type->department_type;
                                            echo '</p>';
                                        }
                                    }
                                }
                            }
                        }
                    }

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