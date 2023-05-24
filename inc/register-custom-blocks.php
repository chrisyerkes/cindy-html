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
}
add_action('init', 'cindylau_register_custom_blocks');
