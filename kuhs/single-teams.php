<?php
get_header(); 
// the_post();
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
						<div class="text-block team-detail">
							<?php
								$image = get_field('team_profile_image', $post->ID);
								$post_name = get_field('team_post', $post->ID);
								if($image) {
							?>
							<div class="img-wrap">
								<img src="<?php echo $image[sizes][large];?>" alt="image description">
							</div>
							<?php } ?>
							<h2><?php the_title();?></h2>
							<?php if($post_name) {?>
							<strong class="post"><?php echo $post_name;?></strong>
							<?php } ?>

							<?php
								echo the_content();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php
// get_sidebar();
get_footer();
