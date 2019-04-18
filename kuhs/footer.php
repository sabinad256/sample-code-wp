<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kuhs
 */

?>
	<footer id="footer">
		<div class="container">
			<div class="footer-top clearfix">
				<div class="col col-logo">
					<div class="col-wrap">
						<?php
							$flogo = get_field('footer_logo', 'option');
							if($flogo) {
						?>
						<div class="footer-logo">
							<a href="<?php echo home_url();?>">
								<img src="<?php echo $flogo;?>" alt="Kathmandu University High School">
							</a>
						</div>
						<?php } ?>
						<ul class="contact-list">
							<?php
								$telephone= get_field('telephone', 'option');
								if($telephone) {
							?>
							<li class="phone"><?php echo $telephone;?></li>
							<?php } ?>
							<?php
								$fax= get_field('fax', 'option');
								if($fax) {
							?>
							<li class="fax"><?php echo $fax;?></li>
							<?php } ?>
							<?php
								$email= get_field('email', 'option');
								if($email) {
							?>
							<li class="mail">
								<a href="mailto:<?php echo $email?>"><?php echo $email?></a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="col col-about">
					<div class="col-wrap">
						<strong class="title">about</strong>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu1' ,'container' => false) ); ?>
					</div>
				</div>
				<div class="col col-career">
					<div class="col-wrap">
						<strong class="title">curriculum</strong>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu2' ,'container' => false) ); ?>
					</div>
				</div>
				<div class="col col-extra">
					<div class="col-wrap">
						<strong class="title">extra</strong>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu3' ,'container' => false) ); ?>
					</div>
				</div>
			</div>
			<?php
				$copyright = get_field('footer_copyright', 'option');
				if($copyright) {
			?>
			<div class="footer-bottom">
				<?php echo $copyright;?>
			</div>
			<?php } ?>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>

</body>
</html>
