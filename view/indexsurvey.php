<?php
// - Page View Counter-
session_start();

	if(isset($_SESSION['views'])){
		 $_SESSION['views'] = $_SESSION['views'] + 1;
		 header("Location: view/greetings.php");
	} else{
		$_SESSION['views'] = 1;
	}
// - End -


		if(isset($_POST['name'])){
			if(isset($_POST['submit'])){
				  $fullname=$_POST['name'];
				  header('Location: view/questions.php');
			 }
			 $_SESSION['name'] = $fullname;

			}
		else{
			$error = "What is your name?";
		}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>My Ring</title>
		<link href="Survey/css/custom.css" rel="stylesheet">
		<link href="view/custom.css" rel="stylesheet">
	</head>
	<body>
		<div id="navi">
			<?php include 'nav.php'; ?>
		</div>
		<div id="wrapper">
			<form action="<?php echo $_SERVER["REQUEST_URI"];?>" method="POST">
				Welcome, <?php echo $error; ?>!
					<br/>
				<input type="text" id="name" name="name" placeholder="Full Name" />
					<br/>
				<input type="submit" id="submit" name="submit" value="Submit" />	
			</form>
		</div>
		<div id="footer">
			<p>Pageviews: <?php echo $_SESSION['views']; ?></p>
			<a href="view/purge.php">Delete Sessions and Cookies</a>
		</div>
	</body>
</html>