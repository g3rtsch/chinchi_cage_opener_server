<?php
/**
 * Liefert die Benutzer-ID zur�ck.
 *
 * Diese Funktion liefert die Benutzer-ID des angemeldeten Benutzers zur�ck.
 * Falls kein Benutzer angemeldet ist liefert diese Funktion den Wert false
 * zur�ck. Der Parameter gibt dabei das MySQLi-Objekt an in der nach
 * dem Login gepr�ft werden soll. Es werden dabei die Cookies "UserID" und
 * "Password" ausgelesen. Bei einem MySQL-Fehler wird ein String mit
 * der Fehlermeldung zur�ckgeliefert.
 *
 * @param db Das MySQLi-Objekt auf dem gearbeitet wird.
 * @return false wenn der Benutzer nicht eingeloggt ist, die ID des Benutzers
 *         wenn er eingeloggt ist oder ein string wenn eine Fehlermeldung
 *         auftrat.
 */
function getUserID($userdb) {
    if (!is_object($userdb)) {
        return false;
    }
    if (!($userdb instanceof MySQLi)) {
        return false;
    }
    if (!isset($_COOKIE['UserID'], $_COOKIE['Password'])) {
        return false;
    }
    $sql = 'SELECT
                ID
            FROM
                User
            WHERE
                ID = ? AND
                Password = ?';
    $stmt = $userdb->prepare($sql);
    if (!$stmt) {
        return $userdb->error;
    }
    $stmt->bind_param('is', $_COOKIE['UserID'], $_COOKIE['Password']);
    if (!$stmt->execute()) {
        $str = $stmt->error;
        $stmt->close();
        return $str;
    }
    $stmt->bind_result($UserID);
    if (!$stmt->fetch()) {
        $stmt->close();
        return false;
    }
    $stmt->close();
    return $UserID;
}

/**
 * Erzeugt ein Array für das Infomessage-Template.
 *
 * Diese Funktion erzeugt eine Array für unsere Templateengine die dann
 * die Infomessage-Template-Datei "info.tpl" läd. Der Parameter gibt
 * dabei die Nachricht an die angezeigt werden soll.
 *
 * @param msg Die Nachricht die angezeigt werden soll.
 * @return Das Array für unsere Templateengine.
 */
function showInfo($msg) {
    $ret = array();
    $ret['filename'] = 'info.tpl';
    $ret['data'] = array();
    $ret['data']['msg'] = $msg;
    return $ret;
}

function prep_sql($on, $log, $hour, $minutes) {
    $ret =<<<EOF
INSERT INTO CHINCHILLA (STATUS,LOG,HOUR,MINUTES)
VALUES ('$on', '$log', '$hour', '$minutes');
EOF;
    return $ret;
}

/*
function wlog() {
	$sql =<<<EOF
		INSERT INTO CHINCHILLA (STATUS,LOG)
		VALUES ('on', 'test');
EOF;
	
	$r = $db->exec($sql);
	if(!$r){
		return showinfo($db->lastErrorMsg());
	}
	$db->close();
}
 */
