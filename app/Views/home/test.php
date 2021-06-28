<?php $db = \Config\Database::connect();
$data = $db->table('candidates')->getWhere(['type'=>1]); 
foreach($data->getResult() as $item){$vlue=round($item->voter/$TLusrs*100);echo "$vlue,";}$builder=$db->table('users');$TLusrs=$builder->countAll();$builder->where('section', 0);
$NYusrs=$builder->countAllResults();echo round($NYusrs/$TLusrs*100);
?>