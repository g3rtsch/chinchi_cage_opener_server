<?php
if (getUserID($userdb)) {
    return 'Sie sind bereits eingeloggt.';
}
$ret = array();
$ret['filename'] = 'login.tpl';
$ret['data'] = array();
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    if (!isset($_POST['Username'], $_POST['Password'], $_POST['formaction'])) {
        return INVALID_FORM;
    }
    if (('' == $Username = trim($_POST['Username'])) OR
            ('' == $Password = trim($_POST['Password']))) {
        return EMPTY_FORM;
    }
    //check Username
    $sql = 'SELECT
           		ID
            FROM
                User
            WHERE
                Username = ?';

    $stmt = $userdb->prepare($sql);
    if (!$stmt) {
        return $userdb->error;
    }
    $stmt->bind_param('s', $Username);
    if (!$stmt->execute()) {
        return $stmt->error;
    }
    $stmt->bind_result($UserID);
    if (!$stmt->fetch()) {
        return 'Es wurde kein Benutzer mit den angegebenen Namen gefunden.';
    }
    $stmt->close();

    //check Passwort
    $sql = 'SELECT
                Password
            FROM
                User
            WHERE
                ID = ? AND
                Password = ?';

    $stmt = $userdb->prepare($sql);
    if (!$stmt) {
        return $userdb->error;
    }
    $Hash = md5(md5($UserID).$Password);
    $stmt->bind_param('is', $UserID, $Hash);
    if (!$stmt->execute()) {
        return $stmt->error;
    }
    $stmt->bind_result($Hash);
    if (!$stmt->fetch()) {
        return 'Das eingegebene Password ist ungültig.';
    }
    $stmt->close();

    setcookie('UserID', $UserID, strtotime("+1 month"));
    setcookie('Password', $Hash, strtotime("+1 month"));
    $_COOKIE['UserID'] = $UserID; // fake-cookie setzen
    $_COOKIE['Password'] = $Hash; // fake-cookie setzen
    return showInfo('Sie sind nun eingeloggt.');
}
return $ret;
?>
