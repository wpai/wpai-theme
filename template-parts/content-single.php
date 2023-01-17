<article id="post-<?php the_ID(); ?>" class="">
    <div class="mx-auto max-w-6xl lg:px-0 px-4 grid lg:grid-cols-10 grid-cols-1 gap-14">
        <div class="col-span-7">
            <div class="py-3 lg:px-0 px-4">
                <header>
			        <?php the_title( '<h1 class="lg:text-4xl text-3xl lg:mb-12 lg:mt-8 mb-6 mt-4 font-bold content-container">', '</h1>' ); ?>
                </header>

            </div>

            <div class="content-container">
		        <?php the_content(); ?>
            </div>
        </div>
        <aside class="col-span-3 mt-16">
            <?php get_template_part('template-parts/sidebar') ?>
        </aside>
    </div>

</article>
