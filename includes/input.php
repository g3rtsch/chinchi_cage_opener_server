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

$on = "on";

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
        // return showInfo($_POST['open']);
	}

	if (isset($_POST['close'])){
		$r = $db->exec($sql_close);
		if(!$r){
			return showinfo($db->lastErrorMsg());
		}
		$db->close();
		return showInfo('will close...');
	}
    if (isset($_POST['hour']) && isset($_POST['minutes'])) {
        $hour = $_POST['hour'];
        $minutes = $_POST['minutes'];
        $sql_settime = prep_sql($on, $log, $hour, $minutes); // prep_sql() in functions.php
        $r = $db->exec($sql_settime);
        if(!$r){
            return showinfo($db->lastErrorMsg());
        }
        $db->close();
        $op = $_POST['hour'] . ":" . $_POST['minutes'];
        return showInfo($op);
    }
    // if (!isset($_POST['close']) && !isset($_POST['open'])) {
    //     return showInfo(print_r($_POST));
    // }
}

return $ret;
?>
