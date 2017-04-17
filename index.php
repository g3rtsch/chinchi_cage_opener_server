<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'variables.php';
include 'constants.php';
include 'functions.php';
include 'classes.php';


$db = new MyDB();
if(!$db){
	$ret = $db->lastErrorMsg();
} else {

	$ret = 1; // speichert den rückgabewert von include, standardwert 1

	// Laden der Include-Datei
	/*
	 * Die Include-Datei muss eine return Anweisung enthalten mit folgenden
	 * Werten:
	 * - Bei normaler Ausführung
	 *   Array('filename' => string, -- Dateiname vom Template
	 *         'data' => Array())    -- Array mit Daten für das Template
	 * - Bei einem Fehler
	 *   string  -- Die Fehlermeldung die angezeigt werden soll.
	 */
	if (isset($_GET['section'], $dateien[$_GET['section']])) {
		if (file_exists('includes/'.$dateien[$_GET['section']])) {
			$ret = include 'includes/'.$dateien[$_GET['section']]; 
			  } else {
			$ret = "Include-Datei konnte nicht geladen werden: 'includes/".$dateien[$_GET['section']]."'";
		}
	} else {
		// default bereich laden, news
		$ret = include 'includes/'.$dateien['home'];
	}
}

// Laden des HTML-Kopfs
include 'templates/html_header.tpl';   // Doctype, <html>, <head>, <meta> kram
include 'templates/html_header_end.tpl';
include 'templates/html_body_tag.tpl'; // Analog auch einfach echo "<body>";
include 'templates/html_table.tpl';
include 'includes/menu.php';          // falls man z.B. ein Menu haben möchte
include 'templates/html_content.tpl';

// Laden der Template-Datei
if (is_array($ret) and isset($ret['filename'], $ret['data']) and
        is_string($ret['filename']) and
        is_array($ret['data'])) {
    // Gültige Include-Datei
    if (file_exists($file = 'templates/'.$ret['filename'])) {
        $data = $ret['data']; // speicher die Arraydaten in eine Variable $data
                              // die dann im Template verwendet werden kann.
        include $file;
    } else {
        $data['msg'] = 'Templatedatei "'.$file.'" ist nicht vorhanden.';
        include 'templates/error.tpl';
    }
} else if (is_string($ret)) {
    // Fehlermeldung
    $data['msg'] = $ret;
    include 'templates/error.tpl';
} else if (1 === $ret) {
    // return wurde vergessen
    $data['msg'] = 'In der Include-Datei wurde die return Anweisung vergessen.';
    include 'templates/error.tpl';
} else {
    // ein Ungültiger Return wert
    $data['msg'] = 'Die Include-Datei hat einen ungültigen Wert zurückgeliefert.';
    include 'templates/error.tpl';
}
// scripts
include 'templates/html_script.tpl';
include 'scripts/clock.js';
include 'templates/html_script_end.tpl';
// HTML footer laden
include 'templates/html_footer.tpl';  // Zeug wie </body> und </html>
?>
