<?php get_header(); ?>


	<?php while( have_posts() ): the_post(); ?>
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>)">
				<div class="container">
					<h1>
						<strong><?php the_field('hero_main_title'); ?></strong>
						<?php the_field('hero_sub_title'); ?>
					</h1>
				</div>
			</div>
			<section class="services-list">
				<div class="container">
					<h2><?php the_field('service_title'); ?></h2>
					<ul>
						<?php
							$service_pages = get_posts(array(
								'posts_per_page' => -1,
								'post_type' => 'page',
								'post_parent' => 42,
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
					<a href="<?php the_field('services_overview_link'); ?>" class="all"><?php the_field('services_overview_link_text'); ?></a>
				</div>
			</section>
			
			<section class="about">
				<div class="container">
					<div class="left">
						<h2><?php the_field('about_title'); ?></h2>
						<?php the_field('about_content'); ?>
						<a href="<?php the_field('about_link'); ?>" class="plus-button"></a>
					</div>
					<div class="right">
						<h2><?php the_field('glance_title'); ?></h2>
						<?php the_field('glance_content'); ?>
					</div>
				</div>
				<?php if(have_rows('logos')): ?>
					<div class="logos">
						<div class="container">
							<ul>
								<?php while(have_rows('logos')): the_row(); ?>
									<li>
										<img src="<?php echo get_sub_field('logo_image')['sizes']['medium']; ?>" alt="<?php the_sub_field('title'); ?>">
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
					</div>
				<?php endif; ?>
			</section>
			<div class="news" style="background-image: url(<?php echo get_field('news_background')['sizes']['large']; ?>)">
				<div class="container">
					<h2><?php the_field('news_title'); ?></h2>
					<div class="news-content">
						<?php the_field('news_content'); ?>
					</div>
					
					<?php
						$recent_posts = get_posts(array(
							'posts_per_page' => 2
						));
					?>
					<div class="blog-list">
						<?php foreach($recent_posts as $recent_post): ?>
							<article>
								<?php if(get_the_post_thumbnail_url( $recent_post->ID)): ?>
									<figure>
										<a href="<?php echo get_permalink($recent_post->ID); ?>">
											<img src="<?php echo get_the_post_thumbnail_url( $recent_post->ID, 'medium' ); ?>" alt="">
										</a>
									</figure>
								<?php endif; ?>
								<div class="content">
									<h3><a href="<?php echo get_permalink($recent_post->ID); ?>" title="<?php echo get_the_title($recent_post->ID); ?>"><?php echo get_the_title($recent_post->ID); ?></a></h3>
									<ul class="post-meta">
										<li><?php echo get_the_time( 'F j, Y', $recent_post->ID ); ?></li>
										<li><?php echo SparkSpringFramework::read_time($recent_post->ID); ?></li>
									</ul>
									<a href="<?php echo get_permalink($recent_post->ID); ?>" class="plus-button"></a>
								</div>
							</article>
						<?php endforeach; ?>
					</div>
					<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="all">See All</a>
				</div>
			</div>
		</article>
	<?php endwhile; ?>

<?php get_footer();