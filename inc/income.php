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
<button type="button" class="btn btn-info waves-effect" data-toggle="modal" data-target="#incomeAdd"><i class="icon gg-add"></i> Добавить</button>
<?php
$form = \Helper\FinForms::showAddForm('income');
$modal = \Helper\UI::showModal('incomeAdd', $form, 'Добавить доход', ['incomeAddButton' => 'Добавить']);
echo $modal;
?>
<h2>Update</h2>
<h2>Delete?</h2>
<h2>Options</h2>

<script type="text/javascript" src="js/income.js"></script>