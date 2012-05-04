/*carrusel policial home*/
jQuery(function ($j) {
		$('.WDSCPslideshow').cycle({
			fx: 'scrollLeft',
			pager:  '.WDSCPnav',
			timeout: 0
		});
		
});

/*carrusel opinión home*/
jQuery(function ($j) {		
		
		$('.WDSCOslideshow').cycle({
			fx: 'scrollLeft',
			pager:  '.WDSCOnav',
			timeout: 0
		});
		
});


/*related */
jQuery(function ($j) {

	if ($('.related_post li a').length == 0) {
    	$('#related').hide();
  } else {
 
  }

});