/**
 *	@author yi.z
 *	@date 2015-03-12
 */


$(function(){
	(function(){
		var umHeight = $(window).height() - 250;
		window.UMEDITOR_CONFIG.initialFrameHeight = umHeight;
	})();
	
	var editor = UM.getEditor('myEditor');

	/**
	 *	设置UM的大小
	 */
	function setUmSize(){
		var height = $(window).height() - 250,
			width = $('.post-content').width();
		editor.setWidth(width);
		editor.setHeight(height);
	}

	$(window).resize(function(){
		setTimeout(setUmSize, 200);
	});


	//检查title和content是否输入
	function getVal(){
		var $title = $('#title'),
			title = $title.val(),
			content = editor.getContent();

		if(title == ""){
			$.showAlert('标题不能为空！', 'danger');
			return false;
		}
		if(content == ''){
			$.showAlert('内容不能为空！', 'danger');
			return false;
		}

		return {
			id: parseInt($('#postId').val()),
			title: title,
			content: content,
			display: $('#displayStatus').val(),
			term: $('#postTerm').val(),
			tag: ''
		};
	}

	$('#saveBtn').on('click', function(){
		var param = getVal();

		if(param){
			$.post('db/dbaddpost.php?act=draft', param, function(data){
				if(data && data.ack == 'success'){
					$('#postId').val(data.id);
					$.showAlert('保存成功！', 'success');	
				}else{
					$.showAlert('保存失败！', 'danger');
				}
			}, 'json');
		}
	});

	$('#publishBtn').on('click', function(){
		var param = getVal();

		if(param){
			$.post('db/dbaddpost.php?act=publish', param, function(data){
				if(data && data.ack == 'success'){
					$('#postId').val(data.id);
					$.showAlert('发表成功！', 'success');	
				}else{
					$.showAlert('发表失败！', 'danger');
				}
			}, 'json');
		}
	});

	$('#recycleBtn').on('click', function(){
		var param = getVal();

		if(param){
			$.post('db/dbaddpost.php?act=recycle', param, function(data){
				if(data && data.ack == 'success'){
					$('#postId').val(data.id);
					//$.showAlert('移至回收站成功！', 'success');	
					window.location.href = 'editpost.php';
				}else{
					$.showAlert('移至回收站失败！', 'danger');
				}
			}, 'json');
		}
	});

});