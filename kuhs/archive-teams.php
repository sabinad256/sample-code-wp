<?php
get_header();
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
						<div class="team-block">
							<ul>
								<?php
									while (have_posts() ) : the_post();
									$team_profile_image = get_field('team_profile_image');
									$thumb = $team_profile_image[sizes]['thumb-399x299'];
									$team_post = get_field('team_post');
								?>
									<li>
										
										<div class="img-wrap">
											<a href="<?php the_permalink();?>">
												<img src="<?php echo $thumb;?>" alt="image description">
											</a>
										</div>
										<div class="text">
											<strong class="h3"><a href="<?php the_permalink();?>"><?php echo the_title();?></a></strong>
											<?php if($team_post){?>
											<p><?php echo $team_post;?></p>
											<?php } ?>
										</div>
										
									</li>
								<?php endwhile; ?>
							 </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php
get_footer();
