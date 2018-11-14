<?php

function lapizzeria_database() {
	//Definiciendo Variables Globales
	//variable global de wp para manejo de base de datos $wpdb
	global $wpdb;
	//variable definida por nosotros
	global $lapizzeria_dbversion;
	$lapizzeria_dbversion='0.1';

	$tabla=$wpdb->prefix.'reservaciones';
	$charset_collage = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE $tabla (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		nombre varchar(50) NOT NULL,
		fecha datetime NOT NULL,
		correo varchar(50) DEFAULT '' NOT NULL,
		telefono varchar(15) NOT NULL,
		mensaje longtext NOT NULL,
		PRIMARY KEY (id)
		) $charset_collage;";

	require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	
	dbDelta( $sql );

	add_option( 'lapizzeria_dbversion', $lapizzeria_dbversion );	

}

add_action ('after_setup_theme', 'lapizzeria_database');

//actualizar en caso sea necesario
/*
$version_actual = get_option( 'lapizzeria_dbversion' );

if($lapizzeria_dbversion != $version_actual) {
	$tabla=$wpdb->prefix.'reservaciones';
	
	$sql = "CREATE TABLE $tabla (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		nombre varchar(50) NOT NULL,
		fecha datetime NOT NULL,
		correo varchar(50) DEFAULT '' NOT NULL,
		telefono varchar(15) NOT NULL,
		telefono varchar(15) NOT NULL,
		mensaje longtext NOT NULL,
		PRIMARY KEY (id)
		) $charset_collage;";

	require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	
	dbDelta( $sql );

	add_option( 'lapizzeria_dbversion', $lapizzeria_dbversion );

*/
