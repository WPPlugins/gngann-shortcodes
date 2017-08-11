jQuery(function($){
	$(window).ready(function(){
		$('.splits').each(function(){
			var height = 0;
			var left = 0;
			$(this).children().each(function(){
				if( ! $(this).hasClass('split') ) {
					$(this).remove();
					return;
				}
				if($(this).outerHeight() > height) height = $(this).outerHeight();
				$(this).css({'left' : left });
				left += $(this).outerWidth();
			});
			$(this).height(height).children().height(height);
			$(this).find('a.fancy br').remove();
		});
	});
});