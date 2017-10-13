<?php
 /*
  * Daten:
  * - welcome: Welcome message
	* - time: Shows current time
  */
if (!$data['MINUTES'] == 'None') {
   if ($data['MINUTES'] < 10) {
     $minutes = 0 . $data['MINUTES'];
     }
    $hour = $data['HOUR'];
}else {
    $hour = false;
    $minutes = false;
}
?>

<!-- <div id="spanDate"></div> -->
<p><?php echo htmlspecialchars($data['welcome']); ?></p>
<p><?php echo htmlspecialchars($data['time']); ?></p>
<?php
if (!$hour) {
?>
   <p>Keine Zeit gesetzt um den Käfig zu öffnen</p>
<?php
} else {
?>
   <p>Käfig öffnet um <?php echo htmlspecialchars($hour); ?>:<?php echo htmlspecialchars($minutes); ?></p>
<?php
}
?>

<div id="clock"></div>


<!-- 
<span id="spanDate"></span> 
<div id="spanDate"></div>

<script type="text/javascript">
	var today = new Date();
	// document.write(today);
	document.getElementById("spanDate").innerHTML = today
</script>
-->
