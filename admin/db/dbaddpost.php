<?php
	error_reporting(E_ERROR);

	require('../common/db.php');
	require('../common/checklogin.php');

	$act = $_GET['act'];
	$id = $_POST['id'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$display = $_POST['display'];
	$term = $_POST['term'];
	$tag = $_POST['tag'];
	$recommend = $_POST['recommend'];
	$status = $act;
	date_default_timezone_set("Asia/Shanghai");
	$time = date('Y-m-d H:i:s',time()); 
	$data = array();

	if($id){
		try{
			$db = getDBConnect();
        	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
			
        	$sql = "update posts set modified=:modified, title=:title, content=:content, status=:status, display=:display, term=:term, tag=:tag, recommend=:recommend where id=:id";  
	        $stmt = $db->prepare($sql);  
	        $stmt->bindParam(":id", $id);  
	        $stmt->bindParam(":modified", $time);   
	        $stmt->bindParam(":title", $title);  
	        $stmt->bindParam(":content", $content); 
	        $stmt->bindParam(":status", $status);
	        $stmt->bindParam(":display", $display); 
	        $stmt->bindParam(":term", $term); 
	        $stmt->bindParam(":tag", $tag); 
	        $stmt->bindParam(":recommend", $recommend); 
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
	}else{ //新建
		try{
			$db = getDBConnect();

			$sql = "insert into posts (create_date, modified, title, content, status, display, term, tag, recommend) values ('$time', '$time', '$title', '$content', '$status', '$display', '$term', '$tag', '$recommend')";
			echo $sql;
			$db->exec($sql);
			$id = $db->lastInsertId();
			echo $id;
			$data = array(
				'ack'=>'success',
				'id'=>$id
			);
		}catch(PDOException $e){
			$data = array(
				'ack'=>'error',
				'error'=>$e->getMessage()
			);
		}
	}
	exit(json_encode($data));

?>