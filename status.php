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
		SELECT STATUS FROM CHINCHILLA ORDER BY ID DESC LIMIT 1;
EOF;

	$r = $db->query($sql);
	while($row = $r->fetchArray(SQLITE3_ASSOC) ){;
		$status = $row['STATUS'];
	}
}
print($status)
?>
