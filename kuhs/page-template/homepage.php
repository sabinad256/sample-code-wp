<?php

/**

 * Template Name: Home Page Template

*/

get_header();

the_post();

?>



<main id="main">

	<?php if(have_rows('banner_slider')){?>

	<section class="banner-slider">

		<?php 

			while(have_rows('banner_slider')): the_row();

			$bg_image = get_sub_field('banner_image');

			$banner_title = get_sub_field('banner_title');

			$banner_content = get_sub_field('banner_content');

			$banner_btn_text = get_sub_field('banner_btn_text');

			$banner_btn_link = get_sub_field('banner_btn_link');

		?>

		<div class="item" <?php if($bg_image){?>style="background-image:url('<?php echo $bg_image?>')"<?php } ?>>

			<div class="container">

				<?php 

					if($banner_title || $banner_content) {

				?>

				<div class="text">

					<?php if($banner_title) { ?>

					<h1><?php echo $banner_title;?></h1>

					<?php } ?>

					<?php if($banner_content) { ?>

					<?php echo $banner_content;?>

					<?php } ?>

					<?php if($banner_btn_text && $banner_btn_link) { ?>

					<a href="<?php echo $banner_btn_link;?>" class="btn"><?php echo $banner_btn_text;?></a>

					<?php } ?>

				</div>

				<?php } ?>

			</div>

		</div>

		<?php endwhile;?>

	</section>

	<?php } ?>

	<?php
		$notice_text = get_field('notice_text');
		if($notice_text) {
	?>
	<section class="notice-block">
		<div class="container">
			<div class="text">
				<marquee><?php echo $notice_text;?></marquee>
			</div>
		</div>
	</section>
	<?php } ?>

	<section class="intro-block">

		<div class="container">

			<?php

				$intro_title = get_field('intro_title');

				$intro_content = get_field('intro_content');

				$intro_btn_text = get_field('intro_btn_text');

				$intro_btn_link = get_field('intro_btn_link');

				if($intro_title || $intro_content){

			?>

			<?php if($intro_title){ ?>

			<div class="intro-title">

				<h2><?php echo $intro_title;?></h2>

			</div>

			<?php } ?>

			<?php if($intro_content){?>

			<div class="intro-text">

				<?php echo $intro_content; ?>

				<?php if($intro_btn_text && $intro_btn_link){?>

				<a href="<?php echo $intro_btn_link;?>" class="btn btn-gray"><?php echo $intro_btn_text;?></a>

				<?php } ?>

			</div>

			<?php } ?>

			<?php } ?>

			<?php

				$intro_image = get_field('intro_image');

				if($intro_image) {

			?>

			<div class="img-wrap">

				<img src="<?php echo $intro_image;?>" alt="image description">

			</div>

			<?php } ?>

		</div>

	</section>



	<?php

		$curriculums = get_field('curriculum');

		if($curriculums){

	?>

	<section class="career-section">

		<ul>

			<?php

				foreach ($curriculums as $curriculum) {

				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $curriculum->ID , 'large'));

				$excerpt = get_the_excerpt( $curriculum->ID );

				$show = get_field('show_overlay' , $curriculum->ID);

				$overlay_color = get_field('choose_color', $curriculum->ID);

			?>

			<li>

				<a href="<?php the_permalink($curriculum->ID); ?>" <?php if($image) {?> style="background-image:url('<?php echo $image[0];?>');"<?php } ?>>

					<?php if($show == 1){ ?>

					<span class="bg-overlay" style="background:<?php echo $overlay_color;?>"></span>

					<?php }?>

					<div class="text">

						<h3><?php echo $curriculum->post_title;?></h3>

						<?php if($excerpt) {?>

						<p><?php echo $excerpt ?></p>

						<?php } ?>



						<span class="plus">+</span>

					</div>

				</a>

			</li>

			<?php } ?>

		</ul>

	</section>

	<?php } ?>



	<section class="admission-section">

		<div class="container">

			<?php

				$add_title = get_field('admission_title');

				$download_text = get_field('download_text');

				$download_link = get_field('download_link');

				$info_text = get_field('info_text');

				if($add_title || $info_text){

			?>

			<div class="admission-box">

				<?php

					if($add_title){

				?>

				<strong class="h1"><?php echo $add_title;?></strong>

				<?php } ?>

				<?php

					if($download_text && $download_link){

				?>

				<a href="<?php echo $download_link; ?>" class="btn btn-info"><?php echo $download_text; ?></a>

				<?php } ?>

				<?php if($info_text) { ?>

				<span class="info"><?php echo $info_text; ?></span>

				<?php } ?>

			</div>

			<?php } ?>

			<div class="btn-block">

				<ul>

					<?php 

						$button_title_1 = get_field('button_title_1');

						$button_link_1 = get_field('button_link_1');

						$button_title_2 = get_field('button_title_2');

						$button_link_2 = get_field('button_link_2');

						if($button_title_1  && $button_link_1) {

					?>

					<li>

						<a href="<?php echo $button_link_1; ?>" class="btn btn-primary"><?php echo $button_title_1; ?></a>

					</li>

					<?php } if($button_title_2  && $button_link_2) {?>

					<li>

						<a href="<?php echo $button_link_2; ?>" class="btn btn-view"><?php echo $button_title_2; ?></a>

					</li>

					<?php } ?>

				</ul>

			</div>

		</div>

	</section>



	<?php

		$args = array(

			'post_type' => 'galleries',

			'orderby' => 'date',

			'order' => 'DESC',

			'posts_per_page' => -1,

		);

		$query = new WP_Query( $args);

		if($query->have_posts()) {

	?>

	<section class="gallery-section">

		<ul>

			<?php

				while ( $query->have_posts() ) : $query->the_post();

				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-399x299' );

				if($image) {

			?>

				<li>

					<a href="<?php the_permalink($query->ID);?>" >

						<img src="<?php echo $image[0];?>" alt="image description">

					</a>

				</li>

			<?php } else{

				$image = get_template_directory_uri().'/assets/images/placeholder.jpg'?>

				<li>

					<a href="<?php the_permalink($query->ID);?>" >

						<img src="<?php echo $image;?>" alt="image description">

					</a

				</li>

			<?php }

			 endwhile; wp_reset_query();?>

		 </ul>

	</section>

	<?php } ?>



	<section class="news-section clearfix">

		<div class="latest-news same-height">

			<div class="latest-news-wrap">

				<div class="latest-news-content">

					<strong class="h1">Latest News</strong>

					<?php

						$args = array(

							'orderby' => 'date',

							'order' => 'DESC',

							'posts_per_page' => 2,

						);

						$query = new WP_Query( $args);

						if($query->have_posts()){

					?>

					<ul>

						<?php

							while($query->have_posts()) : $query->the_post();

							$excerpt = get_the_excerpt();

						?>

						<li>

							<div class="date">

								<strong class="day"><?php echo get_the_date( 'j' )?></strong>

								<span class="month"><?php echo get_the_date( 'M' )?></span>

								<span class="year"><?php echo get_the_date( 'Y' )?></span>

							</div>

							<div class="text">

								<strong class="title">

									<a href="<?php the_permalink();?>">

										<?php echo the_title();?>

									</a>

								</strong>

								<?php if ($excerpt) {?>

								<p><?php echo $excerpt;?></p>

								<?php } ?>

								<a href="<?php the_permalink();?>" class="more">Read More</a>

							</div>

						</li>

						<?php endwhile; wp_reset_query();?>

					</ul>

					<?php }?>

					<a href="<?php echo site_url();?>/news" class="btn btn-gray">View more</a>

				</div>

			</div>

		</div>

		<div class="smart-block same-height">

			<div class="smart-block-wrap">

				<?php 

					$smart_title = get_field('smart_title');

					$smart_sub_title = get_field('smart_sub_title');

					$smart_content = get_field('smart_content');

					if($smart_title) {

				?>

				<div class="smart-box">

					<strong class="h1"><?php echo $smart_title;?></strong>

				</div>

				<?php } ?>

				<?php if($smart_sub_title || $smart_content) { ?>

				<div class="smart-text">

					<?php if($smart_sub_title) {?>

					<strong class="title"><?php echo $smart_sub_title;?></strong>

					<?php }

						echo $smart_content;

					?>

				</div>

				<?php } ?>

			</div>

		</div>

	</section>



	<?php

	$map_link = get_field('map_link','option');

	if($map_link) {

	?>

	<section class="map-section">

		<iframe src="https://www.google.com/maps/embed?pb=<?php echo $map_link;?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

	</section>

	<?php } ?>

</main>



<?php

	get_footer();

?>

