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
	$sql =<<<EOF
		INSERT INTO CHINCHILLA (STATUS,LOG)
		VALUES ('on', '$log');
EOF;
	$r = $db->exec($sql);
	if(!$r){
		return showinfo($db->lastErrorMsg());
	}
	$db->close();
}

return $ret;
?>
