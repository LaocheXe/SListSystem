<?php

//require_once();


$date = date("Y-m-d H:i:s"); //Year-month-day Hour:minute:second

$codeHERE = '<html>
<head>
	<title>501st Server Status</title>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function(){
			setInterval(function(){
				$("#a3s1").load("a3s1.php")
				}, 9000);
		});		
	</script>
	<script>
		$(document).ready(function(){
			setInterval(function(){
				$("#a3s2").load("a3s2.php")
				}, 9000);
		});		
	</script>
	<script>
		$(document).ready(function(){
			setInterval(function(){
				$("#a3s3").load("a3s3.php")
				}, 9000);
		});		
	</script>
	<script>
		$(document).ready(function(){
			setInterval(function(){
				$("#a3s4").load("a3s4.php")
				}, 9000);
		});		
	</script>
	<script>
		$(document).ready(function(){
			setInterval(function(){
				$("#a3s5").load("a3s5.php")
				}, 9000);
		});		
	</script>
</head>
<body>
<p>
Server 1 - 
<div id="a3s1"></div>
</p>
<p>
Server 2 - 
<div id="a3s2"></div>
</p>
<p>
Server 3 - 
<div id="a3s3"></div>
</p>
<p>
Server 4 - 
<div id="a3s4"></div>
</p>
<p>
Server 5 - 
<div id="a3s5"></div>
</p>
</body>
<footer>
</footer>
</html>
';

echo $codeHERE;

?>