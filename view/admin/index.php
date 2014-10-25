<?php 
try{
		require $_SERVER['DOCUMENT_ROOT'].'/model/connect.php';
		require $_SERVER['DOCUMENT_ROOT'].'/controller/pages.php';
		require $_SERVER['DOCUMENT_ROOT'].'/controller/functions.php';
	}
	catch(EXCEPTION $ex){
			echo 'error files not found';
	}
	if (get_magic_quotes_gpc()) {
    function stripslashes_gpc(&$value)
    {
        $value = stripslashes($value);
    }
   array_walk_recursive($_GET, 'stripslashes_gpc');
   array_walk_recursive($_POST, 'stripslashes_gpc');
   array_walk_recursive($_COOKIE, 'stripslashes_gpc');
   array_walk_recursive($_REQUEST, 'stripslashes_gpc');
}
	if(!isset($_POST['submit'])){
		$action = $_GET['action'];
		$info = getPage($action);
		$col1 = $info['col1'];
		$col2 = $info['col2'];
		$col3 = $info['col3'];
		$id = $info['id'];
	}


	if(isset($_POST['submit'])){
	$action = $_POST['action'];
	$col1 = $_POST['col1'];
	$col2 = $_POST['col2'];
	$col3 = $_POST['col3'];
	$id = $_POST['id'];
		switch($action){
			case 'home': 
			function updateHomeAdmin(){
				$db = connectToDatabase();
				$sql = "UPDATE home SET col1=:col1
												 , col2=:col2
												 , col3=:col3
													WHERE id = $_POST[id]";

				$stmt = $db->prepare($sql);
				$stmt->bindParam(':col1', $_POST['col1']);
				$stmt->bindParam(':col2', $_POST['col2']);
				$stmt->bindParam(':col3', $_POST['col3']);
				$stmt->execute();
			}
			updateHomeAdmin();
			Header('location: /view/admin/index.php?action=home');
			break;
			
			case 'services': 
			function updateServicesAdmin(){
				$db = connectToDatabase();
				$sql = "UPDATE services SET col1=:col1
												 , col2=:col2
												 , col3=:col3
													WHERE id = $_POST[id]";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':col1', $_POST['col1']);
				$stmt->bindParam(':col2', $_POST['col2']);
				$stmt->bindParam(':col3', $_POST['col3']);
				$stmt->execute();
			}
			updateServicesAdmin();
						Header('location: /view/admin/index.php?action=services');

			break;

			case 'gallery': 
			function updateGalleryAdmin(){
				$db = connectToDatabase();
				$sql = "UPDATE gallery SET col1=:col1
												 , col2=:col2
												 , col3=:col3
													WHERE id = $_POST[id]";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':col1', $_POST['col1']);
				$stmt->bindParam(':col2', $_POST['col2']);
				$stmt->bindParam(':col3', $_POST['col3']);
				$stmt->execute();
			}
			updateGalleryAdmin();
						Header('location: /view/admin/index.php?action=gallery');

			break;

			case 'myring': 
			function updateMyRingAdmin(){
				$db = connectToDatabase();
				$sql = "UPDATE myring SET col1 = :col1
												 , col2=:col2
												 , col3=:col3
													WHERE id = $_POST[id]";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':col1', $_POST['col1']);
				$stmt->bindParam(':col2', $_POST['col2']);
				$stmt->bindParam(':col3', $_POST['col3']);
				$stmt->execute();
			}
			updateMyRingAdmin();
						Header('location: /view/admin/index.php?action=myring');

			break;

			case 'contact': 
			function updateContactAdmin(){
				$db = connectToDatabase();
				$sql = "UPDATE contact SET col1=:col1
												 , col2=:col2
												 , col3=:col3
													WHERE id = $_POST[id]";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':col1', $_POST['col1']);
				$stmt->bindParam(':col2', $_POST['col2']);
				$stmt->bindParam(':col3', $_POST['col3']);
				$stmt->execute();
			}
			updateContactAdmin();
						Header('location: /view/admin/index.php?action=contact');

			break;
		}
		header("Location: index.php?action=".$action);
	}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title><?php echo $action; ?> | Modify</title>
		<link rel="stylesheet" type="text/css" href="/css/custom.css"/>
	</head>
	<body>
		<h1>Pick a Page to Modify</h1>
		<div>
			<ul>
				<li><a href="?action=home">Home</a></li>
				<li><a href="?action=services">Services</a></li>
				<li><a href="?action=gallery">Gallery</a></li>
				<li><a href="?action=myring">My ring</a></li>
				<li><a href="?action=contact">Contact</a></li>
			</ul>
		</div>
		<div id="container">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<label>column1</label><br /><textarea name="col1" cols="50" rows="25"><?php echo $col1; ?></textarea><br />
		<label>column2</label><br /><textarea name="col2" cols="50" rows="25"><?php echo $col2; ?></textarea><br />
		<label>column3</label><br /><textarea name="col3" cols="50" rows="25"><?php echo $col3; ?></textarea><br />
		<input type="hidden" name="id" value="<?php echo $id; ?>"/>
		<input type="hidden" name="action" value="<?php echo $action; ?>"/>
		<input type="submit" name="submit" value="Modify"/>
		<a href="logout.php">Log out</a>
		</form>
		</div>  
	</body>
</html>