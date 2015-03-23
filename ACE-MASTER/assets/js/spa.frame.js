	
	$(window).load(function(){
		setTimeout(function(){$(".loading-container").addClass("loading-inactive")},0);
		var ajax_url = location.hash.replace(/^#/, '');
		if (ajax_url.length < 1 || ajax_url == '#') {
			ajax_url = 'blank.html';
		}
		
		LoadAjaxContent(ajax_url);
	});
	
	$(document).on('click', '.sidebar-menu a' ,function(e) {
		var url = $(this).attr('href');
		if (url == '#') { e.preventDefault(); }
		
		if ($(this).hasClass('ajax-link')) {
			var parents = $(this).parents('li');
			var another_items = $('.sidebar-menu').not(parents);
			another_items.find('li').removeClass('active');
			$(parents).addClass('active');
			if(url != '#') { window.location.hash = url; LoadAjaxContent(url); }
			e.preventDefault();
		}
	});
	
	$(document).on('click', '.ajax-load' ,function(e) {
		var url = $(this).attr('href');
		if (url == '#') { e.preventDefault(); }
		
		window.location.hash = url;
		LoadAjaxContent(url);
		e.preventDefault();	
	});
	
	//Custom JS
	function pageRefresh() {
		LoadAjaxContent(urlAction.getSiteAction('/'+location.hash.replace(/^#/, '')));
	};
	
	function LoadAjaxContent(url){
		$('#ajax-content').html('');
		$('.preloader').show();
		$.ajax({
			mimeType: 'text/html; charset=utf-8',
			url: url,
			type: 'GET',
			dataType: "html",
			success: function(data) {
				$('#ajax-content').html(data);
				$('.preloader').hide();				
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
				location.replace(urlAction.getSiteAction('/'));
			},
			async: false
		});
	}