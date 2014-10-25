<?php
		try{
			require $_SERVER['DOCUMENT_ROOT'].'/model/connect.php';
			require $_SERVER['DOCUMENT_ROOT'].'/controller/functions.php';
	}
	catch(EXCEPTION $ex){
			echo 'error files not found';
	}
	if(isset($_POST['submit'])){
		//create that variable has input in
	$first = $_POST['first'];
	$last = $_POST['last'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$email2 = $_POST['email2'];
	$userName = $_POST['userName'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$permission = 'user';
		//make sure email 1 and 2 are the same

	if($email == $email2){
		$compare = compareEmail($email);
		if ($compare == true){
			if($userName !="" && $first !=""){
				if($password === $password2){
					insertNewUser($first, $last, $phone, $email);
					insertNewCred($userName, $password, $email, $permission);
					$confirm = "Thank You for regestering!";
					  Header('Refresh:2 ; URL=login.php');
				}
				else{
					$error ="passwords do not match, please try again";
				}

			}
			else{
				$error ="Please make sure all fields are filled";
			}
		}
		else{
			$error = "This email already exists, please try again.";
		}		
	}
	else{
		$error = "emails do not match, please re-type.";
	}	//make sure the user and firstname has been input... no blanks
		//if so, continue on with the program
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title><?php echo $action; ?> | Yours Truly Jewelry</title>
	<link rel="stylesheet" type="text/css" href="/css/custom.css"/>
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
<?php echo $error; ?>
<?php echo $confirm;?>
	<form id ="registrationForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST">
		First Name: <input type ="text" name ="first" value ="<?=htmlentities($_POST['first']); ?>"/><br />
		Last Name: <input type ="text" name ="last" value ="<?=htmlentities($_POST['last']); ?>"/><br />
		Phone Number: <input type ="text" name ="phone" value ="<?=htmlentities($_POST['phone']); ?>"/><br />
		Email: <input type ="email" name ="email" value ="<?=htmlentities($_POST['email']); ?>"/><br />
		Re-Type Email: <input type ="email" name ="email2" value ="<?=htmlentities($_POST['email2']); ?>"/><br />
		Username: <input type ="text" name ="userName" value ="<?=htmlentities($_POST['userName']); ?>"/><br />
		Password: <input type ="password" name ="password"/><br />
		Re-type Password: <input type ="password" name ="password2"/><br />
		<input type ="submit" value ="Register" name ="submit"/>
	</form>
</body>
</html>