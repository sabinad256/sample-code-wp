<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kuhs
 */

get_header(); ?>

	<main id="main">
		<?php 
		$image = get_template_directory_uri().'/assets/images/404.jpg';
		?>
		<section class="banner" style="background-image:url('<?php echo $image; ?>');">
			<div class="container"></div>
		</section>
		<section class="error-404 not-found">
			<div class="container">
				<h1>404</h1>
				<h2>Oops! That page can’t be found.</h2>
				<p>It looks like nothing was found at this location.</p>
			</div>
		</section><!-- .error-404 -->
	</main>


<?php
get_footer();
