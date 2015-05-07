$(function(){
	// navbar search
	$('#linkSearch').on('click', function(){
		$('#searchForm').removeClass('form-hidden');
		$('#linkSearch').addClass('hidden');
		$('#formText').on('transitionend', function(){
			$('#formText').focus();	
		});
	});
	$('#searchForm input').on('blur', function(){
		$('#searchForm').addClass('form-hidden');
		$('#linkSearch').removeClass('hidden');
	});
});