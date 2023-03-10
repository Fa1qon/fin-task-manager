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
<button type="button" class="btn btn-info waves-effect" data-toggle="modal" data-target="#myModalone">Modal Default</button>
<h2>Update</h2>
<h2>Delete?</h2>
<h2>Options</h2>

<div class="modal fade" id="myModalone" role="dialog" style="display: none;">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <h2>Modal title</h2>
                <p>Curabitur blandit mollis lacus. Nulla sit amet est. Suspendisse nisl elit, rhoncus eget, elementum ac, condimentum eget, diam. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Cras sagittis.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Save changes</button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/income.js"></script>