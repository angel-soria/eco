<?php
add_theme_support( 'post-thumbnails' );
add_image_size( 'ideas-slider', 1315, 645 , true);
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



	wp_register_style( 'global', get_template_directory_uri().'/eco-style/stylesheets/global.css' );
	wp_enqueue_style( 'global' );
	//if(is_front_page()){
		wp_register_style( 'home', get_template_directory_uri().'/eco-style/stylesheets/home.css' );
		wp_enqueue_style( 'home' ); 
	//}
   
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
	    Recámaras: <input type="text" name="recamaras" value="<?php echo (get_post_meta( get_the_ID(), 'recamaras', true ));?>"> <br />
	    Baños: <input type="text" name="banos" value="<?php echo (get_post_meta( get_the_ID(), 'banos', true ));?>"> <br />
	    Estacionamieto: <input type="text" name="estacionamiento" value="<?php echo (get_post_meta( get_the_ID(), 'estacionamiento', true ));?>"> <br />
	    Terreno: <input type="text" name="terreno" value="<?php echo (get_post_meta( get_the_ID(), 'terreno', true ));?>"> m<sup>2</sup> <br />
    </div>
    <br>
    <h3>Ubicación</h3>
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