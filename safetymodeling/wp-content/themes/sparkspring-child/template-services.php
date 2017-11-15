<?php /* Template Name: Services */
get_header(); ?>
	
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
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="container">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
				
			<div class="services-list">
				<div class="container">
					<ul>
						<?php
							$service_pages = get_posts(array(
								'posts_per_page' => -1,
								'post_type' => 'page',
								'post_parent' => get_the_ID(),
								'orderby' => 'menu_order',
								'order' => 'ASC'

							));

							foreach($service_pages as $service):
						?>
						<li>
							<a href="<?php echo get_permalink($service->ID); ?>">
								<span><?php echo get_the_title($service->ID); ?></span>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</article>
	<?php endwhile; ?>

<?php get_footer();