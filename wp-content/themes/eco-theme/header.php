<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if(is_single( )){ ?>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6&appId=782721325128532";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
	<?php } ?>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-xs-8 col-sm-4 col-lg-3 col-ms-5">
					<img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" alt="EcoVive D & C" class="img-responsive">
				</div>
				<div class="col-sm-8 hidden-xs col-lg-9 col-ms-7">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'header__menu' ) );?>
				</div>
			</div>
		</div>
	</div>