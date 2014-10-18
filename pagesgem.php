<?php
function getGem(){
				$db = connectToDatabase();
				$query = $db->prepare("SELECT * FROM  stones");
				$query->execute();
				$result = $query->fetchAll();
				   foreach($result as $row){
				   	echo $row['name']."<br/><br/>";
				   }
				
			}

?>