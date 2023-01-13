<?php get_header(); ?>

	<div class="mx-auto max-w-6xl px-4 lg:px-0 flex flex-col my-12">
        <div class="grid grid-cols-3 gap-8 w-full">
            <!-- Get WP options -->
            <?php
            // Query of latests posts ordered by publish date
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 9,
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
        <?php if (get_option('site_description')) {?>
            <div class="mt-16 text-gray-700 font-light">
                <?php echo get_option('site_description'); ?>
            </div>
        <?php } ?>
	</div>

<?php
get_footer();


