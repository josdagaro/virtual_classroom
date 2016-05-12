/*
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
*/

(function($) {

	skel
		.breakpoints({
			xlarge: '(max-width: 1680px)',
			large: '(max-width: 1280px)',
			medium: '(max-width: 980px)',
			small: '(max-width: 736px)',
			xsmall: '(max-width: 480px)'
		});

	$(function() {

		var	$window = $(window),
			$body = $('body');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				window.setTimeout(function() {
					$body.removeClass('is-loading');
				}, 100);
			});

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Prioritize "important" elements on medium.
			skel.on('+medium -medium', function() {
				$.prioritize(
					'.important\\28 medium\\29',
					skel.breakpoint('medium').active
				);
			});

		// Nav.
			$('#nav')
				.append('<a href="#nav" class="close"></a>')
				.appendTo($body)
				.panel({
					delay: 500,
					hideOnClick: true,
					hideOnSwipe: true,
					resetScroll: true,
					resetForms: true,
					side: 'right'
				});

	});

		$("#go-sign-up").click (
				function () {
						$("#sign-in-form").slideUp (
								300, function () {
										$("#sign-up-form").slideDown (300);

										$("#p-login").fadeOut (
												300, function () {
														$("#p-login").text ("Regístrate en nuestra plataforma");
														$("#p-login").fadeIn (300);
												}
										);

										$("#h-login").fadeOut (
												300, function () {
														$("#h-login").text ("Regístrate");
														$("#h-login").fadeIn (300);
												}
										);
								}
						);
				}
		);

		$("#go-sign-in").click (
				function () {
						$("#sign-up-form").slideUp (
								300, function () {
										$("#sign-in-form").slideDown (300);

										$("#p-login").fadeOut (
												300, function () {
														$("#p-login").text ("Ingresa a nuestra plataforma con tu cuenta personal");
														$("#p-login").fadeIn (300);
												}
										);

										$("#h-login").fadeOut (
												300, function () {
														$("#h-login").text ("Conéctate");
														$("#h-login").fadeIn (300);
												}
										);
								}
						);
				}
		);
})(jQuery);
