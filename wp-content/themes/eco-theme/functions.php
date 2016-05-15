<?php
add_theme_support( 'post-thumbnails' );
add_image_size( 'ideas-slider', 1315, 645 , true);
add_image_size( 'home-slider', 1440, 797 , true);
add_image_size( 'thumb-desarrollo', 454, 200 , true);
add_image_size( 'thumb-ideas', 578, 278 , true);
add_image_size( 'thumb-blog', 416, 584 , true);
add_image_size( 'thumb-blog-dos', 868, 223 , true);



function new_excerpt_length($length) {
  return 24;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

/**
 * Register style sheet.
 */
function register_plugin_styles() {
	wp_register_script( 'jquery-22', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js' );
	wp_enqueue_script( 'jquery-22');
	wp_register_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap' );
	wp_register_script( 'bs-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js' );
	wp_enqueue_script( 'bs-js'); 
	wp_register_style( 'fuentes', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css' );
	wp_enqueue_style( 'fuentes' );	

 global $post_type;
    if( $post_type == 'ideas' || is_single( )){
      wp_register_style( 'fancy','https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css' );
      wp_enqueue_style( 'fancy' ); 
      wp_register_script( 'fancy-js', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.js' );
      wp_enqueue_script( 'fancy-js');
      wp_register_script( 'single-js', get_template_directory_uri().'/assets/js/single.js' );
      wp_enqueue_script( 'single-js');
    }
   
    wp_register_script( 'modernizr-js', get_template_directory_uri().'/assets/js/modernizr.custom.js' );
    wp_enqueue_script( 'modernizr-js');

    wp_register_script( 'classie-js', get_template_directory_uri().'/assets/js/classie.js','','', true );
    wp_enqueue_script( 'classie-js');

    wp_register_script( 'general-js', get_template_directory_uri().'/assets/js/general.js', '','', true );
    wp_enqueue_script( 'general-js');



	wp_register_style( 'global', get_template_directory_uri().'/eco-style/stylesheets/global.css' );
	wp_enqueue_style( 'global' );
	//if(is_front_page()){
		wp_register_style( 'home', get_template_directory_uri().'/eco-style/stylesheets/home.css' );
		wp_enqueue_style( 'home' ); 
	//}

 if( $post_type == 'desarrollos'){
      wp_register_script( 'mapa-desarrollos-js', get_template_directory_uri().'/assets/js/desarrollos.js','','', true );
      wp_enqueue_script( 'mapa-desarrollos-js');
      wp_register_style( 'desarrollos-css', get_template_directory_uri().'/eco-style/stylesheets/desarrollos.css' );
      wp_enqueue_style( 'desarrollos-css' ); 
      wp_register_script( 'mapa-js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCziOtxzjmnNtgvDp7JHzh_bsRwzOooV7U&callback=initialize','','', true );
      wp_enqueue_script( 'mapa-js');
    }   
}

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

add_action( 'init', 'create_posttype' );
function create_posttype() {
  register_post_type( 'desarrollos',
    array(
      'labels' => array(
        'name' => __( 'Desarrollos' ),
        'singular_name' => __( 'Desarrollo' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'desarrollos/%categoria-desarrollos%', 'with_front' => false),
      'menu_icon'=>'dashicons-building',
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt',  )
    )
  );
  register_post_type( 'ideas',
    array(
      'labels' => array(
        'name' => __( 'Ideas' ),
        'singular_name' => __( 'Idea' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'ideas/%categoria-ideas%', 'with_front' => false),
      'menu_icon' =>'dashicons-lightbulb',
      'supports' => array( 'title', 'editor', 'thumbnail', )
    )
  );
  register_post_type( 'slider',
    array(
      'labels' => array(
        'name' => __( 'Carrusel' ),
        'singular_name' => __( 'Carrusel' )
      ),
      'public' => true,
      'has_archive' => false,
       'supports' => array( 'title', 'thumbnail')
    )
  );
  register_post_type( 'paquetes',
    array(
      'labels' => array(
        'name' => __( 'Paquetes' ),
        'singular_name' => __( 'Paquete' )
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array( 'title')
    )
  );
}

add_action( 'init', 'create_book_tax' );

function create_book_tax() {
	register_taxonomy(
		'categoria-desarrollos',
		'desarrollos',
		array(
			'label' => __( 'Categoria' ),
			'rewrite' => array( 'slug' => 'desarrollos' ),
			'hierarchical' => true,
		)
	);
  register_taxonomy(
    'categoria-ideas',
    'ideas',
    array(
      'label' => __( 'Categoria' ),
      'rewrite' => array( 'slug' => 'ideas' ),
      'hierarchical' => true,
    )
  );
}


function wpse_add_custom_meta_box_2() {
   add_meta_box(
       'meta-desarrollos',       // $id
       'Caracteristicas',                  // $title
       'metabox_desarrollos',  // $callback
       'desarrollos',                 // $page
       'normal',                  // $context
       'high'                     // $priority
   );
}
add_action('add_meta_boxes', 'wpse_add_custom_meta_box_2');

function metabox_desarrollos() {
    global $post;

    // Use nonce for verification to secure data sending
    wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce' );
    ?>

    <!-- my custom value input -->
    <div>
      ID Casa: <input type="text" name="id_casa" value="<?php echo (get_post_meta( get_the_ID(), 'id_casa', true ));?>"> <br /> 
	    Recámaras: <input type="text" name="recamaras" value="<?php echo (get_post_meta( get_the_ID(), 'recamaras', true ));?>"> <br /> 
	    Baños: <input type="text" name="banos" value="<?php echo (get_post_meta( get_the_ID(), 'banos', true ));?>"> <br />
	    Estacionamieto: <input type="text" name="estacionamiento" value="<?php echo (get_post_meta( get_the_ID(), 'estacionamiento', true ));?>"> <br />
	    Terreno: <input type="text" name="terreno" value="<?php echo (get_post_meta( get_the_ID(), 'terreno', true ));?>"> m<sup>2</sup> <br />
    </div>
    <br>
    <h3>Ubicación</h3>
    <input type="text" name="ubicacion" value="<?php echo (get_post_meta( get_the_ID(), 'ubicacion', true ));?>" style="width: 100%;"><br /><br />
    <div id="map_canvas" style="width:100%; height:400px"></div>

  <div id="latlong">
   	<input size="20" type="hidden" id="latbox" name="lat"  value="<?php echo (get_post_meta( get_the_ID(), 'lat', true ));?>">
    <input size="20" type="hidden" id="lngbox" name="lng" value="<?php echo (get_post_meta( get_the_ID(), 'lng', true ));?>">
  </div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCziOtxzjmnNtgvDp7JHzh_bsRwzOooV7U&callback=initialize"
        async defer></script>
<script type="text/javascript">
  var map;
  function initialize() {
  var myLatlng = new google.maps.LatLng(19.702839,-101.1942387);
  var myLatlngPin = new google.maps.LatLng(19.702839,-101.1942387);
  <?php if(get_post_meta( get_the_ID(), 'lat', true )) {?>
  	myLatlngPin = new google.maps.LatLng(<?php echo get_post_meta( get_the_ID(), 'lat', true );?>,<?php echo get_post_meta( get_the_ID(), 'lng', true );?>);
    myLatlng = new google.maps.LatLng(<?php echo get_post_meta( get_the_ID(), 'lat', true );?>,<?php echo get_post_meta( get_the_ID(), 'lng', true );?>);

  <?php } ?>

  var myOptions = {
     zoom: 15,
     center: myLatlng,
     mapTypeId: google.maps.MapTypeId.ROADMAP
     }
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 

  var marker = new google.maps.Marker({
	  draggable: true,
	  position: myLatlngPin, 
	  map: map,
	  title: "Ubicación"
	  }
	  );

google.maps.event.addListener(marker, 'dragend', function (event) {
    document.getElementById("latbox").value = this.getPosition().lat();
    document.getElementById("lngbox").value = this.getPosition().lng();
});

google.maps.event.addListener(marker, 'click', function (event) {
    document.getElementById("latbox").value = this.getPosition().lat();
    document.getElementById("lngbox").value = this.getPosition().lng();
});
}
</script> 

    <?php
}


function wpse_save_meta_fields( $post_id ) {

  // verify nonce
  if (!isset($_POST['wpse_our_nonce']) || !wp_verify_nonce($_POST['wpse_our_nonce'], basename(__FILE__)))
      return 'nonce not verified';

  // check autosave
  if ( wp_is_post_autosave( $post_id ) )
      return 'autosave';

  //check post revision
  if ( wp_is_post_revision( $post_id ) )
      return 'revision';

  // check permissions
  if ( 'project' == $_POST['post_type'] ) {
      if ( ! current_user_can( 'edit_page', $post_id ) )
          return 'cannot edit page';
      } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
          return 'cannot edit post';
  }

  //so our basic checking is done, now we can grab what we've passed from our newly created form
  if($_POST['banos'])
   	update_post_meta($post_id, 'banos', $_POST['banos']);
   if($_POST['recamaras'])
   	update_post_meta($post_id, 'recamaras', $_POST['recamaras']);
   if($_POST['estacionamiento'])
   	update_post_meta($post_id, 'estacionamiento', $_POST['estacionamiento']);
   if($_POST['terreno'])
   	update_post_meta($post_id, 'terreno', $_POST['terreno']);
   if($_POST['lat'])
   	update_post_meta($post_id, 'lat', $_POST['lat']);
   if($_POST['lng'])
   	update_post_meta($post_id, 'lng', $_POST['lng']);
   if($_POST['id_casa'])
    update_post_meta($post_id, 'id_casa', $_POST['id_casa']);
  if($_POST['ubicacion'])
    update_post_meta($post_id, 'ubicacion', $_POST['ubicacion']);
  if($_POST['link_carrusel'])
    update_post_meta($post_id, 'link_carrusel', $_POST['link_carrusel']);
  if($_POST['text_carrusel'])
    update_post_meta($post_id, 'text_carrusel', $_POST['text_carrusel']);
  if($_POST['asesoria'])
    update_post_meta($post_id, 'asesoria', $_POST['asesoria']);
  if($_POST['construccion'])
    update_post_meta($post_id, 'construccion', $_POST['construccion']);
  if($_POST['ventas'])
    update_post_meta($post_id, 'ventas', $_POST['ventas']);
   if($_POST['title_asesoria'])
    update_post_meta($post_id, 'title_asesoria', $_POST['title_asesoria']);
  if($_POST['title_construccion'])
    update_post_meta($post_id, 'title_construccion', $_POST['title_construccion']);
  if($_POST['title_ventas'])
    update_post_meta($post_id, 'title_ventas', $_POST['title_ventas']);
  if($_POST['paquete_opciones'])
    update_post_meta($post_id, 'paquete_opciones', $_POST['paquete_opciones']);
  if($_POST['title_desarrollos'])
    update_post_meta($post_id, 'title_desarrollos', $_POST['title_desarrollos']);
  if($_POST['title_paquetes'])
    update_post_meta($post_id, 'title_paquetes', $_POST['title_paquetes']);
  if($_POST['title_socios'])
    update_post_meta($post_id, 'title_socios', $_POST['title_socios']);
   if($_POST['Contacto_footer'])
    update_post_meta($post_id, 'Contacto_footer', $_POST['Contacto_footer']);
   if($_POST['r_face'])
    update_post_meta($post_id, 'r_face', $_POST['r_face']);
   if($_POST['r_twt'])
    update_post_meta($post_id, 'r_twt', $_POST['r_twt']);
   if($_POST['r_you'])
    update_post_meta($post_id, 'r_you', $_POST['r_you']);
  if($_POST['r_ins'])
    update_post_meta($post_id, 'r_ins', $_POST['r_ins']);
  

}
add_action( 'save_post', 'wpse_save_meta_fields' );




/*Filtro per modificare il permalink*/
add_filter('post_link', 'brand_permalink', 1, 3);
add_filter('post_type_link', 'brand_permalink', 1, 3);

function brand_permalink($permalink, $post_id, $leavename) {
	//con %brand% catturo il rewrite del Custom Post Type
    if (strpos($permalink, '%categoria-desarrollos%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'categoria-desarrollos');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
        	$taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'no-brand';

    return str_replace('%categoria-desarrollos%', $taxonomy_slug, $permalink);
}


/*Filtro per modificare il permalink*/
add_filter('post_link', 'ideas_permalink', 1, 3);
add_filter('post_type_link', 'ideas_permalink', 1, 3);

function ideas_permalink($permalink, $post_id, $leavename) {
  //con %brand% catturo il rewrite del Custom Post Type
    if (strpos($permalink, '%categoria-ideas%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'categoria-ideas');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
          $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'ideas';

    return str_replace('%categoria-ideas%', $taxonomy_slug, $permalink);
}


function wpse_add_custom_meta_box_slider() {
   add_meta_box(
       'meta-carrusel',       // $id
       'Link',                  // $title
       'metabox_carrusel',  // $callback
       'slider',                 // $page
       'normal',                  // $context
       'high'                     // $priority
   );
}
add_action('add_meta_boxes', 'wpse_add_custom_meta_box_slider');

function metabox_carrusel() {
    global $post;

    // Use nonce for verification to secure data sending
    wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce' );
    ?>

    <!-- my custom value input -->
    <div>
      Texto: <input type="text" name="text_carrusel" value="<?php echo (get_post_meta( get_the_ID(), 'text_carrusel', true ));?>">
      Link: <input type="text" name="link_carrusel" value="<?php echo (get_post_meta( get_the_ID(), 'link_carrusel', true ));?>"> <br />
      </div>
    <br>
    
    <?php
}

add_action('admin_init','my_meta_init');
function my_meta_init()
{
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
  // check for a template type
  if ($template_file == 'template-home.php')
  {
  add_meta_box('home_metas', 'Datos extra', 'meta_home', 'page', 'normal', 'high');
  }
  add_meta_box(
       'meta-paquetes',       // $id
       'Opciones',                  // $title
       'metabox_paquetes',  // $callback
       'paquetes',                 // $page
       'normal',                  // $context
       'high'                     // $priority
   );

}

function meta_home() {
    global $post;

    // Use nonce for verification to secure data sending
    wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce' );
    ?>

    <!-- my custom value input -->
    <div>
    <h4>Servicios</h4>
     <input type="text" name="title_asesoria" value="<?php echo (get_post_meta( get_the_ID(), 'title_asesoria', true ));?>"> <br /><br />
      <textarea name="asesoria" style="width: 100%; resize: none;"><?php echo (get_post_meta( get_the_ID(), 'asesoria', true ));?></textarea> 
      
      <br /><br />
      <input type="text" name="title_construccion" value="<?php echo (get_post_meta( get_the_ID(), 'title_construccion', true ));?>"> <br /><br />
      <textarea name="construccion" style="width: 100%; resize: none;"><?php echo (get_post_meta( get_the_ID(), 'construccion', true ));?></textarea> <br /><br />
      <input type="text" name="title_ventas" value="<?php echo (get_post_meta( get_the_ID(), 'title_ventas', true ));?>"> <br /><br />
      <textarea name="ventas" style="width: 100%; resize: none;"><?php echo (get_post_meta( get_the_ID(), 'ventas', true ));?></textarea> <br /><br />
      </div>
    <br>
    <h4>Titulos</h4>
    <input type="text" name="title_desarrollos" style="width:100%;" value="<?php echo (get_post_meta( get_the_ID(), 'title_desarrollos', true ));?>"> <br /><br />
    <input type="text" name="title_paquetes" style="width:100%;" value="<?php echo (get_post_meta( get_the_ID(), 'title_paquetes', true ));?>"> <br /><br />
    <input type="text" name="title_socios" style="width:100%;" value="<?php echo (get_post_meta( get_the_ID(), 'title_socios', true ));?>"> <br /><br />
     <h4>Contacto</h4>
     <textarea name="Contacto_footer" rows="5" style="width: 100%; resize: none;"><?php echo (get_post_meta( get_the_ID(), 'Contacto_footer', true ));?></textarea> <br /><br />
     <h4>Redes sociales</h4>
     Facebook: <input type="text" name="r_face" value="<?php echo (get_post_meta( get_the_ID(), 'r_face', true ));?>"> <br /><br />
     Twitter: <input type="text" name="r_twt" value="<?php echo (get_post_meta( get_the_ID(), 'r_twt', true ));?>"> <br /><br />
     Youtube: <input type="text" name="r_you" value="<?php echo (get_post_meta( get_the_ID(), 'r_you', true ));?>"> <br /><br />
     Instragram: <input type="text" name="r_ins" value="<?php echo (get_post_meta( get_the_ID(), 'r_ins', true ));?>"> <br /><br />
      
    
    <?php
}
function metabox_paquetes() {
    global $post;

    // Use nonce for verification to secure data sending
    wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce' );
    ?>

    <!-- my custom value input -->
    <div>
     Opciones: <br /><br />
      <textarea name="paquete_opciones" style="width: 100%; resize: none;" rows="15"><?php echo (get_post_meta( get_the_ID(), 'paquete_opciones', true ));?></textarea> <br /><br />
      </div>
    <br>
    
    <?php
}

add_filter( 'rewrite_rules_array','my_insert_rewrite_rules' );
add_action( 'wp_loaded','my_flush_rules' );    
function my_flush_rules(){
    $rules = get_option( 'rewrite_rules' );
            global $wp_rewrite;
    $wp_rewrite->flush_rules();
} 

// Adding a new rule    
function my_insert_rewrite_rules( $rules )    
{
    $newrules = array();
    //$newrules['desarrollos/?$'] = 'index.php?post_type=desarrollos';
    $newrules['desarrollos/page/?([0-9]{1,})/?$'] = 'index.php?page_id=22&paged=$matches[1]';
    $newrules['desarrollos/(.+?)/page/?([0-9]{1,})/?$'] = 'index.php?categoria-desarrollos=$matches[1]&paged=$matches[2]';
    $newrules['ideas/page/?([0-9]{1,})/?$'] = 'index.php?page_id=37&paged=$matches[1]';
    $newrules['ideas/(.+?)/page/?([0-9]{1,})/?$'] = 'index.php?categoria-ideas=$matches[1]&paged=$matches[2]';
    //print_r($rules);
    return $newrules + $rules;
}
