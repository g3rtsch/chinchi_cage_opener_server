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
		<p>
		  Status: <?php echo htmlspecialchars($data['STATUS'][$x]); ?>
		  Log: <?php echo htmlspecialchars($data['LOG'][$x]); ?>
		</p>
		<p>Count: <?php echo htmlspecialchars($x); ?></p>
		<p>
		  <?php
		    if (!$data['MINUTES'][$x] == 'None') {
			if ($data['MINUTES'][$x] < 10) {
			    $minutes = 0 . $data['MINUTES'][$x];
			}
		        $hour = $data['HOUR'][$x];
		    }else {
			$hour = $data['HOUR'][$x];
		        $minutes = $data['MINUTES'][$x];
			// $hour = 'None';
			// $minutes = 'None';
                    }
	          ?>
		    Time set to: <?php echo htmlspecialchars($hour); ?>:<?php echo htmlspecialchars($minutes); ?>
		</p>
	</td></tr>
</table><br>

<?php
}
?>



