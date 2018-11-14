<?php 

function lapizzeria_guardar() {
	global $wpdb;
	
	if(isset($_POST['Enviar']) && $_POST['oculto'] == "1") {
		//limpiando los datos ingresados por el usuario a fin de no tener problemas
		$nombre = sanitize_text_field($_POST[nombre]);
		$fecha = sanitize_text_field($_POST[fecha]);
		$correo = sanitize_text_field($_POST[correo]);
		$telefono = sanitize_text_field($_POST[telefono]);
		$mensaje = sanitize_text_field($_POST[mensaje]);
		//Especificando la tabña de trabajo
		$tabla=$wpdb->prefix.'reservaciones';	
		//arreglo para la base de datos
		$datos=array(
		'nombre' => $nombre,
		'fecha' => $fecha,
		'correo' => $correo,
		'telefono' => $telefono,
		'mensaje' => $mensaje
		);
		//arreglo para los formatos de los campor en la base de datos
		$formato = array('%s','%s','%s','%s','%s');

		//insertar datos en las tablas
		$wpdb->insert($tabla, $datos, $formato);

		$url = get_page_by_title( 'Gracias por su Reserva');
		wp_redirect( get_permalink($url->ID) );
		exit();
	}
		
}

add_action ('init', 'lapizzeria_guardar');