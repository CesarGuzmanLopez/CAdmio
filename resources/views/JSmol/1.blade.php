<!DOCTYPE html>
<html>
<title>Super-Simple JSmol with Java/HTML5 option buttons</title>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="JSmol.min.js"></script>
<script type="text/javascript"> 



Info = {
	use: "HTML5",
	width: 555,
	height: 300,
	debug: false,
	color: "0xC0C0C0",
  disableJ2SLoadMonitor: true,
  disableInitialConsole: true,
//	addSelectionOptions: true,
	serverURL: "http://chemapps.stolaf.edu/jmol/jsmol/php/jsmol.php",

	script: "set zoomLarge falase; load $cc"
}


$(document).ready(function() {
  $("#mydiv").html(Jmol.getAppletHtml("jmolApplet0", Info))
})


</script>
</head>
<body>

<div id=mydiv>


</div>
</body>
</html>
