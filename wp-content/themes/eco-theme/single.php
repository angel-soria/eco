<?php get_header();  ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="container desarrollos-ficha">
	<div class="row">
		<div class="col-xs-12">
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
					<div class="contenido">
						<?php $term_list = wp_get_post_categories ($post->ID); ?>
						<p><?php foreach ( $term_list as $term ) {
								 $cat = get_category( $term );
	        					echo '<a href="' . esc_url( get_category_link( $term ) ) . '">' . $cat->name . '</a> ';
	    					}  ?></p>
						<h1><?php the_title();?></h1>
					</div>
					<div class="compartir">
						<div class="fb-share-button" data-href="<?php echo get_the_permalink(); ?>" data-layout="button" data-mobile-iframe="true"></div>
						<a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo get_the_title(  ); ?>" data-via="AngelSoriaH" data-lang="es" data-hashtags="IdeasEcoVive" data-dnt="true">Twittear</a>
					</div>
			</div>
			<div class="contenido-single">
				<?php the_content();?>
				
			</div>
			<div class="compartir-single">
						<div class="fb-share-button" data-href="<?php echo get_the_permalink(); ?>" data-layout="button" data-mobile-iframe="true"></div>
						<a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo get_the_title(  ); ?>" data-via="AngelSoriaH" data-lang="es" data-hashtags="IdeasEcoVive" data-dnt="true">Twittear</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</div>
		</div>
	</div>
</div>
<?php endwhile; endif; ?>
	<div class="desarrollos-ficha relacionados">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2>Te puede interesar</h2>
			</div>
		</div>
		<div class="row">
		<?php 
			$args = array(  'posts_per_page' => 2 , 'post__not_in'=> array(get_the_ID()) ,'orderby'=>'rand');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
		?>
			 

			<div class="col-sm-6 col-md-6 col-ms-6 col-xs-12 col-centered special-padding">
				<div class="ficha">
					<a href="<?php echo get_the_permalink(); ?>">
						<figure class="snip1451">
						   <?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumb-ideas');}?>
						  <figcaption>
						    <div><i class="ion-lightbulb"></i></div>
						  </figcaption>
						</figure>
						<div class="contenido">
							<?php 
								$categories=get_the_category(get_the_ID());
								if ( ! empty( $categories ) ) {
								    foreach( $categories as $category ) {
								        $output .= esc_html( $category->name ) . $separator;
								    }
								}
			        			echo '<p>'. $output.'</p>' ;
			    				 
			    			?>
							<h3><?php echo get_the_title( ); ?></h3>
						</div>
					</a>
				</div>
			</div>
		<?php
			endwhile;
	  	?>
		
		</div>
	</div>
</div>
<?php get_footer(); ?>