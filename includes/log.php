<?php
$ret = array();
$ret['filename'] = 'log.tpl';
$ret['data'] = array();

// $sql =<<<EOF
// 	SELECT * FROM CHINCHILLA;
// EOF;

$sql =<<<EOF
	SELECT * FROM CHINCHILLA ORDER BY ID DESC LIMIT 0, 10;
EOF;

// $r = $db->query($sql);
// while($row = $r->fetchArray(SQLITE3_ASSOC) ){;
// 	$maxid = $row['ID'];
// }



$r = $db->query($sql);
while($row = $r->fetchArray(SQLITE3_ASSOC) ){;
	$id = $row['ID'];
	$ret['data']['id'] = $row['ID'];
	$ret['data']['Timestamp'][$id] = $row['Timestamp'];
	$ret['data']['STATUS'][$id] = $row['STATUS'];

}

return $ret;
?>
