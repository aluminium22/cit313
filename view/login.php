<?php

	try{
		require $_SERVER['DOCUMENT_ROOT'].'/model/connect.php';
		require $_SERVER['DOCUMENT_ROOT'].'/controller/functions.php';
	}
	catch(EXCEPTION $ex){
			echo 'error files not found';
	}
	if(isset($_POST['submit'])){
		//grab all of the Users data thats been input in the login form, and put it in a variable
		$userName =$_POST['userName'];
		$password =$_POST['password'];		
		//Grab Email
		$login = login($userName, $password);
		$email = getUserEmail($userName, $password);
		//compare permissions

		if($login == true){
			//yay
			//Put User's Email in the url and Redirect them to the Users login home page.
		
			$user = comparePermission($userName);
			$permission = $user['permission'];
			//if admin
				if($permission == 'admin'){
					Header('Location: /view/admin/index.php?action=home');
				}
					else{
						//if user
						Header("Location: /view/client.php?email=".$email);
					}
		
		}
		else if ($login == false){
			//nay
			$error = 'Wrong Username/ Password';
		}
		   else{
		   	   $error = "something is wrong with your email / login function.";
		   }
}
  else{
  	  $error = 'Please input Username/Password';
  }
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>login </title>
		<meta charset = "utf-8"/>
		<link rel="stylesheet" type="text/css" href="/css/custom.css"/>
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
		<h1>Login: </h1>
		<?php echo $error; ?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
			Username:<input type="text" name="userName" value="<?= htmlentities($_POST['userName']);?>"/>
			<br/>
			Password:<input type="password" name="password" />
			<input type="submit" name="submit" value="Submit">
		</form>
	</body>

</html>