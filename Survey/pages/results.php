<?php
// - Page View Counter-
session_start();
	if(isset($_SESSION['views'])){
		 $_SESSION['views'] = $_SESSION['views'] + 1;
	} else{
		$_SESSION['views'] = 1;
	}
// - End -
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<div id="wrapper">
			<h1><?php echo $_COOKIE["user"] ?>, These are your results.</h1>

					<label class="questions">Are you looking for a male / female ring?</label>
						<br/>
						<?php echo $_COOKIE['Question1']; ?>
						<br/>

					<label class="questions">What type of band?</label>
						<br/>
						<?php echo $_COOKIE['Question2']; ?>
						<br/>

					<label class="questions">What size carat?</label>
						<br/>
						<?php echo $_COOKIE['Question3']; ?>
						<br/>

					<label class="questions">What type of gem?</label>
						<br/>
						<?php echo $_COOKIE['Question4']; ?>
						<br/>

					<label class="questions">What ring size?</label>
						<br/>
						<?php echo $_COOKIE['Question5']; ?>
						<br/>

						<div id="home">
							<a href="index.php">Go Back</a>
						</div>

		</div>
		<div id="footer">
			<p>Pageviews: <?php echo $_SESSION['views']; ?></p>
			<a href="purge.php">Delete Sessions and Cookies</a>
		</div>
	</body>
</html>