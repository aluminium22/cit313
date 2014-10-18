<?php
	try{
		include 'connect.php';
		include 'pages.php';
	}
	catch(EXCEPTION $ex){
			echo 'error files not found';
	}
	$action = $_GET['action'];
	
	switch($action){
		case 'home':
			
			$info = getPage($action);
			$col1 = $info['col1'];
			$col2 = $info['col2'];
			$col3 = $info['col3'];

		break;
		case 'services':
			
			$info = getPage($action);
			$col1 = $info['col1'];
			$col2 = $info['col2'];
			$col3 = $info['col3'];

		break;
		case 'gallery':
			
			$info = getPage($action);
			$col1 = $info['col1'];
			$col2 = $info['col2'];
			$col3 = $info['col3'];

		break;
		case 'myring':
			
			header("location: indexsurvey.php");

		break;
		case 'contact':
			
			$info = getPage($action);
			$col1 = $info['col1'];
			$col2 = $info['col2'];
			$col3 = $info['col3'];

		break;

		default:
		header("location:index.php?action=home");


	}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title><?php echo $action; ?> | Yours Truly Jewelry</title>
		<link rel="stylesheet" type="text/css" href="custom.css"/>
	   <!-- <link rel="shortcut icon" href="YTwebpage.ico" type="image/x-icon"> -->
		<!-- Include the jQuery library (local or CDN) -->
	</head>
	<body>
		<div id="login">
			<a href="/login.php">Log In </a>
		</div>
		<div id="navi">
			<?php include 'nav.php'; ?>
		</div>
		 <div id="icon">
			<img id="nIcon" alt="icon" src="YT.png"/>
		</div>
		<div id="col1">
				
			<?php echo $col1; ?>
		</div>
		<div id="col2">
			
			 <?php echo $col2; ?> 
			</div>
		<div id="col3">
			<?php echo $col3; ?> 
			</div>
		 <div id="footer">
			<?php include 'footer.php'; ?>
		</div> 
	</body>
</html>