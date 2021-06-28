<?php

    $db = \Config\Database::connect();
    $idb = array(1,2,3);
    $ids = join(",",$idb);
    $query = $db->query("SELECT * FROM candidates WHERE id IN ($ids)");

    foreach($query->getResult() as $row){
        $vte = $row->voter;

?>
<div class="text-black"><?=$vte;?></div>
<?php
    }
?>
