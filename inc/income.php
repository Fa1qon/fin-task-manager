<?php
/** Доходы
 *
 * Таблица
 * Добавить
 * Изменить
 * Удалить
 * Настройки типов и категорий
 */

$income = new \Helper\FinTables('income');
$incomeArr = $otlay->showTable([]);
?>
<h2>Table</h2>
<?php
    echo $incomeArr;
?>

<h2>Add</h2>
<h2>Update</h2>
<h2>Delete?</h2>
<h2>Options</h2>


<script type="text/javascript" src="js/income.js"></script>