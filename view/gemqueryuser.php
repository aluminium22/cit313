<?php
	try{
		include 'connect.php';
		include 'pages.php';
	}
	catch(EXCEPTION $ex){
		echo 'error files not found';
	}
		 
function getGem(){
					$db = connectToDatabase();
					$query = $db->prepare("SELECT * FROM  stones");
					$query->execute();
					$result = $query->fetchAll();
				   foreach($result as $row){
				   	echo "<div id='list'><h3>".$row['name']."</h3></div>";
				   }
				
}
				getGem();
function search($input){
					$db= connectToDatabase();
					$gem = $input;
					foreach($db->query("SELECT * FROM stones WHERE name ='".$gem."'") as $row){
						$row;
						return $row;
					}
				   
}
if(isset($_POST['submit'])){
	$input = $_POST['input'];
	$gem = search($input);
	$typeGem = $gem[1];
	$imgGem = $gem[2];

}

if(isset($_POST['submit1'])){
	//time to create a variable from the form's name.
	$gName = $_POST['gName'];
	$gSize = $_POST['gSize'];
	$permission = "admin";
	createGem($gName, $gSize);
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Gem Query</title>
		<link rel="stylesheet" type="text/css" href="custom.css"/>
		<link rel="stylesheet" type="text/css" href="survey/css/custom.css"/>
	</head>
		<body>
			<div id="wrapper">
					<label>Please Type Search Query (from list above)</label>
					<form action ="gemquery.php" method="POST">
						<input type="text" name="input" /><br />
						<input type="submit" value="submit" name="submit"/>
					</form>
					<?php echo $typeGem;?>
					<br/>
					<?php echo $imgGem;?>
					<br />
			</div>	
		</body>
</html>