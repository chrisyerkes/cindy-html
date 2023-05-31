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

	// Home Hero
	register_block_type(get_stylesheet_directory() . '/blocks/cindylau-home-hero/block.json');

	// Badge Hero
	register_block_type(get_stylesheet_directory() . '/blocks/cindylau-badge-hero/block.json');

	// Project Category List
	register_block_type(get_stylesheet_directory() . '/blocks/cindylau-lists/single-project-categories/block.json');

	// 3 Project Grid
	register_block_type(get_stylesheet_directory() . '/blocks/cindylau-project-grids/three-columns/block.json');

	// 2 Project Grid
	register_block_type(get_stylesheet_directory() . '/blocks/cindylau-project-grids/two-columns/block.json');

	// Flickity Slider
	register_block_type(get_stylesheet_directory() . '/blocks/cindylau-sliders/flickity/block.json');
}
add_action('init', 'cindylau_register_custom_blocks');
