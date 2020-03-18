<!DOCTYPE html>
<html>
<title>Super-Simple JSmol with Java/HTML5 option buttons</title>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="JSmol.min.js"></script>
<script type="text/javascript"> 



Info = {
	use: "HTML5",
	width: {{$width}},
	height: {{$height}},
	debug: false,
	color: "#{{$color}}",
  disableJ2SLoadMonitor: true,
  disableInitialConsole: true,
//	addSelectionOptions: true,
	serverURL: "http://chemapps.stolaf.edu/jmol/jsmol/php/jsmol.php",
	@if($smile!="_")
	script: "set zoomLarge falase; load ${{$smile}}"
	@else
		script: "set zoomLarge falase; load data/1crn.pdb; cartoon on;color cartoon structure"
	@endif
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
