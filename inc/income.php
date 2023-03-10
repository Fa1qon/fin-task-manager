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
$incomeArr = $income->showTable([]);
?>
<h2>Table</h2>
<?php
    echo $incomeArr;
?>

<h2>Add</h2>
<button type="button" class="btn btn-info waves-effect" data-toggle="modal" data-target="#incomeAdd">Modal Default</button>
<h2>Update</h2>
<h2>Delete?</h2>
<h2>Options</h2>

<?php
    $form = \Helper\FinTables::showAddForm('income');
    \Helper\UI::showModal('incomeAdd', $form, ['incomeAddButton' => 'Добавить'])
?>

<script type="text/javascript" src="js/income.js"></script>