<?php if(is_front_page()){ ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="about">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1><?php the_title();?></h1>
				<div class="contenido-principal"><?php the_content( ); ?></div>
			</div>
		</div>
		<div class="row row-centered">
			<div class="col-sm-4 col-ms-6 col-xs-12 col-centered">
				<div class="tip">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/man.png" alt="Asesoria EcoVive" class="img-responsive">
					<h3><?php echo (get_post_meta( get_the_ID(), 'title_asesoria', true ));?></h3>
					<p><?php echo (get_post_meta( get_the_ID(), 'asesoria', true ));?></p>
				</div>
			</div>
			<div class="col-sm-4 col-ms-6 col-xs-12 col-centered">
				<div class="tip">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/compass.png" alt="Construcción Ecovive" class="img-responsive">
					<h3><?php echo (get_post_meta( get_the_ID(), 'title_construccion', true ));?></h3>
					<p><?php echo (get_post_meta( get_the_ID(), 'construccion', true ));?></p>
				</div>
			</div>
			<div class="col-sm-4 col-ms-6 col-xs-12 col-centered">
				<div class="tip">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/sale.png" alt="Construcción Ecovive" class="img-responsive">
					<h3><?php echo (get_post_meta( get_the_ID(), 'title_ventas', true ));?></h3>
					<p><?php echo (get_post_meta( get_the_ID(), 'ventas', true ));?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endwhile; endif; ?>
<?php } else { ?>
<div class="about">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h3><?php echo get_the_title(11);?></h3>
			</div>
		</div>
		<div class="row row-centered">
			<div class="col-sm-4 col-ms-6 col-xs-12 col-centered">
				<div class="tip">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/man.png" alt="Asesoria EcoVive" class="img-responsive">
					<h3><?php echo (get_post_meta( 11, 'title_asesoria', true ));?></h3>
					<p><?php echo (get_post_meta( 11, 'asesoria', true ));?></p>
				</div>
			</div>
			<div class="col-sm-4 col-ms-6 col-xs-12 col-centered">
				<div class="tip">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/compass.png" alt="Construcción Ecovive" class="img-responsive">
					<h3><?php echo (get_post_meta( 11, 'title_construccion', true ));?></h3>
					<p><?php echo (get_post_meta( 11, 'construccion', true ));?></p>
				</div>
			</div>
			<div class="col-sm-4 col-ms-6 col-xs-12 col-centered">
				<div class="tip">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/sale.png" alt="Construcción Ecovive" class="img-responsive">
					<h3><?php echo (get_post_meta( 11, 'title_ventas', true ));?></h3>
					<p><?php echo (get_post_meta( 11, 'ventas', true ));?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>