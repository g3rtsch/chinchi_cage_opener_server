<form id="control" action="index.php?section=Input" method="post">
    <fieldset>
        <legend>Open</legend>
        <p class="info">Open</p>
        <input type="submit" name="open" value="open" />
	<p>
	  Select hour: <select name="hour" id="starthrs"></select>
	  minute: <select name="minutes" id="startmins"></select>
	</p> &nbsp;
	<input type="button" name="settime" id="settime" value="set Time"> &nbsp;
	<p id="stime"></p>
	<script>
	  selectTime()
	</script>
    </fieldset>
</form>
