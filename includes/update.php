<?php
$ret = array();
$ret['filename'] = 'update.tpl';
$ret['data'] = array();
$ret['data']['hello'] = "Hello Gate Keeper";


if (isset($_GET['log'])) {
	$ret['data']['hello'] = $_GET['log'];
}

return $ret;
?>
