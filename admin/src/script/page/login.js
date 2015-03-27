$(function(){
	var $pic = $('.header-pic'),
		$username = $('#username'),
		$password = $('#password'),
		$alert = $('.alert');

	$username.add($password).on('change', function() {
		$('.alert').slideUp(200);
		$(this).parent().removeClass('has-error');
	});

});

function doLogin(){
	var $btn = $('#loginBtn'),
		$username = $('#username'),
		$password = $('#password'),
		$alert = $('.alert');

	if($.trim($username.val()) == ''){
		$username.parent().addClass('has-error');
		$alert.text('用户名不能为空！');
		$alert.slideDown(200);
		$username.focus();
		return ;
	}
	if($.trim($password.val()) == ''){
		$password.parent().addClass('has-error');
		$alert.text('密码不能为空！');
		$alert.slideDown(200);
		$password.focus();
		return ;
	}

	$btn.button('loading');

	$.post('login.php', {'username': $username.val(), 'password': $password.val()}, function(data){
		$btn.button('reset');
		if(data == 0){
			$alert.text('用户名或密码错误！').slideDown(200);
		}else{
			window.location.href = 'index.php';
		}
	}, 'json');
}