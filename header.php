<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

	<header class="py-4 bg-black text-white">
        <div class="mx-auto max-w-5xl lg:px-0 px-4">
				<div class="flex justify-between items-center">
                    <a href="/" class="flex flex-row space-x-2.5 items-center">
                        <img
                            src="<?php echo get_site_icon_url(); ?>"
                            class="w-10 h-auto"
                        >
                        <div class="font-semibold text-base">
                            <?php echo get_bloginfo( 'name' ); ?>
                        </div>
                    </a>
                    <div>
                        <a href="/blog/" class="text-white font-semibold">
                            Blog
                        </a>
                    </div>
			</div>
        </div>
	</header>

	<div>

		<?php do_action( 'tailpress_content_start' ); ?>

		<main>
