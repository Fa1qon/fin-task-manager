<?php
/*
 * Библиотека контента
 *
 *
 * Струкрура таблицы:
 * ID
 * CATEGORY
 * DATE
 * TAGS
 * CONTENT
 *
 * Категории заметок
 * Программирование: HTML с кусками кода
 *
 */
?>
<textarea>
     Welcome to TinyMCE!
  </textarea>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'code',  // note the comma at the end of the line!
        toolbar: 'code',  // last reminder, note the comma!
        menubar: false
    });
</script>
<?php
if ($_GET['l'] == 'cases') {
?>
Кейсы
<?php } ?>

