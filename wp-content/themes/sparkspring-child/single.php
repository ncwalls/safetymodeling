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
				<ul class="post-meta">
					<li><?php the_time( 'F j, Y' ); ?></li>
					<li><?php echo SparkSpringFramework::read_time(); ?></li>
				</ul>
				<?php the_content(); ?>
				<footer class="single-nav">
					<ul>
						<li class="item prev">
							<?php if( get_previous_post() ): $prev = get_previous_post(); ?>
								<a href="<?php echo get_permalink( $prev->ID ); ?>"><?php echo '<i class="fa fa-angle-left"></i><span class="text"> Previous</span>'; ?></a>
							<?php endif; ?>
						</li>
						<li class="item next">
							<?php if( get_next_post() ): $next = get_next_post(); ?>
							<a href="<?php echo get_permalink( $next->ID ); ?>"><?php echo '<span class="text">Next </span><i class="fa fa-angle-right"></i>'; ?></a>
							<?php endif; ?>
						</li>
						<li>
							<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Back To All Updates</a>
						</li>
					</ul>
				</footer>
			</article>
		</div>
	<?php endwhile; ?>

<?php get_footer();