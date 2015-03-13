<?php
	// 加载js和css
	/**
	* 
	*/
	class Fed{

		public $baseCss = 'dest/style/base/base.css';
		public $pageCss = 'dest/style/page/';
		public $baseJs = 'dest/script/base/base.js';
		public $pageJs = 'src/script/page/'; //先用未压缩的js

		//注入变量
	    public function __construct(){
	    	$url = $_SERVER['PHP_SELF'];  
			$name = end(explode('/', $url));  
			$name = current(explode('.', $name));

			$this->name = $name;
		}

		public function addEditorCss(){
			$fullurl = RESOURCE . 'dest/umeditor/themes/default/css/umeditor.min.css';
			echo "<link charset='utf-8' rel='stylesheet' href='$fullurl' />\r\n";
		}

		public function addEditorJs(){
			$js_url = RESOURCE . 'dest/umeditor/umeditor.min.js';
			$js_config_url = RESOURCE . 'dest/umeditor/umeditor.config.js';
			echo "<script charset='utf-8' type='text/javascript' src='$js_url'></script>\r\n";
			echo "<script charset='utf-8' type='text/javascript' src='$js_config_url'></script>\r\n";
		}

		public function allCss(){
			$this->addBaseCss();
			$this->addPageCss();
		}


		public function addBaseCss(){
			$this->is_null_make($this->baseCss); //测试文件是否存在
			$fullurl = RESOURCE . $this->baseCss;
			echo "<link charset='utf-8' rel='stylesheet' href='$fullurl' />\r\n";
		}

		public function addPageCss(){
			$link = $this->pageCss . $this->name . '.css';
			$this->is_null_make($link); //测试文件是否存在
			$fullurl = RESOURCE . $link;
			echo "	<link charset='utf-8' rel='stylesheet' href='$fullurl' />\r\n";
		}

		public function allJs(){
			$this->addBaseJs();
			$this->addPageJs();
		}

		public function addBaseJs(){
			$this->is_null_make($this->baseJs); //测试文件是否存在
			$fullurl = RESOURCE . $this->baseJs;
			echo "<script charset='utf-8' type='text/javascript' src='$fullurl'></script>\r\n";
		}

		public function addPageJs(){
			$link = $this->pageJs . $this->name . '.js';
			$this->is_null_make($link); //测试文件是否存在
			$fullurl = RESOURCE . $link;
			echo "	<script charset='utf-8' type='text/javascript' src='$fullurl'></script>\r\n";
		}

		//不存在自动生成对应的空文件
		public function is_null_make($filename){
			if(is_file($filename)){
				return $filename;
			}else{
				exit('文件: '.$filename.' 有异常');
			}

		}

	}

?>