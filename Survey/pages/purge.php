<?php
    session_start();
	session_destroy();
	header("Location: index.php");
	  setcookie("user", $fullname, time()-3600);
	  setcookie("Question1", $q1, time()-3600);
	  setcookie("Question2", $q2, time()-3600);
	  setcookie("Question3", $q3, time()-3600);
	  setcookie("Question4", $q4, time()-3600);
	  setcookie("Question5", $q5, time()-3600);	
?>