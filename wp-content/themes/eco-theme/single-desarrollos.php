<?php get_header();  ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="bg-ficha">
<div class="container desarrollos-ficha">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
				<div class="ficha">
					<div class="carrusel">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
							<div class="carousel-inner">
							    <div class="item active">
							    	<a class="fancybox" data-fancybox-group="group01" title="" data-fancybox-type="image" href="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url('full');}?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('ideas-slider');}?></a>
							    </div>
							    <?php 
							    	$value = get_post_meta( $post->ID, 'mgop_media_value', true );
							    	
							    	if(is_array($value) && count($value)){ 
										foreach($value['mgop_mb_galeria'] as $attc_id){

											$url = wp_get_attachment_image_src( $attc_id, 'full' );
											$url2 = wp_get_attachment_image_src( $attc_id, 'ideas-slider' );


							    ?>
								    <div class="item">
								    	<a class="fancybox" data-fancybox-group="group01" title="" data-fancybox-type="image" href="<?php echo $url[0];?>"><img src="<?php echo $url2[0];?>" alt=""></a>
								    </div>
							    <?php }
								} 
									$v_id = get_post_meta($post->ID, 'fv_video_id', true);
									if($v_id){
								?>	
								<div class="item">
									<a class="fancybox" data-fancybox-group="group01" title="" data-fancybox-type="iframe" href="https://www.youtube.com/embed/<?php echo $v_id; ?>?autoplay=1"><img src="http://img.youtube.com/vi/<?php echo $v_id; ?>/hqdefault.jpg" alt="..." width="1315" height="645" style="max-height: 645px; max-width: 1315px;"></a>
							    </div>

							    <?php } ?>
							  </div>
						  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						    	<i class="icon-left" aria-hidden="true"></i>
						    	<span class="sr-only">Previous</span>
						  	</a>
						  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						    	<i class="icon-right" aria-hidden="true"></i>
						    	<span class="sr-only">Next</span>
					  		</a>
					  </div>
					</div>
					<div class="row">
						<div class="col-xs-8">
							<div class="contenido">
								<h1><?php the_title();?></h1>
								<?php $term_list = wp_get_post_terms($post->ID, 'categoria-desarrollos', array("fields" => "all"));  ?>
								<p class="breadcrum-ficha">
									<a href="<?php echo get_home_url( ); ?>">Inicio</a> >
									<a href="<?php echo get_home_url( ); ?>/desarrollos/">Desarrollos</a> >
								<?php foreach ( $term_list as $term ) {
			        					echo '<a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a> >';
			    					}  ?>
			    					ID 4834 

			    				</p>
								
							</div>							
						</div>
						<div class="col-xs-4">
							<div class="compartir">
								<div class="fb-share-button" data-href="<?php echo get_the_permalink(); ?>" data-layout="button" data-mobile-iframe="true"></div>
								<a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo get_the_title(  ); ?>" data-via="AngelSoriaH" data-lang="es" data-hashtags="IdeasEcoVive" data-dnt="true">Twittear</a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
							</div>							
						</div>
					</div>
			</div>

<div class="row">
	
	<div class="col-xs-12">
		<div class="ficha list-type">
			<div class="row">
				<div class="col-sm-7 col-md-8">
					<div class="contenido">
						<h3>Descripción</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia impedit alias, quam iure at excepturi velit, veritatis soluta. Cum, sequi atque vitae soluta vero saepe illum at ut quisquam minima.</p>
					</div>							
				</div>
				<div class="col-sm-5 col-md-4">
					<ul class="caracteristicas">
						<li>
							<i class="icon-full-bed"></i>
							<span class="number">5</span>									
							<span class="texto">Recámaras</span>
						</li>
						<li>
							<i class="icon-toilet"></i>
							<span class="number">2</span>
							
							<span class="texto">Baños</span>
						</li>
						<li>
							<i class="icon-car"></i>
							<span class="number">3</span>
							
							<span class="texto">Estacionamiento</span>
						</li>
						<li>
							<i class="icon-rectngulo-5"></i>
							<span class="number">500 m<sup>2</sup> </span>
							
							<span class="texto">Terreno</span>
						</li>
					</ul>							
				</div>
			</div>
		</div>
	</div>
</div>



<div class="row">
	
	<div class="col-xs-12">
		<div class="ficha list-type">
			<div class="row">
				<div class="col-sm-12 ">
					<div class="contenido">
						<h3>Ubicación</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia impedit alias, quam iure at excepturi velit, veritatis soluta. Cum, sequi atque vitae soluta vero saepe illum at ut quisquam minima.</p>
						<div id="map_canvas" style="width:100%; height:320px"></div>
					</div>							
				</div>
			</div>
		</div>
	</div>
</div>














		</div>
		<div class="col-sm-4 col-xs-12">
			<div class="form">
				<h3>Te interesa esta propiedad</h3>
						<form action="" method="post">
								<label for="Nambe">¿Cuál es su nombre?</label> <input type="text" name="nombre" />
								<label for="Nambe">¿Cuál es su correo?</label> <input type="text" name="corre" />
								<label for="Nambe">¿Cuál es su teléfono?</label> <input type="text" name="telefono" />
								<label for="Nambe">¿Cuál es su mensaje?</label> <textarea name="Comentario" id="" cols="30" rows="7"></textarea>
								<button type="submit" >Enviar mensaje</button>
							</form>
			</div>
		</div>
	</div>
</div>
</div>


<div class="desarrollos-ficha">


</div>



<?php endwhile; endif; ?>
	<div class="desarrollos-ficha relacionados">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2>Te puede interesar</h2>
			</div>
		</div>
		<div class="row row-centered">
		<?php for ($i=0; $i < 3; $i++) { ?>
			
			<div class="col-sm-6 col-md-4 col-ms-6 col-xs-12 col-centered special-padding">
				<div class="ficha">
					<a href="#">
						<figure class="snip1451">
						  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/casa.jpg" alt="" class="img-responsive" />
						  <figcaption>
						    <div><i class="ion-ios-home-outline"></i></div>
						  </figcaption>
						</figure>
						<div class="contenido">
							<p>Terreno</p>
							<h3>Casa en Lomas del Punhuato, Morelia</h3>
						</div>
						<ul class="caracteristicas">
							<li>
								<span class="number">5</span>
								<i class="icon-full-bed"></i>
								<span class="texto">Recámaras</span>
							</li>
							<li>
								<span class="number">2</span>
								<i class="icon-toilet"></i>
								<span class="texto">Baños</span>
							</li>
							<li>
								<span class="number">3</span>
								<i class="icon-car"></i>
								<span class="texto">Estacionamiento</span>
							</li>
							<li>
								<span class="number">500 m<sup>2</sup> </span>
								<i class="icon-rectngulo-5"></i>
								<span class="texto">Terreno</span>
							</li>
						</ul>
					</a>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
<script>
	var lat = <?php echo get_post_meta( get_the_ID(), 'lat', true );?>;
	var lng = <?php echo get_post_meta( get_the_ID(), 'lng', true );?> 
</script>
<?php get_footer(); ?>