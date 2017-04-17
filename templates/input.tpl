<form action="index.php?section=Input" method="post">
    <fieldset>
        <legend>Open</legend>
        <p class="info">Open</p>
        <input type="submit" name="open" value="open" />
        <input type="submit" name="close" value="close" />
	<p>
	  Select hour: <select id="starthrs"></select>
	  minute: <select id="startmins"></select>
	</p> &nbsp;
	<input type="button" id="settime" value="set Time"> &nbsp; <a style="color: Red;" id="error"></a>
	<p id="stime"></p>
	<script>
	  selectTime()
	</script>
    </fieldset>
</form>
