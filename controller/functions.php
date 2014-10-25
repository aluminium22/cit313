<?php 
  function login($userName, $password){
  // Connect this function to the DB and put it in a variable
  $db = connectToDatabase();
  // Grab the connection variable and put it in a query 
  $sql = $db->query("SELECT * FROM cred WHERE userName='".$userName."' AND password='".$password."' LIMIT 1");
  // Count the number of Rows from query results
  $rows = $sql->fetchAll();
  $num_rows = count($rows);
  // a. User's Data has comeback true
  if ($num_rows == 1){
  $result = true;
  return $result;
  }
  // b. User's Data has comeback false
  else{
  $result = false;
  return $result;
  }

  }

  function getUserEmail($userName, $password){
  // Connect this function to the DB and put it in a variable
  $db = connectToDatabase();
  // Grab the connection variable, write a sql query to grab the email from the User
  foreach($db->query("SELECT * FROM cred WHERE userName='".$userName."' AND password='".$password."'") as $row){
  $email = $row['email'];
  return $email;
  }
  }

  function grabEmailFromURL($email){
  $db = connectToDatabase(); // Variable to connect to DB so that we can start a MYSQL query. 
  // grab the data from the table row and put it into an array
  foreach($db->query("SELECT * FROM user WHERE email = '" .$email."'") as $row){
  $row;
  return $row;
  }
  }

  function getCredentialTable($email){

  $db = connectToDatabase();
  foreach($db->query("SELECT * FROM cred WHERE email ='".$email."'")as $row){
    $cred_id = $row['cred_ID'];
    return $cred_id;
  }

}

function updateUserInfo($first, $last, $email, $phone, $user_id){
      $db = connectToDatabase();
      $sql = $db->query("UPDATE user SET `firstName` = '$first'
                                        ,`LastName` = '$last'
                                        ,`email` = '$email'
                                        ,`phone` = '$phone'
                                  WHERE user_ID = $user_id");
  }
  function updateCredInfo($cred_id, $email){
    $db = connectToDatabase();
    $sql = $db->query("UPDATE cred SET `email` = '$email'
                                            WHERE cred_ID = $cred_id");
  }

  function compareEmail($email){
	$db = connectToDatabase();
	$sql = $db->query("SELECT * FROM user WHERE email = '".$email."' LIMIT 1");
	$rows = $sql->fetchAll();
	$num_rows = count($rows);

	if($num_rows == 1){
		$result = false;
		return $result;
	}
	else{
		$result = true;
		return $result;
	}
}

function insertNewUser($first, $last, $phone, $email){
	$db = connectToDatabase();
	$sql = $db->query("INSERT INTO user(`user_ID`
										,`firstName`
										,`lastName`
										,`email`
										,`phone`)
										VALUES(NULL
											,'$first'
											,'$last'
											,'$email'
											,'$phone')");
}

function insertNewCred($userName, $password, $email, $permission){
						$db = connectToDatabase();
						$sql = $db->query("INSERT INTO cred(`cred_ID`
															,`userName`
															,`password`
															,`email`
															,`permission`)
															VALUES(NULL
																,'$userName'
																,'$password'
																,'$email'
																,'$permission')");
					}

function comparePermission($userName){
      $db = connectToDatabase();
      foreach($db->query("SELECT * FROM cred WHERE userName ='".$userName."'")as $row){
        $row;
        return $row;
      }
    }
?>

 