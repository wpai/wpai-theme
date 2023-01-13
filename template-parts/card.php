<a href="<?php echo get_the_permalink() ?>" class="flex flex-col space-y-4">
    <div>
        <!-- Thumbnail -->
        <?php if ( has_post_thumbnail() ) :
            the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover rounded-lg' ) );
        endif; ?>
    </div>
    <div>
        <!-- Title -->
        <span class="text-xl font-semibold"><?php the_title(); ?></span>
    </div>
    <div>
        <!-- Excerpt -->
        <span class="font-light"><?php the_excerpt(); ?></span>
    </div>
</a>