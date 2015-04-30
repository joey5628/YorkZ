$(function(){

	//新建一行分类
	function addTermTr(data){
		var html = [];
		html.push('<tr data-id="'+ data.id +'" data-name="'+ data.name +'" data-slug="'+ data.slug 
					+'" data-display="'+ data.display +'" data-group="'+ data.group +'" data-count="0">');
		html.push('	<td>');
		html.push('		<strong>');
		html.push('			<a href="javascript:;" data-toggle="modal" data-target="#myModal">'+ data.name +'</a>');
		html.push('		</strong>');
		html.push('		<div class="row-actions">');
		html.push('			<a href="javascript:;" data-toggle="modal" data-target="#myModal">编辑</a>&nbsp;&nbsp;|&nbsp;&nbsp;');
		html.push('			<a class="btn-recycle" href="javascript:;">删除</a>&nbsp;&nbsp;|&nbsp;&nbsp;');
		html.push('			<a href="#">查看</a>');
		html.push('		</div>');
		html.push('	</td>');
		html.push('	<td>'+ data.slug +'</td>');
		if(data.display){
		html.push('	<td>公开</td>');
		}else{
		html.push('	<td>私密</td>');
		}
		html.push('	<td>0</td>');
		html.push('</tr>');
		$('.table tbody').prepend(html.join(''));
	} 

	//修改一行分类
	function updateTermTr(data){
		var $tr = $('.table tr[data-id="'+ data.id +'"');
			$tr.data('name', data.name);
			$tr.data('slug', data.slug);
			$tr.data('display', data.display);
			$tr.data('group', data.group);
			$tr.data('count', data.count);
		$tr.find('td').eq(0).find('strong a').text(data.name);
		$tr.find('td').eq(1).text(data.slug);
		$tr.find('td').eq(2).text(data.display == 1 ? '公开' : '私密');
		$tr.find('td').eq(3).text(data.count);
	}

	//新建分类
	$('#addTermBtn').on('click', function(){
		var go = 1,
			$name = $('#termName'),
			$slug = $('#termSlug'),
			$display = $('input[name="termDisplay"]'),
			$group = $('#termGroup');
		if($name.val() == ''){
			$name.parent().addClass('has-error');
			go = 0;
		}
		if($slug.val() == ''){
			$slug.parent().addClass('has-error');
			go = 0;
		}
		if(go == 1){
			var param = {
				name: $name.val(),
				slug: $slug.val(),
				display: $('input[name="termDisplay"]:checked').val(),
				group: $group.val()
			};
			$.post('db/dbeditterm.php?act=add', param, function(data){
				if(data && data.ack == 'success'){
					$.alert({
						type: 'success',
						content: '新建分类成功！'
					});
					$('.col-left input.form-control').val('');
					$("#termDisplay1").trigger('click');
					$group.val(0);
					param.id = data.id;
					addTermTr(param);
				}else{
					$.alert({
						type: 'danger',
						content: '新建分类失败！'
					});	
				}
			}, 'json');
		}
	});

	//去掉红框
	$('input.form-control').on('change', function(){
		var $this = $(this);
		if($this.val() != ''){
			$this.parent().removeClass('has-error');
		}
	});

	$('.table .btn-recycle').on('click', function(){
		var $this = $(this),
			id = $this.parents('tr').data('id');
		$.alert({
			type: 'danger',
			content: '你确定要删除该分类吗？',
			btnConfirm: function(callback){
				$.post('db/dbeditterm.php?act=delete', {
					'id': id
				}, function(data){
					if(data && data.ack == 'success'){
						$this.parents('tr').remove();
						callback();
					}
				}, 'json');
			},
			btnClose: function(){

			}
		});
	});

	$('#myModal').on('show.bs.modal', function (e) {
	  	var data = $(e.relatedTarget).parents('tr').data();
	  		$modal = $('#myModal');
	  	$('#utermId').val(data.id);
	  	$('#utermName').val(data.name);
	  	$('#utermSlug').val(data.slug);
	  	$('input[name="utermDisplay"][value="'+ data.display +'"]').trigger('click');
	  	$('#utermGroup').val(data.group);
	  	$('#upostCount').val(data.count);
	});

	//保存修改
	$('#myModal .btn-primary').on('click', function(){
		var $this = $(this);
		$this.button('loading');
		var go = 1,
			$name = $('#utermName'),
			$slug = $('#utermSlug'),
			$display = $('input[name="utermDisplay"]'),
			$group = $('#utermGroup');
		if($name.val() == ''){
			$name.parent().addClass('has-error');
			go = 0;
		}
		if($slug.val() == ''){
			$slug.parent().addClass('has-error');
			go = 0;
		}
		if(go == 1){
			var param = {
				id: $('#utermId').val(),
				name: $name.val(),
				slug: $slug.val(),
				display: $('input[name="utermDisplay"]:checked').val(),
				group: $group.val()
			};
			$.post('db/dbeditterm.php?act=update', param, function(data){
				$this.button('reset');
				$('#myModal').modal('hide');
				if(data && data.ack == 'success'){
					$.alert({
						type: 'success',
						content: '修改分类成功！'
					});
					updateTermTr(param);
				}else{
					$.alert({
						type: 'danger',
						content: '修改分类失败！'
					});	
				}
			}, 'json');
		}
	});

});