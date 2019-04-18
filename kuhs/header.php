<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kuhs
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet"> 

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="overlay"></div>
<div id="wrapper">
	<header id="header">
		<div class="logo">
			<a href="<?php echo home_url();?>">
				<?php
					$logo = get_field('logo', 'option');
					$logo_title = get_field('logo_title', 'option');
					$logo_address = get_field('logo_address', 'option');
					if($logo) {
				?>
				<div class="img-wrap">
					<img src="<?php echo $logo;?>" alt="Kathmandu University High School">
				</div>
				<?php } ?>
				<?php if($logo_title || $logo_address) {?>
				<div class="text">
					<?php if($logo_title) { ?>
					<p><?php echo $logo_title;?></p>
					<?php } if($logo_address) {?>
					<span><?php echo $logo_address;?></span>
					<?php } ?>
				</div>
				<?php } ?>
			</a>
		</div>
		<nav id="nav">
			<a href="#" class="opener fa fa-bars"></a>
			<div class="drop">
				<div class="nav-top">
					<?php
						if($logo) {
					?>
					<div class="nav-logo">
						<a href="<?php echo home_url();?>">
							<img src="<?php echo $logo;?>" alt="Kathmandu University High School">
						</a>
					</div>
					<?php } ?>
					<a href="#" class="opener fa fa-times"></a>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ,'container' => false) ); ?>
			</div>
		</nav>
	</header>

