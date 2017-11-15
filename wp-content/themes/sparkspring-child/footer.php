<section class="newsletter">
	<div class="container">
		<div class="content">
			<h4><?php echo get_field('newsletter_form_title', 'option'); ?></h4>
			<?php echo get_field('newsletter_form_content', 'option'); ?>
		</div>
		<?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
	</div>
</section>


<?php 
	$contact_data = get_field( 'contact_information', 'option' ); 
	$contact = $contact_data[ 0 ];
?>
		<footer class="site-footer">
			<div class="footer-top">
				<div class="container">
					<?php if(!is_page_template('page_contact.php')): ?>
					<div class="left">
						<?php echo get_field('footer_contact_content', 'option'); ?>
						<a href="tel: <?php echo $contact[ 'phone_number' ]; ?>" class="footer-phone"><?php echo $contact[ 'phone_number' ]; ?></a>
						<p class="location">Dallas, TX</p>
						<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
					</div>
					<?php endif; ?>
					<div class="right">
						<?php echo get_field('footer_right_content', 'option'); ?>
						<?php /*<h4><strong>Our</strong> Location</h4>
						<p class="address"><?php echo $contact[ 'address' ]; ?></p>
						<div id="gmap"></div>
						<a href="<?php echo get_field( 'directions_link','option' ); ?>" class="directions">Get Directions &gt;</a>*/?>
						<?php if ( $contact[ 'social_media_links' ] ): ?>
							<div class="social">
								<h4>Social</h4>
								<?php foreach ( $contact[ 'social_media_links' ] as $social ): ?>
									<a href="<?php echo $social[ 'url' ]; ?>" target="_blank">
										<i class="fa <?php echo $social[ 'class' ]; ?>"></i>
									</a>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<nav class="footer-inlinks">
						<p class="copyright">&copy;<?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>.</p>
						<ul>
							<li><a href="<?php echo home_url( 'privacy-policy' ); ?>" title="Privacy Policy">Privacy Policy</a></li>
							<li><a href="<?php echo home_url( 'site-info' ); ?>" title="Site Info">Site Info</a></li>
							<li><a href="<?php echo home_url( 'site-map' ); ?>" title="Site Map">Site Map</a></li>
						</ul>
					</nav>
					<a href="http://www.sparkspring.com" id="sparkspring-logo">
						<svg version="1.1"
							 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
							 x="0px" y="0px" width="101.1px" height="349.2px" viewBox="0 0 101.1 349.2" style="enable-background:new 0 0 101.1 349.2;"
							 xml:space="preserve">
								<path class="st0" d="M25.7,157C4.5,188.4-2.3,205.6,4.6,227.3c13.6,42.9,55.2,60.8,33.9,117.5c-0.4,1.1,2.7,5.3,3.4,4.2
									c16.3-24,24.6-39.7,25.2-55.1c30.7-46.2,40.3-72.2,29.9-104.9C76,122.4,11.5,94.8,44.5,6.8c0.6-1.7-4.2-8.2-5.3-6.5
									C4.3,51.4-6.9,78.3,4,112.9C9.3,129.5,17.2,143.7,25.7,157z M29.4,162.7c21.4,32.7,44.1,61.3,33.9,109.8
									C48.9,233.2,11.9,214.7,29.4,162.7z"/>
						</svg>
					</a>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>