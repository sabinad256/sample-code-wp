<?php
	get_header();
	// $args = array(  
	// 	'post_type' => 'blog',
	// 	'orderby' => 'date',
	// 	'order' => 'DESC',
	// );
?>

<main id="main">
	<?php get_template_part( 'template-parts/banner','block'); ?>

	<div class="main-container">
		<div class="container">
			<div class="row">
				<div class="content">
					<?php 
						$terms = get_terms( array(
						    'taxonomy' => 'groups',
						    'hide_empty' => false,
						) );
					?>
					<div class="student-groups">
						<strong class="title">Groups</strong>
						<ul>
							<?php 

							foreach($terms as $term) {
								?>
							<li>
								<a href="<?php echo home_url().'/'.$term->taxonomy.'/'.$term->slug;?>"><?php echo $term->name;?></a>
							</li>
							<?php } ?>
						</ul>
					</div>
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
?>
