<?php get_header(); ?>

<?php while(have_posts()):the_post(); ?>

	<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?> );">
		<div class="contenido hero">
			<div class="texto-hero">
				<?php the_title('<h1>', '</h1>'); ?>
			</div>
		</div>
	</div>
	<div class="principal contenedor contacto">
		<main class="texto-centrado contenido-paginas">
			<h2>Realiza una Reservación</h2>

			<form method="post" class="reserva-contacto">
				<div class="campo">
					<input type="text" name="nombre" placeholder="Nombre" required>
				</div>
				<div class="campo">
					<input type="datetime-local" name="fecha" placeholder="Fecha" required>
				</div>
				<div class="campo">
					<input type="email" name="correo" placeholder="Correo" required>
				</div>
				<div class="campo">
					<input type="tel" name="telefono" placeholder="Telefono" required>
				</div>
				<div class="campo">
					<textarea name="mensaje" placeholder="Escribir Mensaje" required></textarea>
				</div>
				<input type="submit" name="Enviar" class="button">
				<input type="hidden" name="oculto" value="1">
			</form>
		</main>
	</div>
<?php endwhile; ?>

<?php get_footer(); ?>