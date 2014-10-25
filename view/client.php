<?php 
try{
		require $_SERVER['DOCUMENT_ROOT'].'/model/connect.php';
		require $_SERVER['DOCUMENT_ROOT'].'/controller/functions.php';
	}
	catch(EXCEPTION $ex){
			echo 'error files not found';
	}
	// grab email from URL using the GET method Put it into a variable 
 	 $email = $_GET['email']; 
   $error = $_GET['error'];
 	 // Use that variable and put it in a sql variable to grab user's information. 
 	 // put the users' information into a variable 
 	  
 	 $userInfo = grabEmailFromURL($email); 
 	 $user_id = $userInfo[0]; 
 	 $first = $userInfo[1]; 
   $last = $userInfo[2];
 	 $email = $userInfo[4]; 
   $phone = $userInfo[3];
   $cred_id = getCredentialTable($email);

  //User hits submit, run following code
if(isset($_POST['submit'])){


  $first = $_POST['first'];
  $last = $_POST['last'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $user_id = $_POST['user_id'];
  $cred_id = $_POST['cred_id'];
  //grab users data and input them into a variable
    if($first != "" && $last !="" && $email != "" && $phone != ""){
      updateUserInfo($first, $last, $email, $phone, $user_id);
      updateCredInfo($cred_id, $email);
      header('location:client.php?email='.$_POST['email']);
    }
    else{
      header('location:client.php?email='.$_POST['email'].'&error=please make sure all data has been filled, thank you.');
    }

}

?> 
<!DOCTYPE html> 
<html> 
 <head>
 	 <meta charset="utf-8"> 
 	 <title> Welcome!</title> 
   <link rel="stylesheet" type="text/css" href="/css/custom.css"/>
   <script type="text/javascript" src="/js/custom.js"></script>
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
  <div id="userInfo" class="show"> 
      <h2> User Information: </h2> 
      <?php echo $first; ?> <br/> 
      <?php echo $last; ?> <br/>
      <?php echo $email; ?> <br/>
      <?php echo $phone; ?>  <br/>
      <?php echo $error; ?> 
        <button type="button" onclick="edit()" name="edit">Edit</button>
  </div>
        <form id="updateForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
          <div id="modifyInfo" class="hide">
            <label>First Name: </label> <input type="text" name="first" value="<?php echo $first; ?>" />
            <label>Last Name: </label> <input type="text" name="last" value="<?php echo $last; ?>" />
            <label>Email: </label> <input type="text" name="email" value="<?php echo $email; ?>" />
            <label>Phone: </label> <input type="text" name="phone" value="<?php echo $phone;?>"/>
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
            <input type="hidden" name="cred_id" value="<?php echo $cred_id; ?>"/>
<input type="submit" value="Update" name="submit"/>
          </div>
        </form>
        <form id="emailForm" action="/controller/email.php" method="POST">
        <input type="hidden" name="first" value="<?php echo $first; ?>"/>
        <input type="hidden" name="last" value="<?php echo $last; ?>"/>
        <input type="hidden" name="email" value="<?php echo $email; ?>"/>
        <input type="hidden" name="phone" value="<?php echo $phone; ?>"/>
          Subject: <input type="text" name="subject" placeholder="Subject Line"/>
          <br />
          Message: <br /><textarea name="msg" cols="50" rows="10"> </textarea>
          <input type="submit" name="submit" value="Submit"/>
          <a href="logout.php">Log out</a>
        </form>
  </body>
 </html>