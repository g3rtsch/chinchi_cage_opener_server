function ddlValue(id) {
    var e = document.getElementById(id);
    var strUser = e.options[e.selectedIndex].value;
    return strUser;
}
function selectTime() {
   for(var i = 0; i < 24; i++) {
	var s = i.toString();
	if(s.length == 1) {
	    s = "0" + s; 
    }
	document.getElementById("starthrs").innerHTML +=
	    ("<option value='" + i + "'>" + s + "  </option>");
    }

    for(var i = 0; i < 60; i = i + 15) {
	    var s = i.toString();
	    if(s.length == 1) {
		    s = "0" + s; 
	    }
	document.getElementById("startmins").innerHTML +=
	    ("<option value='" + i + "'>" + s + "  </option>");
    }

    document.getElementById("settime").onclick = function() {
	var starthrs = parseInt(ddlValue("starthrs"));
	var startmins = parseInt(ddlValue("startmins"));
	// document.getElementById("stime").innerHTML = starthrs + ":" + startmins; 
	document.getElementById("control").submit();
	var l = document.getElementById("control").elements.namedItem("hour").value;
	document.getElementById("stime").innerHTML = l;
    }
}
