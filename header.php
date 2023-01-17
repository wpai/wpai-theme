<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

	<header class="py-4 bg-blue-100 text-black">
        <div class="mx-auto max-w-6xl lg:px-0 px-4">
				<div class="flex justify-between items-center">
                    <a href="/" class="flex flex-row space-x-2.5 items-center">
	                    <?php
	                    $custom_logo_id = get_theme_mod( 'custom_logo' );
	                    if ( ! empty( $custom_logo_id ) ) {
		                    ?>
                            <img
                                src="<?php echo wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' )[0]; ?>"
                                class="w-auto h-8"
                            >
                            <?php
	                    } else {
		                    ?>
                                <div class="font-semibold uppercase">
                                    <?php echo get_bloginfo( 'name' ); ?>
                                </div>
                            <?php
	                    }
	                    ?>

                    </a>
			</div>
        </div>
	</header>

	<div>

		<?php do_action( 'tailpress_content_start' ); ?>

		<main>
