<?php get_header(); ?>  
	
		<div class="banner">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h3><?php $contenido=get_post(37); echo $contenido->post_content; ?></h3>
						<div class="breadcrumb-list"><a href="<?php echo get_home_url(); ?>">Home</a> > <a href="<?php echo get_permalink(37); ?>"><?php echo get_the_title(37); ?></a> > <h1><?php global $wp_query; echo $wp_query->queried_object->name; ?></h1>  </div>
					</div>
				</div>
			</div>
		</div>
	<div class="desarrollos-ficha">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul class="menu-interior">
					<li><a href="<?php echo get_permalink(37);?>" >Todos</a></li>
					<?php 
						$terms = get_terms( array('taxonomy' => 'categoria-ideas','hide_empty' => false,) );
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
		</div>
		<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
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
							<?php $term_list = wp_get_post_terms($post->ID, 'categoria-desarrollos', array("fields" => "all"));  
									foreach ( $term_list as $term ) {
				        				echo '<p>'. $term->name.'</p>' ;
				    				} 
			    				?>
								<h3><?php echo get_the_title( ); ?></h3>
						</div>
					</a>
				</div>
			</div>
		<?php
			endwhile; endif;
	  	?>
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