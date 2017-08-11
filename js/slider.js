function shift_slider(){
	jQuery(function ($) {
		$('.slider').each(function(){
			if($(this).find('.ttl.current').is(':last-child')) $(this).find('.ttl').first().click();
			else $(this).find('.ttl.current').next().click();
		});
	});
}
jQuery(function ($) {
	var $outer = $('<div class="slider_outer_bg"></div>');
	var $contents = $('<div class="contents"></div>');
	var $titles = $('<div class="ttls"></div>');
	$(window).ready(function(){
		$('.slider').each(function(){

			if($(this).hasClass('first')){
				var h = $(this).attr('hh');
				$('body').prepend($outer);
				var offset = $( this ).offset();
				var h = $(this).attr('hh');
				$('body').prepend($outer);
				$outer.css( { 'top' : offset.top, 'height' : h } )
				$bar = $('#wpadminbar');
				if($bar.length > 0) $outer.css( { 'top' : "+=32" } )
				$('.content').prepend($(this));
			}
			var num_slides = $(this).find('.slide').length;
			var w = $(this).width();
			var h = $(this).attr('hh');
			var tab_ctr = 0;
			$(this).find('.slide').each(function(){
				if(h) $contents.height(h);
				else if ($(this).height() > $contents.height()) $contents.height($(this).height());
				tab_ctr++;
				$titles.append($("<div class='ttl slide_"+tab_ctr+"' ctr='"+tab_ctr+"'></div>").click(function(e){
					$(this).parents('.slider').first().find('.slide').fadeOut(1000);
					$(this).parents('.slider').first().find('.current').removeClass('current');
					$(this).addClass('current');
					$(this).parents('.slider').first().find('.slide_'+$(this).attr('ctr')).fadeIn(1000);
				}));
				$(this).addClass('slide_'+tab_ctr);
				$(this).hide().css({'background': "transparent url('" + $(this).find('img').attr('src') + "') no-repeat top left", 'height' : h});
				$(this).find('img').remove();
				$(this).append("<div style='clear:both;'></div>");
				$contents.append($(this));
			});
			$(this).html("");
			$(this).append($contents);
			$(this).append($titles);


		});
	});
	$(window).load(function(){
		var ran_slider = false;
		$('.slider').each(function(){
			$outer.height($contents.height());
			$(this).find('.ttl').first().click();
			$(this).append("<div style='clear:both;'></div>");
			ran_slider = true;
		});
		if(ran_slider) setInterval(function(){ shift_slider(); },7000);
	});
});