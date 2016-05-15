<?php
if(!session_id()) {
        session_start();
    }
if(strip_tags($_GET['view'])=='list'){
	$_SESSION['tipo-vista']='list';
}
if(strip_tags($_GET['view'])=='grid'){
	$_SESSION['tipo-vista']='grid';
}
if(!isset($_SESSION['tipo-vista'])){
	$_SESSION['tipo-vista']='list';
}
get_header(); ?>
	<?php $post_22 = get_post( 22 ); $link= get_permalink( $post_22->ID ); ?>
		<div class="banner" style="background-image: url('<?php if ( has_post_thumbnail($post_22->ID) ) { echo get_the_post_thumbnail_url($post_22->ID, 'large');}?>');">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h3><?php echo $post_22->post_content ; ?></h3>
						<div class="breadcrumb-list"><a href="<?php echo get_home_url(); ?>">Home</a> > <a href="<?php echo $link; ?>"><?php echo get_the_title($post_22->ID); ?></a> > <h1><?php global $wp_query; echo $wp_query->queried_object->name; ?></h1> </div>
					</div>
				</div>
			</div>
		</div>
	
<div class="desarrollos-ficha">
	<div class="container">

		<div class="row">
			<div class="col-xs-12 col-sm-10">
				<ul class="menu-interior">
					<li><a href="<?php echo $link;?>" >Todos</a></li>
					<?php 
						$terms = get_terms( array('taxonomy' => 'categoria-desarrollos','hide_empty' => false,) );
					 	foreach ( $terms as $term ) {
					 		if($wp_query->queried_object->name==$term->name){
        						echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '" class="active">' . $term->name . '</a></li>';
					 		}else{
        						echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a></li>';
					 			
					 		}
    					} 
    				?>					
				</ul>
			</div>
			<div class="hidden-xs col-sm-2">
				<div class="tipo-lista">
					<a href="<?php echo esc_url(  $link  ); ?>/?view=list"><i class="icon-burguer"></i></a>
					<a href="<?php echo esc_url(  $link  ); ?>/?view=grid"><i class="icon-square"></i></a> 					
				</div>
			</div>
		</div>
		<div class="row">

		<?php if($_SESSION['tipo-vista'] === 'list'){ ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<a href="<?php echo get_the_permalink(); ?>">
			<div class="col-xs-12">
				<div class="ficha list-type">
					<div class="row">
						<div class="col-sm-5 col-md-4 col-ms-4">
							<figure class="snip1451">
							  <?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumb-desarrollo');}?>
							  <figcaption>
							    <div><i class="ion-ios-home-outline"></i></div>
							  </figcaption>
							</figure>							
						</div>
						<div class="col-sm-7 col-md-5">
							<div class="contenido">
								<?php $term_list = wp_get_post_terms($post->ID, 'categoria-desarrollos', array("fields" => "all"));  
									foreach ( $term_list as $term ) {
				        				echo '<p>'. $term->name.'</p>' ;
				    				} 
			    				?>
								<h3><?php echo get_the_title( ); ?></h3>
								<p><?php echo get_the_excerpt( ); ?></p>
							</div>							
						</div>
						<div class="col-sm-12 col-md-3">
							<ul class="caracteristicas">
								<li>
									<span class="number"><?php echo (get_post_meta( get_the_ID(), 'recamaras', true ));?></span>
									<i class="icon-full-bed"></i>
									<span class="texto">Recámaras</span>
								</li>
								<li>
									<span class="number"><?php echo (get_post_meta( get_the_ID(), 'banos', true ));?></span>
									<i class="icon-toilet"></i>
									<span class="texto">Baños</span>
								</li>
								<li>
									<span class="number"><?php echo (get_post_meta( get_the_ID(), 'estacionamiento', true ));?></span>
									<i class="icon-car"></i>
									<span class="texto">Estacionamiento</span>
								</li>
								<li>
									<span class="number"><?php echo (get_post_meta( get_the_ID(), 'terreno', true ));?> m<sup>2</sup> </span>
									<i class="icon-rectngulo-5"></i>
									<span class="texto">Terreno</span>
								</li>
							</ul>							
						</div>
					</div>
				</div>
			</div>
			</a>
		<?php
			endwhile; endif;
	  	?>
		
		<?php } else{ ?>



		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<div class="col-sm-6 col-md-4 col-ms-6 col-xs-12 col-centered special-padding">
				<div class="ficha">
					<a href="<?php echo get_the_permalink(); ?>">
						<figure class="snip1451">
						  <?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumb-desarrollo');}?>
						  <figcaption>
						    <div><i class="ion-ios-home-outline"></i></div>
						  </figcaption>
						</figure>
						<div class="contenido">
							<?php $term_list = wp_get_post_terms($post->ID, 'categoria-desarrollos', array("fields" => "all"));  
								foreach ( $term_list as $term ) {
			        			echo '<p>'. $term->name.'</p>' ;
			    				} 
			    			?>
							<h3><?php echo get_the_title( ); ?></h3>
						</div>
						<ul class="caracteristicas">
							<li>
								<span class="number"><?php echo (get_post_meta( get_the_ID(), 'recamaras', true ));?></span>
								<i class="icon-full-bed"></i>
								<span class="texto">Recámaras</span>
							</li>
							<li>
								<span class="number"><?php echo (get_post_meta( get_the_ID(), 'banos', true ));?></span>
								<i class="icon-toilet"></i>
								<span class="texto">Baños</span>
							</li>
							<li>
								<span class="number"><?php echo (get_post_meta( get_the_ID(), 'estacionamiento', true ));?></span>
								<i class="icon-car"></i>
								<span class="texto">Estacionamiento</span>
							</li>
							<li>
								<span class="number"><?php echo (get_post_meta( get_the_ID(), 'terreno', true ));?> m<sup>2</sup> </span>
								<i class="icon-rectngulo-5"></i>
								<span class="texto">Terreno</span>
							</li>
						</ul>
					</a>
				</div>
			</div>
		<?php
			endwhile; endif;
	  	?>
		
		<?php } //else vista?>

		</div>



		<?php global $wp_query; if($wp_query->max_num_pages > 1){ ?>
		<div class="row ">
			<div class="col-xs-12">
				<div class="content-pagination">
				<?php
					$big = 999999999; // need an unlikely integer

					$pages = paginate_links( array(
					        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					        'format' => '?paged=%#%',
					        'current' => max( 1, get_query_var('paged') ),
					        'total' => $wp_query->max_num_pages,
					        'type'  => 'array',
					    ) );
					    if( is_array( $pages ) ) {
					        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
					        echo '<ul class="pagination">';
					        foreach ( $pages as $page ) {
					                echo "<li>$page</li>";
					        }
					       echo '</ul>';
					        }
				?>	
				</div>
			</div>
		</div>
		<?php } ?>

	</div>
</div>

<?php get_footer(); ?>