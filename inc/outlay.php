<?php
$otlay = new \Helper\Tables('outlay');
$outlayArr = $otlay->showFullTable();
?>
<pre>
    <?
        var_dump($outlayArr);
    ?>
</pre>