$(function(){
	$('#postQuery').on('click', function(){
		var termId = $('#postTerm').val();
		window.location.href = 'editpost.php?type='+ INTERFACE.type + '&term=' + termId;
	});

	//设置公开或私密
	$('.btn-display').on('click', function(){
		var $this = $(this),
			id = $this.parents('tr').data('id'),
			display = parseInt($this.data('value'), 10),
			textArr = [['设为公开', '私密'], ['设为私密', '公开']],
			contentArr = ['你确定要设为公开吗？', '你确定要设为私密吗？'];

		$.alert({
			type: 'warning',
			content: contentArr[display],
			btnConfirm: function(callback){
				var updateDisplay = display ? 0 : 1;
				$.post('db/dbeditpost.php?act=updateDisplay', {
					'id': id,
					'display': updateDisplay
				}, function(data){
					if(data && data.ack == 'success'){
						$this.data('value', updateDisplay);
						$this.text(textArr[updateDisplay][0]);
						$this.parents('tr').find('td[data-column="display"]').text(textArr[updateDisplay][1]);
						callback();
					}
				}, 'json');
			},
			btnClose: function(){

			}
		});
	});

	//移至回收站
	$('.row-actions .btn-recycle').on('click', function(){
		var $this = $(this),
			id = $this.parents('tr').data('id');

		$.alert({
			type: 'danger',
			content: '你确定要把这篇文章移至回收站吗？',
			btnConfirm: function(callback){
				$.post('db/dbeditpost.php?act=moveToRecycle', {'id': id}, function(data){
					if(data && data.ack == 'success'){
						// var $bread = $('.breadcrumb'),
						// 	$all = $bread.find('li[data-status="all"]').find('.badge'),
						// 	$recycle = $bread.find('li[data-status="recycle"]').find('.badge');

						// $all.text(parseInt($all.text(), 10) - 1);
						// $recycle.text(parseInt($recycle.text(), 10) + 1);
						// $this.parents('tr').slideUp(600, function(){
						// 	$this.parents('tr').remove();
						// });
						callback();
						window.location.reload();
					}
				}, 'json');
			},
			btnClose: function(){}
		});
	});

	//删除
	$('.row-actions .btn-delete').on('click', function(){
		var $this = $(this),
			id = $this.parents('tr').data('id');

		$.alert({
			type: 'danger',
			content: '你确定要删除这篇文章吗？',
			btnConfirm: function(callback){
				$.post('db/dbeditpost.php?act=deletePost', {'id': id}, function(data){
					if(data && data.ack == 'success'){
						callback();
						window.location.reload();
					}
				}, 'json');
			},
			btnClose: function(){}
		});
	});
});