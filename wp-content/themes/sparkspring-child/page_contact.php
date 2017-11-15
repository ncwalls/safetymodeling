<?php
/*
 * Template Name: Contact
 */
get_header(); ?>
<?php
	if(get_the_post_thumbnail_url( get_the_ID() ) ){
		$hero_img = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	}
	else{
		$hero_img = get_field( 'default_header_image', 'option' )['sizes']['large'];
	}
?>
<div class="hero" style="background-image: url(<?php echo $hero_img; ?>)">
	<?php
		if( function_exists( 'yoast_breadcrumb' ) ){
			yoast_breadcrumb( '<div id="breadcrumbs">', '</div>' );
		}
	?>
</div>

<?php 
	$contact_data = get_field( 'contact_information', 'option' ); 
	$contact = $contact_data[ 0 ];
?>

	<div class="container">
		<?php while( have_posts() ): the_post(); ?>
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				
				<div class="contact-links">
					<p class="phone"><a href="tel: <?php echo $contact[ 'phone_number' ]; ?>" class="footer-phone"><?php echo $contact[ 'phone_number' ]; ?></a><span class="location">Dallas, TX</span></p>
					<p class="email"><a href="mailto:<?php echo $contact[ 'email_address' ]; ?>"><?php echo $contact[ 'email_address' ]; ?></a></p>
					
					<p class="social">
						<?php foreach ( $contact[ 'social_media_links' ] as $social ): ?>
							<a href="<?php echo $social[ 'url' ]; ?>" target="_blank">
								<i class="fa <?php echo $social[ 'class' ]; ?>"></i>
							</a>
						<?php endforeach; ?>
					</p>
				</ul>
				<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="false"]'); ?>
			</article>
		<?php endwhile; ?>
	</div>

<?php get_footer();