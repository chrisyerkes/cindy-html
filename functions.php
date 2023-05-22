<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cindylau
 * @since 1.0.0
 */

/**
 * The theme version.
 *
 * @since 1.0.0
 */
define('CINDYLAU_VERSION', wp_get_theme()->get('Version'));

if (!function_exists('cindylau_theme_setup')) {

	add_theme_support('editor-styles');
	add_editor_style('editor-styles.css');
}
add_action('after_theme_setup', 'cindylau_theme_setup');


/**
 * Enqueue the style.css file.
 * 
 * @since 1.0.0
 */
if (!function_exists('fse_styles')) {
	function fse_styles()
	{
		// wp_enqueue_style('splide-core', get_theme_file_uri('/assets/css/splide.min.css'), array(), '4.1.4');
		wp_enqueue_style(
			'fse-style',
			get_stylesheet_uri(),
			array(),
			CINDYLAU_VERSION
		);

		// wp_enqueue_script('sunfish-js', get_theme_file_uri('/assets/js/main.1f250b33.js'), array(), null, true);
		// wp_enqueue_script('splide-js', get_theme_file_uri('/assets/js/splide.min.js'), array(), '4.1.4', true);
		wp_enqueue_script('functions-js', get_theme_file_uri('/js/functions-dist.js'), array('splide-js'), '1.0.0', true);
	}
}
add_action('wp_enqueue_scripts', 'fse_styles');

if (!function_exists('fse_setup')) {
	function fse_setup()
	{
		add_theme_support('wp-block-styles');
	}
}
add_action('after_setup_theme', 'fse_setup');

// ACF Local JSON Sync
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path)
{
	$path = get_stylesheet_directory() . '/acf-json';

	return $path;
}

// Block variation example.
// require_once get_theme_file_path('inc/register-block-variations.php');

// Block style examples.
require_once get_theme_file_path('inc/register-block-styles.php');

// Custom block registration
require_once get_theme_file_path('inc/register-custom-blocks.php');

// Custom shortcodes
require_once get_theme_file_path('inc/register-shortcodes.php');

// Block pattern and block category examples.
// require_once get_theme_file_path('inc/register-block-patterns.php');

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more($more)
{
	return '...';
}
add_filter('excerpt_more', 'wpdocs_excerpt_more');
