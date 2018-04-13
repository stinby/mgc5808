require(['jquery'],function($){
	$('.panel.header .header-cart, .panel.header .header.links, .panel.header .block-search, .panel.header .brand').click(function(){
		$(this).toggleClass('open');
	});

	if($(window).width() < 768){
		$('.footer-box').click(
			function(){
	            $(this).children('.h5').toggleClass("open");
				$(this).children('.showhide').toggleClass("open");
		});
	};
})