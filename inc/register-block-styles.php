<?php

/**
 * Block styles.
 *
 * @package cindylau
 * @since 1.0.0
 */

/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function cindylau_register_block_styles()
{

	register_block_style(
		'core/paragraph',
		array(
			'name'	=> 'cindylau-lead',
			'label'	=> __('Lead', 'cindylau'),
		)
	);
}
add_action('init', 'cindylau_register_block_styles');
