<?php
$otlay = new \Helper\FinTables('outlay');
$outlayArr = $otlay->showFullTable();
?>

<h2>Table</h2>
<?php
    echo $outlayArr;
?>

<h2>Add</h2>
<div class="addForm">
    <p>Дата: <input type="date" name="date"></p>
    <p>Сумма: <input type="date" name="date"></p>
    <p>Примечание: <input type="date" name="date"></p>
</div>
<h2>Update</h2>
<h2>Delete?</h2>
<h2>Options</h2>


<script type="text/javascript" src="js/income.js"></script>