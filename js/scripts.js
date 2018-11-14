
$(document).ready(function() {
	//ocultar y mostrar menu de mobiles, desde tamaño tablet
	$('.mobile-menu a').on('click', function() {
		$('nav.menu-sitio').toggle('slow')
	});

var breakpoint = 768;
//reacciona a Resize en la Pantalla tomando como cambio 768px;
$(window).resize(function() {
	if($(document).width()>= breakpoint) {
		$('nav.menu-sitio').show();
	} else {
		$('nav.menu-sitio').hide();
	}
});
	//Aqui trabajando con Jquery para darle trabajo a la Galeria de Wordpress
	// Fluidbox
	jQuery('.gallery a').each(function() {
		jQuery(this).attr('data-fluidbox', '');
	});
	if(jQuery('[data-fluidbox]').length > 0) {
		jQuery('[data-fluidbox]').fluidbox();
	}
});