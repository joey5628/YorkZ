$(function(){

	$.alert = function(config){
		var defaults = {
			'type': 'danger',
			'title': '',
			'content': '',
			'width': 300/*,
			'btnConfirm': function(){

			},
			'btnClose': function(){

			}*/
		};

		config = $.extend(defaults, config);

		var $backdrop = $('#alertBackdrop');
		if($backdrop.length === 0){
			$backdrop = $('<div id="alertBackdrop" class="modal-backdrop fade"></div>');
			$backdrop.appendTo($('body'));
		}

		var $alert = $('#alert');
		if($alert.length === 0){
			var html = [];
			html.push('<div id="alert" class="modal fade">');
			html.push('	<div class="alert alert-'+ config.type +'" role="alert">');
			html.push('		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
			html.push('		<h4>'+ config.title +'</h4>');
			html.push('		<p class="alert-content">'+ config.content +'</p>');
			html.push('		<p class="btn-area">');
			html.push('		<button id="alertConfirm" type="button" class="btn btn-sm btn-'+ config.type +'">确定</button>');
			html.push('		<button id="alertClose" type="button" class="btn btn-sm btn-default">取消</button>');
			html.push('		</p>');
			html.push('	</div>');
			html.push('</div>');
			$alert = $(html.join(''));
			$(document.body).append($alert);
		}else{
			$alert.find('.alert').removeClass().addClass('alert alert-'+ config.type);
			$alert.find('h4').text(config.title);
			$alert.find('p.alert-content').text(config.content);
		}

		if(config.btnConfirm){
			$alert.find('#alertConfirm').show();
			$alert.find('#alertConfirm').removeClass().addClass('btn btn-sm btn-'+ config.type);
		}else{
			$alert.find('#alertConfirm').hide();
		}
		if(config.btnClose){
			$alert.find('#alertClose').show();
		}else{
			$alert.find('#alertClose').hide();
		}

		$backdrop.show(0, function(){
			$backdrop.addClass('in');	
		});
		$alert.show(0, function(){
			$(this).addClass('in');
		});

		$alert.find('.alert').on('click', function(e){
			e.stopPropagation();
		});

		$alert.add($alert.find('.close')).add($alert.find('#alertClose')).on('click', function(){
			if($alert.find('#alertConfirm').data('loading') != 1){
				hideAlert();
				if(config.btnClose && typeof config.btnClose === 'function'){
					config.btnClose();
				}
			}
		});

		function hideAlert(){
			$backdrop.removeClass('in');
			$alert.removeClass('in');
			$backdrop.one('transitionend', function(){
				$backdrop.hide();
			});
			$alert.one('transitionend', function(){
				$alert.hide();
			});
		}

		$alert.find('#alertConfirm').on('click', function(){
			var $this = $(this);
			$this.button('loading').data('loading', 1);
			if(config.btnConfirm && typeof config.btnConfirm === 'function'){
				config.btnConfirm(function(){
					hideAlert();
					$this.button('loading').data('loading', 0);
					$this.button('reset');
				});
			}
		});
	};

});