<div class="add_article">
<form method="post" class="add_note_form" enctype="multipart/form-data">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <h2>Добавление записи</h2>
    <div class="input-group">
        <label class="add_form_label">Заголовок</label>
        <input class="add_input" type="text" name="title" required>
    </div>
    <div class="input-group">
        <label class="add_form_label">Фотография</label>
        <input type="file" name="image" accept=".jpg, .jpeg, .png" required>
    </div>
    <div class="input-group">
        <label class="add_form_label">Описание</label>
        <input class="add_input" type="text" name="description" required>
    </div>
    <button class="button_add_employee">Создать запись</button>
</form>
</div>