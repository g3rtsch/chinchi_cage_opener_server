function pickTime() {
    var picker = ('#setTime').timepicker();
    Document.getElementById('timepicker').innerHTML =
	picker.timepicker({'scrollDefault': 'now'});
}
