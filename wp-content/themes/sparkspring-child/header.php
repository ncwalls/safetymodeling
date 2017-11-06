<!DOCTYPE html>
<html lang="en-US" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
		<!--[if lt IE 9]>
			<script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<meta name="google-site-verification" content="KrHCpB2waj93bkUWVPSvUSuBXa5gwezJ_C4eX9ilgEc" />
	</head>
	<body <?php body_class(); ?>>
		<?php 
			$contact_data = get_field( 'contact_information', 'option' ); 
			$contact = $contact_data[ 0 ];
		?>
		<?php if( 'ocn' == get_field( 'menu_type', 'option' ) ): ?>
			<div id="ocn">
				<div id="ocn-inner">
					<div id="ocn-top">
						<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>" id="ocn-brand">
							<img src="<?php the_field( 'site_logo', 'option' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
						</a>
						<button class="nav-toggle" type="button" id="ocn-close">
							<span></span>
						</button>
					</div>
					<?php wp_nav_menu( array(
						'container' => 'nav',
						'container_id' => 'ocn-nav-primary',
						'theme_location' => 'primary',
						'before' => '<span class="ocn-link-wrap">',
						'after' => '<span class="ocn-sub-menu-button"></span></span>'
					) ); ?>
					<a href="tel: <?php echo $contact[ 'phone_number' ]; ?>" class="ocn-phone"><?php echo $contact[ 'phone_number' ]; ?></a>
				</div>
			</div>
		<?php endif; ?>
		<header class="site-header">
			<div class="inner">
				<div class="left">
					<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>" class="logo">
						<img src="<?php the_field( 'site_logo', 'option' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
					</a>
				</div>
				<div class="right">
					<?php
						wp_nav_menu( array(
							'container' => 'nav',
							'container_id' => 'large-nav-primary',
							'theme_location' => 'primary'
						) );
					?>
					<button class="nav-toggle" type="button" id="nav-toggle">
						<span>menu</span>
					</button>
					<a href="tel: <?php echo $contact[ 'phone_number' ]; ?>" class="phone"><?php echo $contact[ 'phone_number' ]; ?></a>
				</div>
			</div>
		</header>