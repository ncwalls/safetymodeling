<?php get_header(); ?>
	
	<?php while( have_posts() ): the_post(); ?>
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
		<div class="container">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</article>
		</div>
	<?php endwhile; ?>

<?php get_footer();