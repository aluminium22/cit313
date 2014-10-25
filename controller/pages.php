<?php
function getPage($action){
				$db = connectToDatabase();
				foreach($db->query("SELECT * FROM ".$action) as $row){
				$row;
				return $row;
				}		
			}

?>