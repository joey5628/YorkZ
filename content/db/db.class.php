<?php
	// content 中各种查询
	
	/**
	 *	连接数据库
	 */
	function getDBConnect(){
		$db_host = 'localhost';
		$db_name = 'db_demo';
		$db_user = 'root';
		$db_pass = '';

		$db = new PDO('mysql:host='. $db_host .';dbname='. $db_name, $db_user, $db_pass);
		$db->query("set character set 'utf8'");

		return $db;
	}

	class Db{

		// 获取类别数据
		public function getTerms(){
			try{
				$db = getDBConnect();
				$sql = "select t.*, count(p.id) from term t left join posts p on t.id=p.term 
						
						group by t.id order by t.id desc;";
				//where p.status='publish' and p.display=1 
				$rs = $db->query($sql);
				$rs->setFetchMode(PDO::FETCH_ASSOC);
				$result = $rs->fetchAll();
				
				$obj = array('all' => 0);

				foreach ($result as $row) {
					$array = array(
							'id' => $row['id'],
							'name' => $row['term_name'],
							'group' => $row['term_group'],
							'count' => $row['count(p.id)'],
							'hasChild' => 0
						);

					$obj[$row['id']] = $array;
				}

				foreach ($obj as $arr) {
					$group = $arr['group'];
					$count = $arr['count'];
					if($group != 0){
						$obj[$group]['count'] = $obj[$group]['count'] + $count;
						$obj[$group]['hasChild'] = 1;
					}
				}

				foreach ($obj as $arr) {
					$group = $arr['group'];
					$count = $arr['count'];
					if($group == 0){
						$obj['all'] = $obj['all'] + $count;
					}
				}

				return $obj;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		// 获取每月的文章数
		public function getCountByMonth(){
			try{
				$db = getDBConnect();
				// 这个slq可以改写成用 date_format
				$sql = "select year(create_date) as 'year', month(create_date) as 'month',count(id) as 'count' from posts 
						where status='publish' and display=1 
						group by month(create_date) 
						order by create_date desc;";

				$rs = $db->query($sql);
				$rs->setFetchMode(PDO::FETCH_ASSOC);
				$result = $rs->fetchAll();

				return $result;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		// 获取推荐阅读
		public function getRecommedPosts(){
			try{
				$db = getDBConnect();
				//select p.*, date_format(p.create_date, '%Y-%m-%d') as time, t.term_name from posts p left join term t on p.term=t.id order by create_date desc
				$sql = "select *, date_format(create_date,'%Y/%m/%d') as time from posts 
						where recommend=1 and status='publish' and display=1
						order by create_date desc";

				$rs = $db->query($sql);
				$rs->setFetchMode(PDO::FETCH_ASSOC);
				$result = $rs->fetchAll();

				return $result;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		// 查询每个分类下的子分类
		public function getTermByTermGroup($termGroup){
			try{
				$db = getDBConnect();
				$sql = "select id from term where term_group=$termGroup;";
				$rs = $db->query($sql);
				$rs->setFetchMode(PDO::FETCH_ASSOC);
				$result = $rs->fetchAll();

				foreach ($result as $value) {
					$termGroup .= ',' . $value['id'];
				}
				
				return $termGroup;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		// 获取文章总数
		public function getPostCount($termId){
			try{
				$db = getDBConnect();
				$sql = "select * from posts where status='publish' and display=1";
				if($termId){
					$termStr = $this->getTermByTermGroup($termId);
					$sql .= " and term in($termStr)";
				}
				$sql .= ";";
				echo $sql ."<br>";
				//$sql = "select * from posts where status='publish' and display=1;";

				$rs = $db->query($sql);
				$count = $rs->rowCount();

				return $count;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		//获取文章
		public function getPosts($start, $pageSize, $termId){
			try{
				$db = getDBConnect();
				$sql = "select p.*, date_format(p.create_date, '%Y-%m-%d') as time, t.term_name from posts p left join term t on p.term=t.id where p.status='publish' and p.display=1";
				if($termId){
					$termStr = $this->getTermByTermGroup($termId);
					$sql .= " and term in($termStr)";
				}
				$sql .= " order by create_date desc limit $start, $pageSize;";
				//$sql = "select p.*, date_format(p.create_date, '%Y-%m-%d') as time, t.term_name from posts p left join term t on p.term=t.id where p.status='publish' and p.display=1 order by create_date desc limit $start, $pageSize;";
				echo $sql;
				$rs = $db->query($sql);
				$rs->setFetchMode(PDO::FETCH_ASSOC);
				$result = $rs->fetchAll();

				return $result;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

	}

?>