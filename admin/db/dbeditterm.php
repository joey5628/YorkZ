<?php
	error_reporting(E_ERROR);

	require('../common/db.php');
	require('../common/checklogin.php');

	$act = $_GET['act'];

	if($act == 'add'){
		try{

			$name = $_POST['name'];
			$slug = $_POST['slug'];
			$display = $_POST['display'];
			$group = $_POST['group'];

			$db = getDBConnect();

			$sql = "insert into term (term_name, slug, display, term_group) values ('$name', '$slug', '$display', '$group')";
			$db->exec($sql);
			$id = $db->lastInsertId();

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
	}else if($act == 'update'){
		try{
			$id = $_POST['id'];
			$name = $_POST['name'];
			$slug = $_POST['slug'];
			$display = $_POST['display'];
			$group = $_POST['group'];

			$db = getDBConnect();
        	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
			
        	$sql = "update term set term_name=:term_name, slug=:slug, display=:display, term_group=:term_group where id=:id";  
	        $stmt = $db->prepare($sql);  
	        $stmt->bindParam(":id", $id);  
	        $stmt->bindParam(":term_name", $name);   
	        $stmt->bindParam(":slug", $slug);  
	        $stmt->bindParam(":display", $display); 
	        $stmt->bindParam(":term_group", $group);
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
	}else if($act == 'delete'){
		try{
			$id = $_POST['id'];

			$db = getDBConnect();
	    	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			$sql = "delete from term where id=$id";
			$stmt = $db->prepare($sql);
			$result = $stmt->execute();  
	        if($result){
	        	$data = array(
	        		'ack'=>'success',
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