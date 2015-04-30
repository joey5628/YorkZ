<?php
	error_reporting(E_ERROR);

	require('../common/db.php');
	require('../common/checklogin.php');

	$act = $_GET['act'];
	$id = $_POST['id'];
	date_default_timezone_set("Asia/Shanghai");
	$time = date('Y-m-d H:i:s',time()); 
	$data = array();

	if($id){
		try{
			$db = getDBConnect();
        	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
			
			$sql = '';
			$stmt = null;

			if($act == 'updateDisplay'){
				$display = $_POST['display'];
	        	$sql = "update posts set modified=:modified, display=:display where id=:id";  
		        $stmt = $db->prepare($sql);  
		        $stmt->bindParam(":id", $id);  
		        $stmt->bindParam(":modified", $time);
		        $stmt->bindParam(":display", $display); 
			}else if($act == 'moveToRecycle'){
	        	$sql = "update posts set modified=:modified, status='recycle' where id=:id";  
		        $stmt = $db->prepare($sql);  
		        $stmt->bindParam(":id", $id);  
		        $stmt->bindParam(":modified", $time);
			}else if($act == 'deletePost'){
				$sql = "delete from posts where id=$id";
				$stmt = $db->prepare($sql); 
			}

	        $result = $stmt->execute();  
	        if($result){
	        	$data = array(
	        		'ack'=>'success',
	        		'id'=>$id
	        	);
	        }else{
	        	$data = array(
	        		'ack'=>'error',
	        		'error'=>'',
	        		'id'=>$id
	        	);
	        }

		}catch(PDOException $e){
			$data = array(
				'ack'=>'error',
				'error'=>$e->getMessage()
			);
		}
	}

	exit(json_encode($data));

?>