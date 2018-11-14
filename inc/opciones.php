<?php 

function lapizzeria_ajustes() {

add_menu_page( 'La Pizzeria', 'La Pizerria Ajustes', 'administrator', 'lapizzeria_ajustes', 'lapizzeria_opciones', '', 21);
add_submenu_page( 'lapizzeria_ajustes', 'Reservaciones', 'Reservaciones', 'administrator', 'lapizzeria_reservaciones', 'lapizzeria_reservaciones' );

//llamando al registro de nuestras opciones de nuestro thema
add_action( 'admin_init', 'lapizzeria_reg_opciones');

}

add_action( 'admin_menu', 'lapizzeria_ajustes');

function lapizzeria_reg_opciones() {
	register_setting( 'lapizzeria_opciones_group', 'lapizzeria_direccion');
	register_setting( 'lapizzeria_opciones_group', 'lapizzeria_telefono');

}


function lapizzeria_opciones() {
	?>
		<div class="wrap">
			<h1>Ajustes de Pizzeria</h1>

			<form action="options.php" method="post">
				<?php settings_fields( 'lapizzeria_opciones_group' ); ?>
				<?php do_settings_sections( 'lapizzeria_opciones_group' ); ?>

				<table class="form-table">
					<tr valign="top">
						<th scope="row">Dirección</th>
						<td><input type="text" name="lapizzeria_direccion" value="<?php echo esc_attr(get_option( 'lapizzeria_direccion')); ?>"></td>
					</tr>

					<tr valign="top">
						<th scope="row">Teléfono</th>
						<td><input type="text" name="lapizzeria_telefono" value="<?php echo esc_attr( get_option( 'lapizzeria_telefono'));  ?>"></td>
					</tr>

				</table>
				<?php submit_button( ); ?>
			</form>
		</div>
	<?php
}

function lapizzeria_reservaciones() {
?>
	<div class="wrap">
		<h1>Reservaciones</h1>

		<table class="wp-list-table widefat striped">
			<thead>
				<tr>
					<th class="manage-column">ID</th>
					<th class="manage-column">Nombre</th>
					<th class="manage-column">Fecha de Reserva</th>
					<th class="manage-column">Correo</th>
					<th class="manage-column">Teléfono</th>
					<th class="manage-column">Mensaje</th>
				</tr>
			</thead>

			<tbody>
				<?php 
					global $wpdb;
					$reservaciones = $wpdb->prefix.'reservaciones';
					$query="SELECT * FROM `$reservaciones`";
					$registros = $wpdb->get_results($query, ARRAY_A);
					
					foreach ($registros as $registro) { ?>
						<tr>
							<td><?php echo $registro['id']; ?></td>
							<td><?php echo $registro['nombre']; ?></td>
							<td><?php echo $registro['fecha']; ?></td>
							<td><?php echo $registro['correo']; ?></td>
							<td><?php echo $registro['telefono']; ?></td>
							<td><?php echo $registro['mensaje']; ?></td>
						</tr>
					<?php } ?>
			</tbody>
		</table> 
	</div>

<?php 
}
