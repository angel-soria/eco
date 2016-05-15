<?php
/**
 * Template Name: Home
 *
 */
get_header(); ?>
<div class="carrusel">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	<?php 
		$args = array( 'post_type' => 'slider', 'posts_per_page' => 5 );
		$loop = new WP_Query( $args );
		
		
	?>

	  <ol class="carousel-indicators">
	  	<?php for ($i=0; $i < $loop->post_count ; $i++) { 
	  		if($i==0){
	  			echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="active"></li>';	  			
	  		}else{
	  			echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';	
	  		}
	  	} ?>
	  </ol>
	 
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	  	<?php 
	  		$count=0;
	  		while ( $loop->have_posts() ) : $loop->the_post();
	  	?>	
			<div class="item <?php if($count==0) echo 'active'; ?>">
		      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider.jpg" alt="...">
		      <div class="carousel-caption">
		      	<h3><?php echo get_the_title( ); ?></h3>
		      	<a href="<?php echo urldecode(get_post_meta( get_the_ID(), 'link_carrusel', true ));?>" class="general"><?php echo (get_post_meta( get_the_ID(), 'text_carrusel', true ));?></a>	
		      </div>
		    </div>  
		<?php
			endwhile;
	  	?>
	  </div>
	</div> <!-- Carousel -->
</div>
<?php include('servicios.php'); ?>


<div class="desarrollos-ficha">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2><?php echo (get_post_meta( get_the_ID(), 'title_desarrollos', true ));?></h2>
			</div>
		</div>
		<div class="row">
		<?php 
			$args = array( 'post_type' => 'desarrollos', 'posts_per_page' => 6);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
		?>
			
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
			endwhile;
	  	?>
		</div>
		<div class="row row-centered">
			<div class="col-xs-12 col-ms-8 col-sm-6 col-lg-4 col-centered">
				<div class="more">
					<a href="<?php echo get_home_url( ); ?>" class="general">Ver más desarrollos</a>					
				</div>
			</div>
		</div>
	</div>
</div>

<div class="paquetes">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h3><?php echo (get_post_meta( get_the_ID(), 'title_paquetes', true ));?></h3>
			</div>
		</div>
		<div class="row row-centered">
			<?php 
				$args = array( 'post_type' => 'paquetes', 'posts_per_page' => -1);
				$loop = new WP_Query( $args );			
				while ( $loop->have_posts() ) : $loop->the_post();
	  		?>

			<div class="col-lg-3 col-sm-4 col-ms-12 col-xs-11 col-centered">
				<div class="paquete">
					<div class="head">
						<?php the_title( ); ?>
					</div>
					<ul>
						<?php 
							$content = get_post_meta( get_the_ID(), 'paquete_opciones', true );
							$lines = explode("\n", $content);
							foreach( $lines as $index => $line )
								echo '<li>'.$line.'</li>';
						?>
					</ul>
					<a href="<?php echo get_home_url( ); ?>/contacto/" class="general">Click para más informes</a>
				</div>
			</div>
			<?php
				endwhile;
	  		?>
		</div>		
	</div>
</div>
<?php get_footer(); ?>