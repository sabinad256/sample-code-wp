<?php
/**
 * Template Name: Alumini Page Template
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
						$terms = get_terms( array(
						    'taxonomy' => 'group',
						    'hide_empty' => false,
						));

						pr($terms);
					?>
					<div class="student-groups">
						<strong class="title">Groups</strong>
						<ul>
							<?php 

							foreach($terms as $term) {
								$student_image = get_field('student_group_image',$term->term_id);
								echo $student_image;
								$thumb = $student_image[sizes]['thumb-399x299'];
								?>
							<li>
								<a href="<?php echo home_url().'/'.$term->taxonomy.'/'.$term->slug;?>">
									<img src="<?php echo $thumb;?>" alt="image description">
									<span class="name">
										<?php echo $term->name;?>
									</span>
								</a>
							</li>
							<?php } ?>
						</ul>
					</div>


					<?php if(have_rows('alumini_list')){?>
					<div class="team-block alumini-block">
						<ul>
							<?php while(have_rows('alumini_list')): the_row();
								$student_image = get_sub_field('student_image');
								$thumb = $student_image[sizes]['thumb-399x299'];
								$student_name = get_sub_field('student_name');
								$date = get_sub_field('student_year', false, false);
								$date = new DateTime($date);
							?>

							<li>
								<?php if($student_image) {?>
								<div class="img-wrap">
									<img src="<?php echo $thumb;?>" alt="image description">
								</div>
								<?php } ?>
								<div class="text">
									<?php if($student_name){?>
									<strong class="h3"><?php echo $student_name;?></strong>
									<?php } ?>

									<?php if($date){?>
									<time datetime="<?php echo $date->format('Y-m-d');?>"><?php echo $date->format('F j, Y');?></time>
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

