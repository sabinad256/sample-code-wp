<?php
	get_header();
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	$bg = get_field('student_group_image' , $term->term_id);

?>
<main id="main">
	<section class="banner" style="background-image:url('<?php echo $bg;?>');">
		<div class="container">
			<div class="text">
				<h1><?php echo $term->name; ?></h1>
			</div>
		</div>
	</section>
	<div class="main-container">
		<div class="container">
			<div class="row">
				<div class="content">

					<?php 
						$terms = get_terms( array(
						    'taxonomy' => 'group',
						    'hide_empty' => false,
						));

						
					?>
					<div class="student-taxonomy-block">
						<?php

						?>
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

