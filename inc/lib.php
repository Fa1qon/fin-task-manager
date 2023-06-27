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
$library = new \Helper\Library();
$categories = $library->getCategoriesList();
?>
<?php
if ($_GET['l'] == 'main') {
?>
    <h1>Библиотека</h1>
    <div class="library-main">
        <div class="tags">

        </div>
        <div class="categories">
            <?
                foreach ($categories as $cat) {
                    $page = strtolower($cat['VALUE']);
                    ?>
                    <div class="lib-category-item">
                        <a href="?p=lib&l=<?=$page?>"><?=$cat['DESCRIPTION_2']?></a>
                    </div>
                    <?
                }
            ?>
        </div>
    </div>
<?php
    echo '<pre>';
    print_r($categories);
    echo '</pre>';
}
foreach ($categories as $cat) {
    $page = strtolower($cat['VALUE']);
    if ($_GET['l'] == $page) {
        $form = \Helper\Library::showAddForm(['category' => $page]);
        $modal = \Helper\UI::showModal('libAdd', $form, 'Добавить запись', ['libAddButton' => 'Добавить']);
        ?>
        <div class="library-categopy">
            <button type="button" class="btn btn-info waves-effect" data-toggle="modal" data-target="#libAdd"><i class="icon gg-add"></i> Добавить</button>
            <div class="tags">
теги
            </div>
            <div class="menu">
меню
            </div>
            <div class="content">
контент
            </div>
        </div>
        <?php
        echo $modal;
    }
}
?>
<script>
    tinymce.init({
        selector: '.libContent',
        plugins: 'code',  // note the comma at the end of the line!
        toolbar: 'code',  // last reminder, note the comma!
        menubar: false
    });
</script>

