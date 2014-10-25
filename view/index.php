<?php
	try{
		require $_SERVER['DOCUMENT_ROOT'].'/model/connect.php';
		require $_SERVER['DOCUMENT_ROOT'].'/controller/pages.php';
		require $_SERVER['DOCUMENT_ROOT'].'/controller/functions.php';
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
			
			$info = getPage($action);
			$col1 = $info['col1'];
			$col2 = $info['col2'];
			$col3 = $info['col3'];

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
		<link rel="stylesheet" type="text/css" href="/css/custom.css"/>
		<link rel="shortcut icon" href="/images/YTwebpage.ico" type="image/x-icon">
		<!-- Include the jQuery library (local or CDN) -->
	</head>
	<body>
		<div id="login">
			<a href="/view/login.php">Log In </a>
		</div>
		<div id="nav">
			<?php include 'includes/nav.php'; ?>
		</div>
		<div id="icon">
			<?php include 'includes/icon.php'; ?>
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
			<?php include 'includes/footer.php'; ?>
		</div>
	</body>
</html>