<?php

/**
 * Logo Row Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
	$anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'cindylau-logo-row';
if (!empty($block['className'])) {
	$class_name .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
	$class_name .= ' align' . $block['align'];
}

if (!empty($block['backgroundColor'])) {
	$class_name .= ' has-' . str_replace(' ', '-', $block['backgroundColor']) . '-background-color';
}

if (!empty($block['textColor'])) {
	$class_name .= ' has-' . str_replace(' ', '-', $block['textColor']) . '-color';
}

// Load values and assign defaults.
$logo = get_field('logo');
$desc = get_field('description');

$size = 'full'; ?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
	<?php if ($logo) : ?>
		<div class="row justify-content-between align-items-center">
			<div class="col-md-6 identity-image">
				<?php echo wp_get_attachment_image($logo['id'], $size, '', array('class' => 'img-fluid')); ?>
			</div>
			<div class="col-md-6 col-lg-5 identity-description">
				<?php if ($desc) : echo $desc;
				endif; ?>
			</div>
		</div>
	<?php endif; ?>

</div>