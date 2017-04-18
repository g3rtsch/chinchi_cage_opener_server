<?php
class MyDB extends SQLite3 {
	function __construct() {
		$this->open('test.db');
	}
}

$db = new MyDB();
if(!$db){
	$ret = $db->lastErrorMsg();
} else {

	$sql =<<<EOF
		SELECT * FROM CHINCHILLA ORDER BY ID DESC LIMIT 1;
EOF;

	$r = $db->query($sql);
	while($row = $r->fetchArray(SQLITE3_ASSOC) ){;
		$status = $row['STATUS'];
        $shour = $row['HOUR'];
        $sminutes = $row['MINUTES'];
	}
    $rhour = date('H');
    $rminutes = date('i');
}
if ($status == 'open') {
    print($status);
} else {
    if ($sminutes > $rminutes) {
        $m = $sminutes - $rminutes;
    } else {
        $m = $rminutes - $sminutes;
    }
    if ($m <= 8 && $shour == $rhour) {
        print('open');
    }
    $x = $rhour +1;
    if ($m > 50 && $x == $shour) {
        print('open');
    }
}

?>
