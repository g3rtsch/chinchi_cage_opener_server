<?php
 /*
  * Daten:
  * - welcome: Welcome message
	* - time: Shows current time
  */
?>

<!-- <div id="spanDate"></div> -->
<p><?php echo htmlspecialchars($data['welcome']); ?></p>
<p><?php echo htmlspecialchars($data['time']); ?></p>
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
