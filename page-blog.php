<?php get_header(); ?>


	<div class="mx-auto max-w-6xl px-4 lg:px-0 flex flex-col my-12">
		<h1 class="lg:text-5xl text-4xl lg:mb-12 lg:mt-8 mb-6 mt-4 font-bold">
			Blog
		</h1>
		<div class="grid grid-cols-3 gap-8 w-full">
			<!-- Get WP options -->
			<?php
			// Query of latests posts ordered by publish date
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 36,
				'order' => 'DESC',
				'orderby' => 'date',
			);
			$query = new WP_Query( $args );
			while ($query->have_posts()) : $query->the_post();
				?>
				<div class="col-sm-4">
					<?php get_template_part('template-parts/card'); ?>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>

<?php
get_footer();
