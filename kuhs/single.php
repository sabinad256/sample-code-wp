<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kuhs
 */

get_header(); 
the_post();
?>
	<main id="main">
		<?php get_template_part( 'template-parts/banner','block'); ?>
		<div class="main-container">
			<div class="container">
				<div class="row">
					<sidebar id="sidebar">
						<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-1' ); ?>
						<?php endif; ?>
					</sidebar>
					<div class="content">
						<section class="text-block">
							<?php the_content();?>
						</section>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php
// get_sidebar();
get_footer();
