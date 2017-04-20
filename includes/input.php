<?php
$ret = array();
$ret['filename'] = 'input.tpl';
$ret['data'] = array();


$open = "open";
$log = "user_input";
$sql_open =<<<EOF
	INSERT INTO CHINCHILLA (STATUS,LOG, HOUR, MINUTES)
	VALUES ('$open', '$log', 'None', 'None');
EOF;

$close = "close";
$sql_close =<<<EOF
	INSERT INTO CHINCHILLA (STATUS,LOG)
	VALUES ('$close', '$log');
EOF;

$on = "on";
$sql_off =<<<EOF
	INSERT INTO CHINCHILLA (STATUS,LOG, HOUR, MINUTES)
	VALUES ('$on', '$log', 'None', 'None');
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
    if (!isset($_POST['open']) && !isset($_POST['close']) && !isset($_POST['hour']) && !isset($_POST['minutes'])) {
        return INVALID_FORM;
    }
	if (isset($_POST['open'])){
        if (!is_string($_POST['open'])) {
            return INVALID_FORM;
        }
		$r = $db->exec($sql_open);
		if(!$r){
			return showinfo($db->lastErrorMsg());
		}
		$db->close();
		return showInfo('will open...');
        // return showInfo($_POST['open']);
	}
	if (isset($_POST['close'])){
        if (!is_string($_POST['close'])) {
            return INVALID_FORM;
        }
		$r = $db->exec($sql_close);
		if(!$r){
			return showinfo($db->lastErrorMsg());
		}
		$db->close();
		return showInfo('will close...');
	}

	if (isset($_POST['off'])){
        if (!is_string($_POST['off'])) {
            return INVALID_FORM;
        }
		$r = $db->exec($sql_off);
		if(!$r){
			return showinfo($db->lastErrorMsg());
		}
		$db->close();
		return showInfo('timer off');
	}

    if (isset($_POST['hour']) && isset($_POST['minutes'])) {
        if (!is_string($_POST['hour']) && !is_string($_POST['minutes'])) {
            return INVALID_FORM;
        }
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
}

return $ret;
?>
