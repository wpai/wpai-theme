<?php
class SiteOptions {

	const GROUP = 'site_options';

	public static function register () {
		add_action('admin_menu', [self::class, 'addMenu']);
		add_action('admin_init', [self::class, 'registerSettings']);
	}

	public static function registerSettings () {
		register_setting(self::GROUP, 'site_description');
		add_settings_section('site_description_section', 'Site Options', function () {
			echo "Write a description for the theme, will be displayed on home page.";
		}, self::GROUP);
		add_settings_field('site_description_settings', "Description", function () {
			?>
			<textarea name="site_description" cols="30" rows="10" style="width: 100%"><?= esc_html(get_option('site_description')) ?></textarea>
			<?php
		}, self::GROUP, 'site_description_section');
	}

	public static function addMenu () {
		add_options_page("Site Options", "Site Options", "manage_options", self::GROUP, [self::class, 'render']);
	}

	public static function render () {
		?>
		<h1>Site Options</h1>

		<form action="options.php" method="post">
			<?php
			settings_fields(self::GROUP);
			do_settings_sections(self::GROUP);
			submit_button();
			?>
		</form>
		<?php
	}

}