<div class="login_form">
    <h1>ВСЕ СОТРУДНИКИ</h1>
    <div class="search_form">
        <form action="<?= app()->route->getUrl('/search_employee') ?>" method="get">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <input class="employee_search" type="text" name="search" required>
            <div class="button_dropdown">
                <button class="back">Поиск</button>
            </div>
        </form>
    </div>
    <div >
        <?php
        if (isset($message)) {
            echo "<h4 class='error_message'>$message</h4>";
        } else {
            foreach ($employees as $employee) {
                echo "<div class='search_card'>";
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
                echo "</div>";
                echo "</div>";
            }
        }
        ?>
    </div>
</div>