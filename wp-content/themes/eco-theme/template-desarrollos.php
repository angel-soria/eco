<?php
/**
 * Template Name: Desarrollos
 *
 */
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
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $link= get_permalink( ); ?>
		<div class="banner" style="background-image: url('<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url('large');}?>');">
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
			<div class="col-xs-12 col-sm-10">
				<ul class="menu-interior">
					<li><a href="<?php echo $link;?>" class="active">Todos</a></li>
					<?php 
						$terms = get_terms( array('taxonomy' => 'categoria-desarrollos','hide_empty' => false,) );
					 	foreach ( $terms as $term ) {
        					echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a></li>';
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
		<?php for ($i=0; $i < 6; $i++) { ?>
			<a href="#">
			<div class="col-xs-12">
				<div class="ficha list-type">
					<div class="row">
						<div class="col-sm-5 col-md-4 col-ms-4">
							<figure class="snip1451">
							  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/casa-2.jpg" alt="" class="img-responsive" />
							  <figcaption>
							    <div><i class="ion-ios-home-outline"></i></div>
							  </figcaption>
							</figure>							
						</div>
						<div class="col-sm-7 col-md-5">
							<div class="contenido">
								<p>Terreno</p>
								<h3>Casa en Lomas del Punhuato, Morelia</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia impedit alias, quam iure at excepturi velit, veritatis soluta. Cum, sequi atque vitae soluta vero saepe illum at ut quisquam minima.</p>
							</div>							
						</div>
						<div class="col-sm-12 col-md-3">
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
			</a>
		<?php } ?>
		
		<?php } else{ ?>



		<?php for ($i=0; $i < 6; $i++) { ?>
			
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
		
		<?php } //else vista?>

		</div>




		<div class="row ">
			<div class="col-xs-12">
				<div class="content-pagination">
					<ul class="pagination">
					  <li><a href="#">1</a></li>
					  <li><a href="#">2</a></li>
					  <li><a href="#">3</a></li>
					  <li><a href="#">4</a></li>
					  <li><a href="#">5</a></li>
					</ul>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>