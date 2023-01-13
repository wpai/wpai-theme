<article id="post-<?php the_ID(); ?>">

    <div class="bg-gray-100 mb-12 lg:py-6 py-3 lg:px-0 px-4">
        <header class="content-container">
            <div class="mt-4 font-medium">Blog</div>
            <?php the_title( '<h1 class="lg:text-5xl text-4xl lg:mb-12 lg:mt-8 mb-6 mt-4 font-bold content-container">', '</h1>' ); ?>
        </header>

    </div>

	<div class="entry-content content-container lg:px-0 px-4">
        <div class="mb-12">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="w-full rounded-xl shadow">
        </div>
		<?php the_content(); ?>
	</div>

</article>
