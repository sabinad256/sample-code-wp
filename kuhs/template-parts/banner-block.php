<section class="banner" <?php if ( has_post_thumbnail() ) {?>style="background-image:url('<?php echo get_the_post_thumbnail_url();?>');"<?php } ?>>
	<div class="container">
		<div class="text">
			<h1><?php the_title();?></h1>
		</div>
	</div>
</section>
