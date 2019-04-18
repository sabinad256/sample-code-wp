<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package idc
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,400i,500,500i,600,700" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="wrapper">
		<header id="header">
			<div class="container">
				<?php
					$logo = get_field('logo', 'option');
					if($logo) {
				?>
				<div class="logo">
					<a href="<?php echo home_url();?>">
						<img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'] ? $logo['alt'] : $logo['title']; ?>">
					</a>
				</div>
				<?php } ?>

				<div class="header-right">
					<?php if(get_field('header_text', 'option')) { ?>
					<span class="header-text"><?php the_field('header_text', 'option') ?></span>
					<?php } ?>
					<nav id="nav">
						<a href="#" class="nav-opener"><span></span></a>
						<div class="drop">
							<?php wp_nav_menu(
								array (
									'theme_location' => 'header-menu' ,
									'container' => ''
								) );
							?>
						</div>
					</nav>
				</div>
			</div>
		</header>

		<main id="main">
