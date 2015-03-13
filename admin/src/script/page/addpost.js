/**
 *	@author yi.z
 *	@date 2015-03-12
 */


$(function(){
	(function(){
		$('[data-toggle="tooltip"]').tooltip();

		var umHeight = $(window).height() - 250;
		window.UMEDITOR_CONFIG.initialFrameHeight = umHeight;
	})();
	
	var um = UM.getEditor('myEditor');

	/**
	 *	设置UM的大小
	 */
	function setUmSize(){
		var height = $(window).height() - 250,
			width = $('.post-content').width();
		um.setWidth(width);
		um.setHeight(height);
	}

	$(window).resize(function(){
		setTimeout(setUmSize, 200);
	});

});