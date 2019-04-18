<?php
/**
 * Template Name: What we do Template
*/

get_header();
?>

	<?php get_template_part( 'template-parts/section', 'heading-block' ); ?>

	<section class="what-we-do-block">
		<div class="container">
			<?php
				$image = get_field('wwd_image');
				if($image) {
			?>
			<div class="img-wrap">
				<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'] ? $image['alt'] : $image['title']; ?>">
			</div>
			<?php } ?>

			<div class="accordion-block">
				<?php if(get_field('accordion_title')) { ?>
				<h2><?php the_field('accordion_title'); ?></h2>
				<?php } ?>

				<?php
					if(have_rows('wwd_accordion')) {
				?>

				<ol class="accordion">
					<?php
						$count = 1;
						while(have_rows('wwd_accordion')) {
						the_row();

						$title = get_sub_field('wwd_title');
						$description = get_sub_field('wwd_description');
						if($title && $description) {
					?>
					<li <?php if($count == 1 ){ ?> class="active" <?php } ?>>
						<h3><a href="#"><span class="count"><?php echo $count; ?>. </span><?php echo $title; ?></a></h3>

						<div class="slide">
							<?php echo $description; ?>
						</div>
					</li>
					<?php }  $count++; } ?>

				</ol>
				<?php } ?>
			</div>
		</div>
	</section>
<?php
	get_footer();
?>