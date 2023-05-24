<?php

/**
 * Block Variations
 *
 * @package cindylau
 * @since 1.0.0
 */

/**
 * This is an example of how to register a block variation.
 * Type /full or use the block inserter to insert a full width group block.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-variations/
 *
 * @since 1.0.0
 *
 * @return void
 */
function cindylau_register_block_variation()
{
	wp_enqueue_script(
		'cindylau-block-variations',
		get_template_directory_uri() . '/js/block-variations.js',
		array('wp-blocks'),
		CINDYLAU_VERSION,
		true
	);
}
add_action('enqueue_block_editor_assets', 'cindylau_register_block_variation');
