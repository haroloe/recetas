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
					<img src="<?php echo get_template_directory_uri();  ?>/img/logo.svg">
				</a>
			</div><!--logo-->

			<div class="informacion-encabezado">
				<div class="redes-sociales">
					<?php 
					//parametrización para uso del Menú Social
					$args = array(
					'theme_locale' => 'social-menu',
					'container'	=> 'nav',
					'container_class' => 'menu-social',
					'conteiner_id' => 'menu-social',
					'link_before' => '<span class="sr-text">',
					'link_after' => '</span>'
					);
					
					wp_nav_menu( $args );
					
					?>
				</div>
			</div>

		</div><!--Contenedor-->
	</header>

	<nav class="menu-sitio">
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
	</nav>