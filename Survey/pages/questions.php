<?php
// - Page View Counter-
session_start();
	if(isset($_SESSION['views'])){
		 $_SESSION['views'] = $_SESSION['views'] + 1;
	} else{
		$_SESSION['views'] = 1;
	}
// - End -

if(isset($_POST['submit'])){			
  $greetings = "Welcome " . $_COOKIE["user"] . "!<br>";
  $q1 = $_POST['q1'];
  $q2 = $_POST['q2'];
  $q3 = $_POST['q3'];
  $q4 = $_POST['q4'];
  $q5 = $_POST['q5'];
  header('Location: results.php');
}
// - Set Cookie for 1hr -
	  setcookie("Question1", $q1, time()+3600);
	  setcookie("Question2", $q2, time()+3600);
	  setcookie("Question3", $q3, time()+3600);
	  setcookie("Question4", $q4, time()+3600);
	  setcookie("Question5", $q5, time()+3600);	
// - End -
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Your Ring Setup</title>
		<link href="survey/css/custom.css" rel="stylesheet">
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
			<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="POST">
				<?php echo $greetings; ?>
				<div id="questions"></div>
					<label class="questions">Are you looking for a male / female ring?</label>
					<br/>

					<input type="text" id="q1" name="q1" placeholder="Male / Female?" /> <br/>
					<label class="questions">What type of band?</label>
					<br/>

					<input type="text" id="q2" name="q2" placeholder="Silver, Gold, Tungsten?" /> <br/>
					<label class="questions">What size carat?</label>
					<br/>

					<input type="text" id="q3" name="q3" placeholder="Carat?" /> <br/>
					<label class="questions">What type of gem?</label>
					<br/>

					<input type="text" id="q4" name="q4" placeholder="Ruby, Saphire, Tiger etc...?" /> <br/>
					<label class="questions">What ring size?</label>
					<br/>

					<input type="text" id="q5" name="q5" placeholder="7 1/2?" />
						<br/>
					<input type="submit" id="submit" name="submit" value="Submit" />	
			</form>
		</div>
		<div id="footer">
			<p>Pageviews: <?php echo $_SESSION['views']; ?></p>
			<a href="purge.php">Delete Sessions and Cookies</a>
		</div>
	</body>
</html>