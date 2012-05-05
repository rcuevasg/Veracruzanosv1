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
    /*nothing*/
  }

});


jQuery(function ($j) {
	$(".site_title_button").lettering();
});


/* Mini banner rotations Cycle plugin*/
jQuery(function ($j) {
	$('#slide_avisos').cycle({
	fx: 'scrollLeft',
	speed: 'slow',
	timeout: 10000,
	pager: '#nav_avisos',
	slideExpr: 'a'
	});
}); 

/* flecha abajo menu*/
jQuery(function ($j) { 
	$(".menu-item").has("ul.sub-menu").addClass("arrow");
}); 





