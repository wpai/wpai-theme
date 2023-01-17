<?php

// query over 6 latest posts
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 6,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
);

$the_query = new WP_Query($args); ?>
<?php do_action('before_sidebar'); ?>
<div class="shadow-container divide-y divide-gray-200 px-4 py-2 flex flex-col">

    <div class="py-6 font-semibold text-lg text-center">
        <?php echo get_translation("Latest articles")?>
    </div>

    <?php
    if ($the_query->have_posts()) : ?>

        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <a class="font-medium px-4 py-3 hover:underline" href="<?php echo get_permalink() ?>">
                <?php echo get_the_title() ?>
            </a>

        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    <?php endif; ?>
</div>


