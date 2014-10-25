<?php
	try{
		include 'connect.php';
		include 'pages.php';
	}
	catch(EXCEPTION $ex){
		echo 'error files not found';
	}

function login($userName, $password){
	$db = connectToDatabase();
	//time to get connectin variable and put it in query
	$sql = $db->query("SELECT * FROM cred WHERE userName='".$userName."' AND password='".$password."' LIMIT 1");
	// cont the rows from query
	$rows = $sql->fetchAll();
	$num_rows = count($rows);
	if($num_rows == 1){
		$result = true;
		return $result;
	}
	else{
		$result = false;
		return $result;
	}
}

if(isset($_POST['submit'])){
	//get the information
	$userName = $_POST['userName'];
	$password = $_POST['password'];
	$login = login($userName, $password);


	if($login == true){
		$user = comparePermission($userName);
		$permission = $user['permission'];
		if($permission == 'admin'){
			header('Location: /phpll - OS/gemquery.php');
		}
			else{
				header('Location: /phpll - OS/gemqueryUser.php');
			}
	}
	else if($login == false){
		$error = 'Wrong Username or Password';
	}
		else{
			$error = "something is wrong with email?"
		}
}
	else{
		$error = 'Please input username and password';
	}	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>

<body>
<?php echo $error; ?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
	Username:<input type="text" name="userName" value="userName" /><br />
	Password: <input type ="password" name="password"<br />
	<input type="submit" name="submit" value="Log In" />
	</form>
</body>
</html>