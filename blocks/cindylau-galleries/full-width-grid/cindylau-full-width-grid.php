<?php

/**
 * Full Width Gallery Grid Block Template.
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
$class_name = 'container-fluid cindylau-full-width-gallery-grid';
if (!empty($block['className'])) {
	$class_name .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
	$class_name .= ' align' . $block['align'];
}

if (!empty($block['backgroundColor'])) {
	$class_name .= ' has-' . str_replace(' ', '-', $block['backgroundColor']) . '-background-color';
}

$customBGHex = $block['style']['color']['background'] ? 'background-color: ' . $block['style']['color']['background'] . ';' : '';

if (!empty($block['textColor'])) {
	$class_name .= ' has-' . str_replace(' ', '-', $block['textColor']) . '-color';
}

// Load values and assign defaults.
$itemsPerRow = get_field('items_per_row');
$itemClass = $itemsPerRow === 'two' ? 'g-col-6' : 'g-col-6 g-col-md-4';
$itemGap = get_field('item_gap');
$itemGapREM = $itemGap / 16 . 'rem';
$gapStyle = $itemGap > 0 ? ' style="--bs-gap: ' . $itemGapREM . ';' . $customBGHex . 'padding-top: ' . $itemGapREM . '; padding-bottom: ' . $itemGapREM . ';"' : ' style="--bs-gap: 0;' . $customBGHex . '"';
$images = get_field('gallery_items');
$size = 'full'; ?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" <?php echo $gapStyle; ?>>
	<?php if ($images) : ?>
		<div class="gallery-items-wrap grid">
			<?php foreach ($images as $image) : ?>
				<div class="gallery-item <?php echo $itemClass; ?>">
					<div class="gallery-item-wrap">
						<?php echo wp_get_attachment_image($image['id'], $size, "", array('class' => 'img-fluid')); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

</div>