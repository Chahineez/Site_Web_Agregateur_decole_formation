$(document).ready( function() {
    $('#myCarousel').carousel({
		interval:   3000
	});
	
	var clickEvent = false;
	$('#myCarousel').on('click', '#nav1 a', function() {
			clickEvent = true;
			$('#nav1 li').removeClass('active');
			$(this).parent().addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('#nav1').children().length -1;
			var current = $('#nav1 li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('#nav1 li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
});