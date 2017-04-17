<?php
$ret = array();
$ret['filename'] = 'home.tpl';
$ret['data'] = array();

$time = date(DATE_RFC822);

$ret['data']['welcome'] = "Welcome";
$ret['data']['time'] = $time;

return $ret;
?>
