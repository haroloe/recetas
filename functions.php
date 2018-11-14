<?php
// usando un archivo que determina la tabla adicional de la base de datos que estamos trabajando en WP
require get_template_directory().'/inc/database.php';
//Funciones necesarias para grabar las reservaciones en las tablas creadas
require get_template_directory().'/inc/reservaciones.php';
//Funciones necesarias para crear opciones para que el usuario pueda hacer cambios a su Template
require get_template_directory().'/inc/opciones.php';

//esta funcion esta solo viendo que podamos ponerle una imagen a la pagina
function lapizzeria_setup() {
	//para poder adicionar imagen destacada a una pagina
	add_theme_support('post-thumbnails');
	//para poder poner una tamaño mas de las imagenes subidas según se requiera
	add_image_size( 'nosotros', 437, 291, true );
	add_image_size( 'especialidades', 768, 515, true );
	
	//Cambio de tamaño de las imagenes
	update_option('thumbnail_size_w', 253);
	update_option('thumbnail_size_h', 164);

}
add_action( 'after_setup_theme', 'lapizzeria_setup');

//funcin para colocar estilos a la web
function lapizeria_styles() {
	//registro de estilos
	wp_register_style('normalize', get_template_directory_uri().'/css/normalize.css', array(), '8.0.1');
	wp_register_style( 'font_google', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway', array(), '1.0.1');
	wp_register_style('fontawesome', get_template_directory_uri().'/css/font-awesome.min.css', array('normalize'), '4.7.0');
	wp_register_style('fluidbox', get_template_directory_uri().'/css/fluidbox.min.css', array('normalize'), '2.0.0');
	wp_register_style('style', get_template_directory_uri().'/style.css', array('fluidbox'), '1.0');
	//llamar a los estilos ya registrados
	wp_enqueue_style('normalize');
	wp_enqueue_style('font_google');
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('fluidbox');
	wp_enqueue_style('style');
}
//add_action( 'wp_enqueue_scripts', 'lapizeria_styles' );
add_action( 'wp_print_styles', 'lapizeria_styles' );

//funcion para agregar js a la web
function lapizeria_scripts() {
?>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script src="<?php echo get_template_directory_uri() ?>/js/jquery.ba-throttle-debounce.min.js"></script>
 	<script src="<?php echo get_template_directory_uri() ?>/js/jquery.fluidbox.min.js"></script>
 	<script src="<?php echo get_template_directory_uri() ?>/js/scripts.js"></script>
  	
 <?php
}
add_action( 'wp_head', 'lapizeria_scripts');
//add_action( 'wp_print_styles', 'lapizeria_styles' );


//funcion de definir los menus del tema en este caso 2, header y social
function lapizzeria_menus() {
	register_nav_menus(array(		
		'social-menu' => __('Social Menu', 'lapizzeria'),
		'header-menu' => __('Header Menu', 'lapizzeria')
	));
}

add_action( 'init', 'lapizzeria_menus');

// Codigo de CPT Custom Post Type para ingreso de patillos de la pizzeria
add_action( 'init', 'lapizzeria_especialidades' );
function lapizzeria_especialidades() {
	$labels = array(
		'name'               => _x( 'Pizzas', 'lapizzeria' ),
		'singular_name'      => _x( 'Pizzas', 'post type singular name', 'lapizzeria' ),
		'menu_name'          => _x( 'Pizzas', 'admin menu', 'lapizzeria' ),
		'name_admin_bar'     => _x( 'Pizzas', 'add new on admin bar', 'lapizzeria' ),
		'add_new'            => _x( 'Add New', 'book', 'lapizzeria' ),
		'add_new_item'       => __( 'Add New Pizza', 'lapizzeria' ),
		'new_item'           => __( 'New Pizzas', 'lapizzeria' ),
		'edit_item'          => __( 'Edit Pizzas', 'lapizzeria' ),
		'view_item'          => __( 'View Pizzas', 'lapizzeria' ),
		'all_items'          => __( 'All Pizzas', 'lapizzeria' ),
		'search_items'       => __( 'Search Pizzas', 'lapizzeria' ),
		'parent_item_colon'  => __( 'Parent Pizzas:', 'lapizzeria' ),
		'not_found'          => __( 'No Pizzases found.', 'lapizzeria' ),
		'not_found_in_trash' => __( 'No Pizzases found in Trash.', 'lapizzeria' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'lapizzeria' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'especialidades' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'          => array( 'category' ),
	);

	register_post_type( 'especialidades', $args );
}

// codigo para crear widgets en la plantilla
function lapizzeria_widgets() {
	register_sidebar( array(
		'name'			=>	'Blog_Sidebar',
		'id'			=>	'blog_sidebar',
		'before_widget'	=>	'<div class="widget">',
		'after_widget'	=>	'</div>',
		'before_title'	=>	'<h3>',
		'after_title'	=>	'</h3>'
	));
}
add_action( 'widgets_init', 'lapizzeria_widgets');