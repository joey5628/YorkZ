<?php
	
	function getTerms(){
		try{
			$db = getDBConnect();
			$sql = "select * from term";
			$result = $db->query($sql);
	
			return $result;			
		}catch(PDOException $e){
			echo $e->getmessage();
		}
	}
?>