<?php
$ret = array();
$ret['filename'] = 'home.tpl';
$ret['data'] = array();

$time = date(DATE_RFC822);

$sql =<<<EOF
	SELECT * FROM CHINCHILLA ORDER BY ID DESC LIMIT 1;
EOF;


$r = $db->query($sql);
while($row = $r->fetchArray(SQLITE3_ASSOC) ){;
    $ret['data']['HOUR'] = $row['HOUR'];
	$ret['data']['MINUTES'] = $row['MINUTES'];
}
$ret['data']['welcome'] = "Welcome";
$ret['data']['time'] = $time;

return $ret;
?>
