$(function(){

	var $alertModal = $('#alertModal');
	if($alertModal.length === 0){
		var html = [];
		html.push('<div id="alertModal" class="modal fade">');
		html.push('	<div class="modal-dialog modal-sm">');
		html.push('		<div class="alert alert-info" role="alert">');
		html.push('			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
		html.push('			<p></p>');
		html.push('		</div>');
		html.push('	</div>');
		html.push('</div>');

		$('body').append(html.join(''));
	}

	$.showAlert = function(text, type){
		var $alertModal = $('#alertModal'),
			$alert = $alertModal.find('.alert');
		if(!type){
			type = 'danger';
		}
		$alert.removeClass().addClass('alert alert-' + type);
		$alert.find('p').text(text);
		$alertModal.modal('show');
	};

});