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
		'core/group',
		array(
			'name'	=> 'cindylau-page-content',
			'label'	=> __('Content Wrapper', 'cindylau'),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name'	=> 'cindylau-instagram',
			'label'	=> __('Instagram Icon', 'cindylau'),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name'	=> 'cindylau-linkedin',
			'label'	=> __('Linkedin Icon', 'cindylau'),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name'	=> 'cindylau-email',
			'label'	=> __('Email Icon', 'cindylau'),
		)
	);

	register_block_style(
		'core/list-item',
		array(
			'name'	=> 'cindylau-instagram',
			'label'	=> __('Instagram Color', 'cindylau'),
		)
	);

	register_block_style(
		'core/list-item',
		array(
			'name'	=> 'cindylau-linkedin',
			'label'	=> __('Linkedin Color', 'cindylau'),
		)
	);

	register_block_style(
		'core/list-item',
		array(
			'name'	=> 'cindylau-email',
			'label'	=> __('Email Color', 'cindylau'),
		)
	);

	register_block_style(
		'core/list',
		array(
			'name'	=> 'cindylau-social-nav-big-text',
			'label'	=> __('Big Text', 'cindylau'),
		)
	);
}
add_action('init', 'cindylau_register_block_styles');
