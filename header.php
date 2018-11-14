<!DOCTYPE html>
<html>
<head>
  <title></title>
    <?php wp_head(); ?>
</head>

<body>
	<header class="encabezado-sitio">
		<div class="contenedor">
			<div class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo get_template_directory_uri();  ?>/img/logo.svg" class="logotipo">
				</a>
			</div><!--logo-->

			<div class="informacion-encabezado">
				<div class="redes-sociales">
					<?php 
					//parametrización para uso del Menú Social
					$args = array(
					'theme_locale' => 'social-menu',
					'container'	=> 'nav',
					'container_class' => 'sociales',
					'container_id' => 'sociales',
					'link_before' => '<span class="sr-text">',
					'link_after' => '</span>'
					);
					
					wp_nav_menu( $args );
					
					?>
				</div><!--redes sociales -->
			
				<div class="direccion">
					<p><?php esc_html( get_option('lapizzeria_direccion') ); ?></p>
					<p>Teléfono: <?php esc_html( get_option('lapizzeria_telefono') ); ?></p>
				</div><!--direccion -->
			</div><!--Informacion del encabezado -->

		</div><!--Contenedor-->
	</header>

	<div class="menu-principal">
		<div class="mobile-menu">
			<a href="#" class="mobile"><i class="fa fa-bars" aria-hidder='true'></i> Menu </a>
		</div>
		
		<div class="contenedor navegacion">
			<?php 
			//parametrización para uso de Menú del sitio
				$args = array(
					'theme_locale' => 'header-menu',
					'container'	=> 'nav',
					'container_class' => 'menu-sitio'
				);
				wp_nav_menu( $args );
			?>
		</div>

	</div>

	
	
