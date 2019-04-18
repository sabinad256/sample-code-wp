<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package kuhs
 */

get_header(); ?>

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
						<?php
						if ( have_posts() ) : ?>

							<header class="page-header">
								<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'kuhs' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
							</header><!-- .page-header -->

							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								// get_template_part( 'template-parts/content', 'search' );

							endwhile;

							the_posts_navigation();

						else :

							// get_template_part( 'template-parts/content', 'none' );

							echo "<h1> No results found.</h1>";

						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php

get_footer();
