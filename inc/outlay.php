<?php
$otlay = new \Helper\Tables('outlay');
$outlayArr = $otlay->showFullTable();
?>
<pre>
    <?
        print_r($outlayArr);
    ?>
</pre>
w