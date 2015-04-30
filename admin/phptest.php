<?php include('common/config.php'); ?>
<?php include('db/selectTerm.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link charset='utf-8' rel='stylesheet' href='http://localhost:8080/yorkz/admin/dest/style/base/base.css' />
	<style>
		#alertBackdrop{
			height: 100%; 
			display: none;
		}
		#alert .alert{
			width: 300px;
			margin: 100px auto;
		}
		#alert .btn-area{
			text-align: right;
		}
		#alert .btn-area .btn{
			display: none;
		}
	</style>
</head>
<body>
	<button type="button" id="alertTest">点击啊</button>
	<!-- <div class="modal-backdrop fade in"></div>
	<div id="alert" class="modal fade in">
		<div class="alert alert-danger alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<h4 id="oh-snap!-you-got-an-error!">
				Oh snap! You got an error!
				<a class="anchorjs-link" href="#oh-snap!-you-got-an-error!">
					<span class="anchorjs-icon"></span>
				</a>
			</h4>
			<p>
				Change this and that and try again. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
			</p>
			<p>
				<button type="button" class="btn btn-danger">Take this action</button>
				<button type="button" class="btn btn-default">Or do this</button>
			</p>
		</div>
	</div> -->
	<script charset='utf-8' type='text/javascript' src='http://localhost:8080/yorkz/admin/dest/script/base/base.js'></script>
	<script>
		$(function(){

			$.alert = function(config){
				var defaults = {
					'type': 'danger',
					'title': '',
					'content': '',
					'width': 300
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
					html.push('		<button id="alertConfirm" type="button" class="btn btn-'+ config.type +'">确定</button>');
					html.push('		<button id="alertClose" type="button" class="btn btn-default">取消</button>');
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
					$alert.find('#alertConfirm').removeClass().addClass('btn btn-'+ config.type);
				}else{
					$alert.find('#alertConfirm').hide();
				}
				if(config.btnClose){
					$alert.find('#alertClose').show();
				}else{
					$alert.find('#alertClose').hide();
				}

				$backdrop.addClass('in').show();
				$alert.addClass('in').show();

				$alert.find('.alert').on('click', function(e){
					e.stopPropagation();
				});

				$alert.add($alert.find('.close')).add($alert.find('#alertClose')).on('click', function(){
					$backdrop.hide().removeClass('in');
					$alert.hide().removeClass('in');
					if(config.btnClose && typeof config.btnClose === 'function'){
						config.btnClose();
					}
				});

				$alert.find('#alertConfirm').on('click', function(){
					if(config.btnConfirm && typeof config.btnConfirm === 'function'){
						config.btnConfirm();
					}
				});
			};

			$('#alertTest').on('click', function(){
				$.alert({
					type: 'danger',
					title: '',
					content: '你确定要把这篇文章设为公开？',
					btnConfirm: function(){
						console.log(1);
					}
				})
			});

		});
	</script>
</body>
</html>