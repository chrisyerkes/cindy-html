wp.blocks.registerBlockVariation('core/group', {
	name: 'container-fluid',
	title: 'Fluid Container',
	isDefault: true,
	attributes: {
		className: 'container-fluid is-style-page-content',
	},
});

wp.blocks.registerBlockVariation('core/group', {
	name: 'container',
	title: 'Container',
	attributes: {
		className: 'container is-style-page-content',
	},
});

wp.blocks.registerBlockVariation('core/group', {
	name: 'row',
	title: 'Row',
	attributes: {
		className: 'row',
	},
});
