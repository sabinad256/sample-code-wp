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
						<div class="gallery-block">
							<ul>
								<?php
									while (have_posts() ) : the_post();
									if(has_post_thumbnail()) {
								?>
									<li>
										<a href="<?php the_permalink();?>" >
										<?php the_post_thumbnail('thumb-399x299');
										?>
										<div class="text">
											<strong class="h3"><?php echo the_title();?></strong>
										</div>
										</a>
									</li>
								<?php } else{
									$image = get_template_directory_uri().'/assets/images/placeholder.jpg'?>
									<li>
										<a href="<?php the_permalink();?>" >
											<img src="<?php echo $image;?>" alt="image description">
											<div class="text">
												<strong class="h3"><?php echo the_title();?></strong>
											</div>
										</a>
									</li>
								<?php } endwhile; ?>
							 </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php
get_footer();
