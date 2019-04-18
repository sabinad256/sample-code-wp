<?php
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
						<?php if(have_rows('galleries_list')){?>
						<div class="gallery-block">
							<ul>
								<?php while(have_rows('galleries_list')): the_row();
								$image = get_sub_field('image');
								$thumb = $image[sizes]['thumb-399x299'];
								$caption = get_sub_field('image_caption');
								?>
								<li>
									<a href="<?php echo $image[sizes]['large'];?>" rel="lightbox"><img src="<?php echo $thumb;?>" alt="image description">
										<?php if($caption) { ?>
										<div class="text">
											<strong class="h3"><?php echo $caption;?></strong>
										</div>
										<?php } ?>
									</a>
								</li>
								<?php endwhile;?>
							</ul>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php
get_footer();
