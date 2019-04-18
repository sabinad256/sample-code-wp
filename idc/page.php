<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package idc
 */

get_header();
the_post();
?>
<?php get_template_part( 'template-parts/section', 'heading-block' ); ?>
<section class="generic-block">
	<div class="container">
		<?php the_content(); ?>
	</div>
</section>

<?php get_footer();
