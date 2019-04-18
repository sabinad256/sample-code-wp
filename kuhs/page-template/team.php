<?php

/**

 * Template Name: Team Page Template

*/

get_header();

?>



<main id="main">

	<?php get_template_part( 'template-parts/banner','block'); ?>

	<div class="main-container">

		<div class="container">

			<div class="row">

				<div class="content">

					<?php if(have_rows('team_list')){?>

					<div class="team-block">

						<ul>

							<?php while(have_rows('team_list')): the_row();

								$team_image = get_sub_field('team_profile_image');

								$thumb = $team_image[sizes]['thumb-399x299'];

								$team_title = get_sub_field('team_title');

								$team_post = get_sub_field('team_post');

							?>

							<li>

								<?php if($team_image) {?>

								<div class="img-wrap">

									<img src="<?php echo $thumb;?>" alt="image description">

								</div>

								<?php } ?>

								<div class="text">

									<?php if($team_title){?>

									<strong class="h3"><?php echo $team_title;?></strong>

									<?php } ?>

									<?php if($team_post){?>

									<p><?php echo $team_post;?></p>

									<?php } ?>

								</div>

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

