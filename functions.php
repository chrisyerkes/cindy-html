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
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);
	register_nav_menus(
		array(
			'top'    => __('Top Menu', 'cindylau'),
		)
	);
	add_theme_support('wp-block-styles');
	add_theme_support('block-template-parts');
	add_theme_support('responsive-embeds');
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
		wp_enqueue_style('fontawesome', 'https://kit.fontawesome.com/07e203ce75.js', array(), '1.0.0');
		wp_enqueue_style(
			'fse-style',
			get_stylesheet_uri(),
			array(),
			CINDYLAU_VERSION
		);

		wp_enqueue_script('bootstrap-js', get_theme_file_uri('/js/bootstrap.bundle.min.js'), array(), '5.3.0', true);
		// wp_enqueue_script('splide-js', get_theme_file_uri('/assets/js/splide.min.js'), array(), '4.1.4', true);
		wp_enqueue_script('functions-js', get_theme_file_uri('js/functions-dist.js'), array('bootstrap-js'), '1.0.0', true);
	}
}
add_action('wp_enqueue_scripts', 'fse_styles');

// ACF Local JSON Sync
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path)
{
	$path = get_stylesheet_directory() . '/acf-json';

	return $path;
}

// Block variation example.
require_once get_theme_file_path('inc/register-block-variations.php');

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

// Adding Bootstrap Menu Class to Items
add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
function special_nav_class($classes, $item)
{
	$classes[] = 'nav-item';
	return $classes;
}

// Adding Bootstrap Link Class to <a> Tags in Menu Items
function add_menu_atts($atts, $item, $args)
{
	$atts['class'] = 'nav-link';
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_atts', 10, 3);

// Custom TinyMCE Styles
// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2($buttons)
{
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// Reference this page for adding more styles: https://codex.wordpress.org/TinyMCE_Custom_Styles
// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats($init_array)
{
	// Define the style_formats array
	$style_formats = [
		// Each array child is a format with it's own settings
		[
			'title' => 'Rainbow Text',
			'inline' => 'span',
			'classes' => 'is-style-cindylau-rainbow-text',
			'wrapper' => true,
		]
	];
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode($style_formats);

	return $init_array;
}
// Attach callback to 'tiny_mce_before_init'
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');
