<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Results</title>
		<link href="Survey/css/custom.css" rel="stylesheet">
		<link href="view/custom.css" rel="stylesheet">
	</head>
	<body>
	<div id="navi">
			<?php include 'nav.php'; ?>
		</div>
		<div id="wrapper">
			<h1><?php echo $_SESSION['name']; ?>, These are your results.</h1>

					<label class="questions">Are you looking for a male / female ring?</label>
						<br/>
						<?php echo $_SESSION['q1']; ?>
						<br/>

					<label class="questions">What type of band?</label>
						<br/>
						<?php echo $_SESSION['q2']; ?>
						<br/>

					<label class="questions">What size carat?</label>
						<br/>
						<?php echo $_SESSION['q3']; ?>
						<br/>

					<label class="questions">What type of gem?</label>
						<br/>
						<?php echo $_SESSION['q4']; ?>
						<br/>

					<label class="questions">What ring size?</label>
						<br/>
						<?php echo $_SESSION['q5']; ?>
						<br/>

						<div id="home">
							<a href="view/indexsurvey.php">Go Back</a>
						</div>

		</div>
		<div id="footer">
			<p>Pageviews: <?php echo $_SESSION['views']; ?></p>
			<a href="view/purge.php">Delete Sessions and Cookies</a>
		</div>
	</body>
</html>