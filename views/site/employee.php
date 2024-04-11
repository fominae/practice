<div class="login_form">
    <h1>СОТРУДНИКИ</h1>
    <div class="employee_container">
        <div class="add">
            <div class="add_department">
                <a class="employee_link" href="<?= app()->route->getUrl('/create') ?>"> Добавить сотрудника</a>
            </div>
            <div class="add_department">
                <a class="employee_link" href="<?= app()->route->getUrl('/home') ?>"> Добавить подразделение</a>
            </div>
        </div>
        <div class="employee_dropdown">
            <div class="view_dropdown">
                <select class="department_structure">
                    <option label="Состав" value="1" selected></option>
                    <option>Состав 1</option>
                    <option>Состав 2</option>
                    <option>Состав 3</option>
                </select>
            </div>
            <div class="view_dropdown">
                <select class="department_structure">
                    <option label="Вид подразделения" value="1" selected></option>
                    <option>Состав 1</option>
                    <option>Состав 2</option>
                    <option>Состав 3</option>
                </select>
            </div>
            <div class="button_dropdown">
                <button class="back">Поиск</button>
            </div>
        </div>
        <div class="counting">
            <p class="text_counting">Подсчитать средний возраст сотрудников по подразделениям </p>
            <p class="line_counting"></p>
            <input type="checkbox" id="music" name="interest" value="music"/>
        </div>
        <div class="employee_form">
            <div class="content_form">
                <div class="information_form_employee">
                    <h2>ФИО сотрудника</h2>
                    <p class="text_information">Пол</p>
                    <p class="line_information"></p>
                    <p class="text_information">Дата рождения</p>
                    <p class="line_information"></p>
                    <p class="text_information">Адрес прописки</p>
                    <p class="line_information"></p>
                </div>
                <div class="department_form_employee">
                    <h2>Название подразделения</h2>
                    <p class="text_information">Вид подразделения</p>
                    <p class="line_information"></p>
                    <p class="text_information">Должность</p>
                    <p class="line_information"></p>
                    <p class="text_information">Состав</p>
                    <p class="line_information"></p>
                </div>
                <div class="button_department_form">
                    <button class="back"><a class="login" href="<?= app()->route->getUrl('/#') ?>">Редактировать</a>
                    </button>
                </div>
            </div>
            <div class="content_form">
                <div class="information_form_employee">
                    <h2>ФИО сотрудника</h2>
                    <p class="text_information">Пол</p>
                    <p class="line_information"></p>
                    <p class="text_information">Дата рождения</p>
                    <p class="line_information"></p>
                    <p class="text_information">Адрес прописки</p>
                    <p class="line_information"></p>
                </div>
                <div class="department_form_employee">
                    <h2>Название подразделения</h2>
                    <p class="text_information">Вид подразделения</p>
                    <p class="line_information"></p>
                    <p class="text_information">Должность</p>
                    <p class="line_information"></p>
                    <p class="text_information">Состав</p>
                    <p class="line_information"></p>
                </div>
                <div class="button_department_form">
                    <button class="back"><a class="login" href="<?= app()->route->getUrl('/#') ?>">Редактировать</a>
                    </button>
                </div>
            </div>
            <div class="content_form">
                <div class="information_form_employee">
                    <h2>ФИО сотрудника</h2>
                    <p class="text_information">Пол</p>
                    <p class="line_information"></p>
                    <p class="text_information">Дата рождения</p>
                    <p class="line_information"></p>
                    <p class="text_information">Адрес прописки</p>
                    <p class="line_information"></p>
                </div>
                <div class="department_form_employee">
                    <h2>Название подразделения</h2>
                    <p class="text_information">Вид подразделения</p>
                    <p class="line_information"></p>
                    <p class="text_information">Должность</p>
                    <p class="line_information"></p>
                    <p class="text_information">Состав</p>
                    <p class="line_information"></p>
                </div>
                <div class="button_department_form">
                    <button class="back"><a class="login" href="<?= app()->route->getUrl('/#') ?>">Редактировать</a>
                    </button>
                </div>
            </div>
        </div>
    </div>