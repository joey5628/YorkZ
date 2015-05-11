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
				$sql = "select t.*, count(p.id) from term t left join posts p on t.id=p.term group by t.id order by t.id desc;";

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

	}

?>