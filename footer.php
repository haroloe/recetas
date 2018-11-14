	<footer>
		<?php 
				//parametrización para uso del Menú Social
			$args = array(
				'theme_locale' => 'header-menu',
				'container'	=> 'nav',
				'after' => '<span class="separador"> | </span>'
			);
					
			wp_nav_menu( $args );
					
		?>
		<div class="ubicacion">
			<p><?php esc_html( get_option('lapizzeria_direccion') ); ?></p>
			<p>Teléfono: <?php esc_html( get_option('lapizzeria_telefono') ); ?></p>
		</div><!--direccion -->
		<p class="copyright">Todos los derechos reservados <?php echo date('Y') ?> - Perú</p>
	</footer>


	<?php wp_footer(); ?>

	</body>
</html>