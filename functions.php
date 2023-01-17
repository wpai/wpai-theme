<?php

/**
 * Theme setup.
 */

require_once "translations.php";

function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );


/**
 *
 *
 *  CUSTOM
 *
 */

require_once("options/site.php");
SiteOptions::register();


/**
 * Add custom css file
*/

function add_custom_css() {
	wp_enqueue_style( 'add_custom_css', get_stylesheet_directory_uri() . '/css/custom.css', false );
}
add_action( 'wp_enqueue_scripts', 'add_custom_css' );


/**
 * Add alpinejs
*/
function add_alpinejs() {
	wp_enqueue_script( 'add_alpinejs', 'https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.5/cdn.js', false );
}
add_action( 'wp_enqueue_scripts', 'add_alpinejs' );


/*
 * Custom excerpt length
 */
function wpdocs_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


/*
 *
 * Set Permalink
 *
 */

add_action( 'init', function() {
	global $wp_rewrite;
	$wp_rewrite->set_permalink_structure( '/%postname%/' );
} );


/**
 * Create "Sitemap" page on theme activation
 */
function create_sitemap_page() {
	$page_title = 'Sitemap';
	$page_content = '';
	$page_check = get_page_by_title($page_title);
	$page = array(
		'post_type' => 'page',
		'post_title' => $page_title,
		'post_content' => $page_content,
		'post_status' => 'publish',
		'post_author' => 1,
	);
	if(!isset($page_check->ID)){
		$page_id = wp_insert_post($page);
	}
}
add_action('after_switch_theme', 'create_sitemap_page');

/**
 * Delete "Sitemap" page on theme deactivation
 */
function delete_sitemap_page() {
	$page_title = 'Sitemap';
	$page_check = get_page_by_title($page_title);
	if(isset($page_check->ID)){
		wp_delete_post($page_check->ID, true);
	}
}
add_action('switch_theme', 'delete_sitemap_page');

/**
 * Delete sample page on theme activation
 */
function delete_sample_page() {
	$page_title = 'Sample Page';
	$page_check = get_page_by_title($page_title);
	if(isset($page_check->ID)){
		wp_delete_post($page_check->ID, true);
	}
}
add_action('after_switch_theme', 'delete_sample_page');

/**
 * Create "blog" page on theme activation
 */
function create_blog_page() {
	$page_title = 'Blog';
	$page_content = '';
	$page_check = get_page_by_title($page_title);
	$page = array(
		'post_type' => 'page',
		'post_title' => $page_title,
		'post_content' => $page_content,
		'post_status' => 'publish',
		'post_author' => 1,
	);
	if(!isset($page_check->ID)){
		$page_id = wp_insert_post($page);
	}
}
add_action('after_switch_theme', 'create_blog_page');

/**
 * Delete "Blog" page on theme deactivation
 */
function delete_blog_page() {
	$page_title = 'Blog';
	$page_check = get_page_by_title($page_title);
	if(isset($page_check->ID)){
		wp_delete_post($page_check->ID, true);
	}
}
add_action('switch_theme', 'delete_blog_page');

/*
 * Setup seopress meta on theme activation
 */
function seopress_setup() {
	// Get seopress_titles_option_name array from wp_options table
	$seopress_titles_option_name = get_option('seopress_titles_option_name');
	// Update seopress_titles_single_titles post
	$seopress_titles_option_name['seopress_titles_single_titles']['post']["title"] = '%%post_title%%';
	// Update seopress_titles_single_titles page
	$seopress_titles_option_name['seopress_titles_single_titles']['page']["title"] = '%%post_title%%';
	// Update seopress_titles_option_name array in wp_options table
	update_option('seopress_titles_option_name', $seopress_titles_option_name);


	$sitemap_options = get_option("seopress_xml_sitemap_option_name");
	// Remove seopress_xml_sitemap_taxonomies_list from options and update
	unset($sitemap_options['seopress_xml_sitemap_taxonomies_list']);
	update_option('seopress_xml_sitemap_option_name', $sitemap_options);
}
add_action( 'after_switch_theme', 'seopress_setup' );


/*
 *
 * Add rel="noreferer" to external links
 *
 *
 */
function add_noreferrer_attributes( $content ) {
	$pattern = '/<a(.*?)href="(.*?)"(.*?)>/i';
	$replacement = '<a$1href="$2" rel="noreferrer noopener"$3>';
	return preg_replace( $pattern, $replacement, $content );
}
add_filter( 'the_content', 'add_noreferrer_attributes' );



/*
 *
 *
 *
 * Handle Custom Country Code
 *
 *
 */


function country_code_options_page() {
	add_options_page(
		'Country Code Options',
		'Country Code Options',
		'manage_options',
		'country-code-options',
		'country_code_options_page_html'
	);
}
add_action('admin_menu', 'country_code_options_page');

function country_code_options_page_html() {
	// Check user capabilities
	if (!current_user_can('manage_options')) {
		return;
	}
	?>
	<div class="wrap">
		<h1><?= esc_html(get_admin_page_title()); ?></h1>
		<form action="options.php" method="post">
			<?php
			// Output nonce, action, and option_page fields for a settings page
			settings_fields('country_code_options');
			do_settings_sections('country-code-options');
			submit_button();
			?>
		</form>
	</div>
	<?php
}

function country_code_options_page_init() {
	register_setting(
		'country_code_options',
		'country_code',
	);

	add_settings_section(
		'country_code_options_section',
		'Country Code Options',
		'country_code_options_section_html',
		'country-code-options'
	);

	add_settings_field(
		'country_code',
		'Country Code',
		'country_code_options_field_html',
		'country-code-options',
		'country_code_options_section'
	);
}
add_action('admin_init', 'country_code_options_page_init');

function country_code_options_section_html() {
	echo '<p>Select a country code from the list below</p>';
}

function country_code_options_field_html() {
	$options = get_option('country_code');
	?>
	<select name="country_code">
		<option value=""></option>
		<option value="FR" <?php selected($options, 'FR'); ?>>FR</option>
		<option value="DE" <?php selected($options, 'DE'); ?>>DE</option>
		<option value="ES" <?php selected($options, 'ES'); ?>>ES</option>
		<option value="IT" <?php selected($options, 'IT'); ?>>IT</option>
		<option value="CZ" <?php selected($options, 'CZ'); ?>>CZ</option>
		<option value="PL" <?php selected($options, 'PL'); ?>>PL</option>
		<option value="FI" <?php selected($options, 'FI'); ?>>FI</option>
		<option value="NL" <?php selected($options, 'NL'); ?>>NL</option>
		<option value="PT" <?php selected($options, 'PT'); ?>>PT</option>
		<option value="SK" <?php selected($options, 'SK'); ?>>SK</option>
	</select>
	<?php
}



/*
 * Remove hello world post
 */
function remove_hello_world_post() {
    $hello_world_post = get_page_by_title('Hello world!', OBJECT, 'post');
    wp_delete_post($hello_world_post->ID, true);
}
add_action('after_switch_theme', 'remove_hello_world_post');


/*
 * Set permalink structure
 */
function set_permalink_structure() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
}
add_action('after_switch_theme', 'set_permalink_structure');

/*
 * Force rewrite
 */
add_filter( 'got_rewrite', '__return_true', 999 );


/*
 * Get country code
 */
function get_country_code() {
	return get_option('country_code');
}

function get_translation($key) {
    global $theme_translations;
    return $theme_translations[get_country_code()][$key];
}