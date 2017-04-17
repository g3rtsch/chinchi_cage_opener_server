<?php
$ret = array();
$ret['filename'] = 'input.tpl';
$ret['data'] = array();


$open = "open";
$log = "user_input";
$sql_open =<<<EOF
	INSERT INTO CHINCHILLA (STATUS,LOG)
	VALUES ('$open', '$log');
EOF;

$close = "close";
$sql_close =<<<EOF
	INSERT INTO CHINCHILLA (STATUS,LOG)
	VALUES ('$close', '$log');
EOF;

// if ('POST' == $_SERVER['REQUEST_METHOD']) {
//     if (!isset($_POST['open'])){
//         return INVALID_FORM;
//     }
// 	
// 	$r = $db->exec($sql);
// 	if(!$r){
// 		return showinfo($db->lastErrorMsg());
// 	}
// 	$db->close();
// 	return showInfo('will open...');
// }

if ('POST' == $_SERVER['REQUEST_METHOD']) {
	if (isset($_POST['open'])){
		$r = $db->exec($sql_open);
		if(!$r){
			return showinfo($db->lastErrorMsg());
		}
		$db->close();
		return showInfo('will open...');
	}

	if (isset($_POST['close'])){
		$r = $db->exec($sql_close);
		if(!$r){
			return showinfo($db->lastErrorMsg());
		}
		$db->close();
		return showInfo('will close...');
	}
}

return $ret;
?>
