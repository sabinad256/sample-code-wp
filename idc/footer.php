<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package idc
 */

?>

	</main>
	<footer id="footer">
		<div class="container">
			<div class="social-networks">
				<?php
					$facebook_url = get_field('facebook_url', 'option');
					$twitter_url = get_field('twitter_url', 'option');
					if($facebook_url || $twitter_url) {
				?>
				<ul>
					<?php if ($facebook_url){ ?>
					<li class="facebook">
						<a href="<?php echo $facebook_url ?>" target="_blank"></a>
					</li>
					<?php } ?>
					<?php if ($twitter_url){ ?>
					<li class="twitter">
						<a href="<?php echo $twitter_url ?>" target="_blank"></a>
					</li>
					<?php } ?>
				</ul>
				<?php } ?>

				<strong>Follow us</strong>
			</div>


			<?php if( get_field('footer_text', 'option') ) { ?>
			<div class="footer-text">
				<p><?php the_field('footer_text', 'option'); ?></p>
			</div>
			<?php } ?>

			<?php
					$footer_logo = get_field('footer_logo', 'option');
					if($footer_logo) {
				?>
				<div class="footer-logo">
					<a href="https://www.firstlink.com/" target="_blank">
						<img src="<?php echo $footer_logo['url'];?>" alt="<?php echo $footer_logo['alt'] ? $footer_logo['alt'] : $footer_logo['title']; ?>">
					</a>
				</div>
				<?php } ?>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
