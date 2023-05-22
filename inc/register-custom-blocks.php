<?php

/**
 * Custom blocks.
 *
 * @package cindylau
 * @since 1.0.0
 */

/**
 * Register custom blocks
 *
 * @since 1.0.0
 *
 * @return void
 */
function cindylau_register_custom_blocks()
{

	// Custom YouTube embed block
	// register_block_type(get_stylesheet_directory() . '/blocks/cindylau-testimonials-slider/block.json');

}
add_action('init', 'cindylau_register_custom_blocks');
