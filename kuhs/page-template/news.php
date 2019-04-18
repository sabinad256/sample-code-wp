<?php
/**
 * Template Name: News Page Template
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
						$args = array(
							'orderby' => 'date',
							'order' => 'DESC',
							'posts_per_page' => -1,
						);
						$query = new WP_Query( $args);
						if($query->have_posts()){
					?>
					<div class="news-block">
						<ul>
							<?php
								while($query->have_posts()): $query->the_post();
								$excerpt = get_the_excerpt();
							?>
							<li>
								<h2 class="h3"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
								<?php if ($excerpt) {?>
								<p><?php echo $excerpt;?></p>
								<?php } ?>
								<a href="<?php the_permalink();?>" class="more">Read More</a>
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
