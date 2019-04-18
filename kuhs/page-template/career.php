<?php

/**

 * Template Name: Career Page Template

*/

get_header();

?>



<main id="main">

	<?php get_template_part( 'template-parts/banner','block'); ?>

	<div class="main-container">

		<div class="container">

			<div class="row">

				<div class="content">

					<?php 

						if(have_rows('career_listing')){

					?>

					<div class="career-block">

						<ul>

							<?php

								while(have_rows('career_listing')): the_row();

								$carr_title = get_sub_field('career_title');

								$carr_content = get_sub_field('career_description');

								$carr_date = get_sub_field('career_date', false, false);

								$date = new DateTime($carr_date);

							?>

							<li>

								<?php if($carr_title){?>

								<h2 class="h3"><?php echo $carr_title;?></h2>

								<?php } ?>

								<?php if($carr_date) {?>

								<time datetime="<?php echo $carr_date;?>"><?php echo $date->format('j M Y');?></time>

								<?php } ?>

								<?php

									if($carr_content) {

										echo $carr_content;

									}

								?>

								

							</li>

							<?php endwhile;?>

						</ul>

					</div>

					<?php } ?>

				</div>

				<sidebar id="sidebar">

					<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar-1' ); ?>

					<?php endif; ?>

				</sidebar>

			</div>

		</div>

	</div>

</main>

<?php

get_footer();

