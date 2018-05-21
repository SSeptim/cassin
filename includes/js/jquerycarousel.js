jQuery(window).load(function(){
		jQuery('#foo').carouFredSel({
			auto: false,
			responsive: true,
			width: '100%',
			scroll: 1,
			pagination: '.pager2',
			prev: 'a.prev',
			next: 'a.next',
			items: {
				height: 'variable'
				}
			});
		});