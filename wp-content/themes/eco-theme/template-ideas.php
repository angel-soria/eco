<?php
/**
 * Template Name: Ideas
 *
 */
get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $link= get_permalink( ); ?>
		<div class="banner">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h3><?php echo get_the_content( ); ?></h3>
						<div class="breadcrumb-list"><a href="<?php echo get_home_url(); ?>">Home</a> > <h1><?php echo get_the_title(); ?></h1> </div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>
	<div class="desarrollos-ficha">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul class="menu-interior">
					<li><a href="<?php echo $link;?>" class="active">Todos</a></li>
					<?php 
						$terms = get_terms( array('taxonomy' => 'categoria-ideas','hide_empty' => false,) );
					 	foreach ( $terms as $term ) {
        					echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a></li>';
    					} 
    				?>					
				</ul>
			</div>
		</div>
		<div class="row">
		<?php 
			$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
			$args = array( 'post_type' => 'ideas',  'paged' => $paged);
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
							<?php $term_list = wp_get_post_terms($post->ID, 'categoria-ideas', array("fields" => "all"));  
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
			endwhile;
	  	?>
		</div>
		<?php if($loop->max_num_pages > 1){ ?>
		<div class="row ">
			<div class="col-xs-12">
				<div class="content-pagination">
					<?php
						$big = 999999999; // need an unlikely integer

						$pages = paginate_links( array(
						        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						        'format' => '?paged=%#%',
						        'current' => max( 1, get_query_var('paged') ),
						        'total' => $loop->max_num_pages,
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