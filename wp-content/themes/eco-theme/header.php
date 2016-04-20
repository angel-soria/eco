<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-sm-4 col-lg-3 col-ms-5">
					<img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" alt="EcoVive D & C" class="img-responsive">
				</div>
				<div class="col-sm-8 hidden-xs col-lg-9 col-ms-7">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'header__menu' ) );?>
				</div>
			</div>
		</div>
	</div>