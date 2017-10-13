<?php
if (!getUserID($userdb)) {
    return NOT_LOGGED_IN;
}
$ret = array();
$ret['filename'] = 'logout.tpl';
$ret['data'] = array();
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    if (!isset($_POST['formaction'])) {
        return INVALID_FORM;
    }
    setcookie('UserID', '', strtotime('-1 day'));
    setcookie('Password', '', strtotime('-1 day'));
    unset($_COOKIE['UserID']);
    unset($_COOKIE['Password']);
    return showInfo('Sie sind nun ausgeloggt.');
}
return $ret;
?>
