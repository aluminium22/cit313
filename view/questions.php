<?php
// - Page View Counter-
session_start();
	
// - End -
try{
		include 'connect.php';
		include 'pages.php';
	}
	catch(EXCEPTION $ex){
		echo 'error files not found';
	}

if(isset($_POST['submit'])){			
  $greetings = "Welcome " . $_COOKIE["user"] . "!<br>";
  $q1 = $_POST['q1'];
  $q2 = $_POST['q2'];
  $q3 = $_POST['q3'];
  $q4 = $_POST['q4'];
  $q5 = $_POST['q5'];
  header('Location: view/results.php');
}	
if(isset($_SESSION['views'])){
		 $_SESSION['views'] = $_SESSION['views'] + 1;
		 $_SESSION["q1"] = $q1;
		 $_SESSION["q2"] = $q2;
		 $_SESSION["q3"] = $q3;
		 $_SESSION["q4"] = $q4;
		 $_SESSION["q5"] = $q5;
	} else{
		$_SESSION['views'] = 1;
	}  
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Your Ring Setup</title>
		<link href="Survey/css/custom.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<link href="view/custom.css" rel="stylesheet">
	</head>
	<body>
	<div id="navi">
			<?php include 'view/nav.php'; ?>
		</div>
		<div id="wrapper">
			<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="POST">
				<?php echo $_SESSION["name"]; ?>
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
<?php function getGem(){
					$db = connectToDatabase();
					$query = $db->prepare("SELECT * FROM  stones");
					$query->execute();
					$result = $query->fetchAll();
				   foreach($result as $row){
				   	$gemy=$row["name"];
                echo "<option>
                    $gemy
                </option>";
				   }
				
} ?>
					<select name="q4" id="q4">

						<?php getGem(); ?>
						</select> <br/>
					<label class="questions">What ring size?</label>
					<br/>

					<input type="text" id="q5" name="q5" placeholder="7 1/2?" />
						<br/>
					<input type="submit" id="submit" name="submit" value="Submit" />	
			</form>
		</div>
		<div id="footer">
			<p>Pageviews: <?php echo $_SESSION['views']; ?></p>
			<a href="view/purge.php">Delete Sessions and Cookies</a>
			<a href="view/results.php">Results</a>
		</div>
	</body>
</html>