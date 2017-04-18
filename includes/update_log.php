<?php
$ret = array();
$ret['filename'] = 'update_log.tpl';
$ret['data'] = array();


if ('POST' == $_SERVER['REQUEST_METHOD']) {
	if (!isset($_POST['Log'], $_POST['formaction'], $_POST['c'])) {
		return INVALID_FORM;
	}
	if (!is_string($_POST['Log'])) {
		return INVALID_FORM;
	}
	if (($_POST['Log']) == '') {
		return EMPTY_FORM;
	}

	$log = $_POST['Log'];

    $qsql =<<<EOF
SELECT * FROM CHINCHILLA ORDER BY ID DESC LIMIT 1;
EOF;
	$r = $db->query($qsql);
	while($row = $r->fetchArray(SQLITE3_ASSOC) ){;
        $status = $row['STATUS'];
        $shour = $row['HOUR'];
        $sminutes = $row['MINUTES'];
	}

    if ($status == 'open') {
        $status = 'on';
    }

    $sql = prep_sql($status, $log, $shour, $sminutes);
    $r = $db->exec($sql);
    if(!$r){
        return showinfo($db->lastErrorMsg());
    }
    $db->close();
}

return $ret;
?>
