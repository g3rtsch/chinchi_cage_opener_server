<?php
if (!$UserID = getUserID($userdb)) {
    include 'templates/menu.tpl';
}else{
	include 'templates/menu-full.tpl';
}
?>