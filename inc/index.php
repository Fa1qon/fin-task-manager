<?php
echo 'Основная страница с меню';
?>
<p><a href="?p=outlay">Расходы</a></p>
<p><a href="?p=income">Доходы</a></p>

<pre>
    <?php
        print_r($_SERVER);
    ?>
</pre>