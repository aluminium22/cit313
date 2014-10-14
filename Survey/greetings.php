<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>My Ring</title>
		<link href="Survey/css/custom.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
	</head>
	<body>
		<nav>
 		<ul>
 			<li>
 				<a href="/index.php">Me</a>
 			</li>
 			<li>
 				<a href="/assignment.php">Assignments</a>
 			 </li>
 			 <li>
 				<a href="/Survey/pages/index.php">Ring Survey</a>
 			 </li>
 		</ul>
 	</nav>
		<div id="wrapper">
			
				<h2>Welcome Back <?php echo $_SESSION['name'];?></h2>
					<br/>
					<p>What do you want to do?</p>	
					<a href="purge.php">Start a new Survey</a><br />
					<a href="results.php">See Results</a>
		</div>
		<div id="footer">
			<p>Pageviews: <?php echo $_SESSION['views']; ?></p>
			
		</div>
	</body>
</html>