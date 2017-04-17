<!-- <p><?php echo htmlspecialchars($data['ID']); ?></p>
<p><?php echo htmlspecialchars($data['STATUS']); ?></p> -->
<?php
/* show Data
* $data['id']
*	Timestamp
* 	STATUS
*/

// $i = count($data['Timestamp']);
$j = $data['id'];
$x = $j + 9;
for ($x; $x > $j; $x--){
?>

<table border="1">
    <tr><td>
		<p>Contact: <?php echo htmlspecialchars($data['Timestamp'][$x]); ?></p>
		<p>Status: <?php echo htmlspecialchars($data['STATUS'][$x]); ?></p>
		<p>Count: <?php echo htmlspecialchars($x); ?></p>
	</td></tr>
</table><br>

<?php
}
?>



