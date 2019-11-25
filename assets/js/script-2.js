$(function () {
	$(".bars").on('click', function () {
		$(this).toggleClass("on");
		$(".sidenav").toggleClass("show-sidenav");
		$(".sidenav a").on('click', function () {
			$(".sidenav").removeClass("show-sidenav");
			$(".bars").removeClass("on");
		})
	})

	$('.times-flasher').on('click', function () {
		$('section.flasher').css('transform', 'translateY(-100%)');
	});

	var navbar = $("nav");
	var navLogin = $('.nav-login');
	var outerNav = navbar.outerHeight();
	var bars = $('.line');

	$(window).on('scroll', function () {
		var offsetNav = $(this).scrollTop();

		if (offsetNav > outerNav) {
			navbar.css({
				'background': '#FFF',
				'box-shadow': '0 3px 6px rgba(0,0,0,0.1)'
			})
			navLogin.css({
				'background': '#056BB5',
				'color': '#FFF'
			})
			bars.css({
				'background': '#056BB5'
			})
			$('#navFeature').css('color', '#056bb8');
		} else {
			navbar.css({
				'background': 'transparent',
				'box-shadow': 'none'
			})
			navLogin.css({
				'background': 'transparent',
				'color': '#FFF'
			})
			bars.css({
				'background': '#FFF'
			})
			$('#navFeature').css('color', '#FFF');
		}
	})

	// Detil
	$('a.nav-detil-menu').on('click', function () {
		var tabId = $(this).attr('data-tab');

		$('a.nav-detil-menu').removeClass('active-detil-menu');
		$('.tab-tagihan').fadeOut(500);

		$(this).addClass('active-detil-menu');
		$('#' + tabId).fadeIn(500);
	})
})