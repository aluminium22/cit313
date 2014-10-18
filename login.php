<?php

$host = "localhost";
$user = "root";
$pass = "root";
$db = "phpll";

mysql_connect($host, $user, $pass);
mysql_select_db($db);

if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM users WHERE username ='".$username."' AND password='".$password."' LIMIT 1";
	$res = mysql_query($sql);
	if (mysql_num_rows($res) == 1) {
		echo "You have Logged In.";
		exit();
	}else {
		echo "Invalid login Information. Please return to the previous page";
		exit();
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHPLL</title>
</head>

<body>
	<form method="post" action="login.php">
	Username:<input type="text" name="username" /><br />
	Password: <input type ="password" name="password"<br />
	<input type="submit" name="submit" value="Log In" />
	</form>
</body>
</html>