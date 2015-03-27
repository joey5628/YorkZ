$(function(){
	/**
	 *	slidebar
     */
    var $slidebar = $('.slidebar'),
    	$open = $slidebar.find('li.nav-open>a');

    $open.on('click', function(){
    	var $this = $(this);
    	if($this.hasClass('current')){
    		$this.removeClass('current');	
    	}else{
    		$this.addClass('current');	
    	}
    	$this.siblings('.sub-nav').slideToggle('fast');
    });
        
    $('[data-toggle="tooltip"]').tooltip();
});
