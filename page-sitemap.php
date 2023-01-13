<?php get_header(); ?>

	<div class="content-container mb-16">
		<h1 class="lg:text-5xl text-4xl lg:mb-12 lg:mt-8 mb-6 mt-4 font-bold">
			Sitemap
		</h1>
		<div class="flex flex-col space-y-2">
			<!-- Get WP options -->
			<?php
			// Query of latests posts ordered by publish date
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 10000,
				'order' => 'DESC',
				'orderby' => 'date',
			);
			$query = new WP_Query( $args );
			while ($query->have_posts()) : $query->the_post();
				?>
				<div class="col-sm-4">
					<?php get_template_part('template-parts/sitemap-item'); ?>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>

<?php
get_footer();
