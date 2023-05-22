<?php

/**
 * Custom shortcodes.
 *
 * @package cindylau
 * @since 1.0.0
 */

/**
 * Register shortcodes
 *
 * @since 1.0.0
 *
 * @return void
 */

// Current Year
function cindylau_year($atts, $content = null)
{
	//Code
	$output = date('Y');
	return $output;
}
add_shortcode('year', 'cindylau_year');
