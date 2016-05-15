<?php get_header(); ?>

<?php
$count=0;
 if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$entradas[$count]['id']= get_the_ID();
	$entradas[$count]['title']= get_the_title();
	$entradas[$count]['link']= get_permalink();
	$separator = ' ';
	$output = '';
	$categories=get_the_category(get_the_ID());
	if ( ! empty( $categories ) ) {
	    foreach( $categories as $category ) {
	        $output .= esc_html( $category->name ) . $separator;
	    }
	}
	$entradas[$count]['categories']= $output;
	$count++;

 endwhile; endif; $entradas; ?>
<div class="desarrollos-ficha">
	<div class="container">
		<div class="row">
			<?php if(isset($entradas[0])){ ?>
				<div class="col-sm-4 col-md-4 col-ms-5 col-xs-12 col-centered special-padding">
					<div class="ficha">
						<a href="<?php echo $entradas[0]['link']; ?>">
							<figure class="snip1451">
								<?php echo get_the_post_thumbnail( intval($entradas[0]['id']), 'thumb-blog', array( 'class' => 'img-responsive' ) ); ?>  
							  <figcaption>
							    <div><i class="ion-ios-paper-outline"></i></div>
							  </figcaption>
							</figure>
							<div class="contenido">
								<p><?php echo $entradas[0]['categories']; ?></p>
								<h3><?php echo $entradas[0]['title']; ?></h3>
							</div>
						</a>
					</div>
				</div>
			<?php } ?>
			<div class="col-sm-8 col-md-8 col-ms-7 col-xs-12 col-centered special-padding">
				<div class="row">
					<?php if(isset($entradas[1])){ ?>
						<div class="col-xs-12">
							<div class="ficha">
								<a href="<?php echo $entradas[1]['link']; ?>">
									<figure class="snip1451">
									  <?php echo get_the_post_thumbnail( $entradas[1]['id'], 'thumb-blog-dos', array( 'class' => 'img-responsive' ) );?>
									  <figcaption>
									    <div><i class="ion-ios-paper-outline"></i></div>
									  </figcaption>
									</figure>
									<div class="contenido">
										<p><?php echo $entradas[1]['categories']; ?></p>
										<h3><?php echo $entradas[1]['title']; ?></h3>
									</div>
								</a>
							</div>						
						</div>
					<?php } ?>
					<?php if(isset($entradas[2])){ ?>
						<div class="col-xs-12">
							<div class="ficha">
								<a href="<?php echo $entradas[2]['link']; ?>">
									<figure class="snip1451">
									  <?php echo get_the_post_thumbnail( $entradas[2]['id'], 'thumb-blog-dos', array( 'class' => 'img-responsive' ) );?>
									  <figcaption>
									    <div><i class="ion-ios-paper-outline"></i></div>
									  </figcaption>
									</figure>
									<div class="contenido">
										<p><?php echo $entradas[2]['categories']; ?></p>
										<h3><?php echo $entradas[2]['title']; ?></h3>
									</div>
								</a>
							</div>						
						</div>
					<?php } ?>
				</div>


			</div>
		</div>
		<div class="row">
		<?php if(isset($entradas[3])){ ?>
			<?php for ($i=3; $i < count($entradas); $i++) { ?>
				
				<div class="col-sm-6 col-md-6 col-ms-6 col-xs-12 col-centered special-padding">
					<div class="ficha">
						<a href="<?php echo $entradas[$i]['link']; ?>">
							<figure class="snip1451">
							  <?php echo get_the_post_thumbnail( $entradas[$i]['id'], 'thumb-ideas', array( 'class' => 'img-responsive' ) );?>
				
							  <figcaption>
							    <div><i class="ion-ios-paper-outline"></i></div>
							  </figcaption>
							</figure>
							<div class="contenido">
								<p><?php echo $entradas[$i]['categories']; ?></p>
								<h3><?php echo $entradas[$i]['title']; ?></h3>
							</div>
						</a>
					</div>
				</div>
			<?php } 
				}
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