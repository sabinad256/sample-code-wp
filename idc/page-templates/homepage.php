<?php
/**
 * Template Name: Home Page Template
*/

get_header();
?>

	<?php
		$image = get_field('banner_background');
	?>
	<section class="banner" <?php if($image) { ?>style="background-image:url(<?php echo $image['url']; ?>)" <?php } ?>>
		<div class="container">

		</div>
	</section>


	<?php
		$title = get_field('intro_title');
		$description = get_field('intro_description');
		$bg = get_field('intro_background');
		if($title || $description ) {
	?>
	<section class="intro-block" style="background-image:url(<?php echo $bg['url']; ?>);">
		<div class="container">
			<div class="text">
				<?php if($title) {?>
				<h1><?php echo $title; ?></h1>
				<?php } ?>
				<?php echo $description; ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php
		$video_title = get_field('video_title');
		$video = get_field('vb_video');
		$fallback_image = get_field('fallback_image');
		$choose_video_type = get_field('choose_video_type');
		$vimeo_url = get_field('vimeo_url');
	?>

	<section class="video-block">
		<div class="container">
			<?php if($video_title) { ?>
			<h2><?php echo $video_title; ?></h2>
			<?php } ?>


			<?php if($choose_video_type == "vimeo") { ?>
				<?php if($fallback_image && $vimeo_url) {?>
				<div class="video-wrap">
					<a href="<?php echo $vimeo_url; ?>" target="_blank">
						<img src="<?php echo $fallback_image['url'] ?>" alt="<?php echo $fallback_image['alt'] ? $fallback_image['alt'] : $fallback_image['title']; ?>">
					</a>
				</div>
				<?php } ?>
			<?php } else { ?>
			<div class="video-wrap">
				<video <?php if($fallback_image) { ?> poster="<?php echo $fallback_image['url']; ?>" <?php } ?> controls>
					<source src="<?php echo $video['url']; ?>" type="<?php echo $video['mime_type']; ?>">
					Your browser does not support the video tag.
				</video>
			</div>
			<?php } ?>


		</div>
	</section>

<?php
	get_footer();
?>

