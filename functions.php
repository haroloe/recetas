<?php

function lapizeria_styles() {

	//registro de estilos
	wp_register_style( 'normalize', get_template_directory_uri().'/css/normalize.css', array(), '8.0.1');
	wp_register_style('style', get_template_directory_uri().'/style.css', array('normalize'), '1.0');

	//llamar a los estilos ya registrados
	wp_enqueue_style('normalize');
	wp_enqueue_style('style');

}

add_action( 'wp_enqueue_scripts();', 'lapizeria_styles' );


function lapizzeria_menus() {
	register_nav_menus( array(		
		'header-menu' => __('Header Menu', 'lapizzeria'),
		'social-menu' => __('Social Menu', 'lapizzeria'),

	) );
}

add_action( 'init', 'lapizzeria_menus');