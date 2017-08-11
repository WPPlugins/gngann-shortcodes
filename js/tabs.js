jQuery(function ($) {
	$(window).load(function(){
		$('.tabs').each(function(){
			var num_tabs = $(this).find('.tab').length;
			$(this).show();
			var w = $(this).width();
			var $contents = $('<div class="contents"></div>');
			var $titles = $('<div class="ttls"></div>');
			var tab_ctr = 0;
			$(this).find('.tab').each(function(){
				tab_ctr++;
				$titles.append($("<div class='ttl tab_"+tab_ctr+"' ctr='"+tab_ctr+"'>"+$(this).attr('ttl')+"</div>").css({'width': ( ( w / num_tabs )   ) + 'px' }).click(function(e){
					$(this).parents('.tabs').first().find('.tab').hide();
					$(this).parents('.tabs').first().find('.current').removeClass('current');
					$(this).addClass('current');
					$(this).parents('.tabs').first().find('.tab_'+$(this).attr('ctr')).show();
				}));
				$(this).addClass('tab_'+tab_ctr);
				$(this).children().first().each(function(){
					if($(this).is('br')) $(this).remove();
				});
				$contents.append($(this).hide());
				$(this).append("<div style='clear:both;'></div>");
			});
			$(this).html("");
			$(this).append($contents);
			$(this).prepend($titles);
			$(this).show();
			$(this).find('.ttl').first().click();
			$(this).append("<div style='clear:both;'></div>");
		});
	});
});