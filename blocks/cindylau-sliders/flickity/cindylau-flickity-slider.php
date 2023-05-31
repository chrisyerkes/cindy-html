<?php

/**
 * Flickity Slider Block Template.
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
$class_name = 'block-carousel-wrapper';
if (!empty($block['className'])) {
	$class_name .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
	$class_name .= ' align' . $block['align'];
}

if (!empty($block['backgroundColor'])) {
	$className .= ' has-' . str_replace(' ', '-', $block['backgroundColor']) . '-background-color';
}

if (!empty($block['textColor'])) {
	$className .= ' has-' . str_replace(' ', '-', $block['textColor']) . '-color';
}

// Load values and assign defaults.
$images = get_field('slider_images');
$size = 'large'; ?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
	<?php if ($images) : ?>
		<div class="block-carousel">
			<?php foreach ($images as $image) : ?>
				<div class="carousel-cell">
					<?php if ($image['mime_type'] === 'video/mp4') : ?>
						<div class="video-wrapper">
							<video controls>
								<source src="<?php echo $image['url']; ?>" type="video/mp4" />
								<p>Your browser doesn't support HTML video. Here is a <a href="<?php echo $image['url']; ?>" target="_blank">link</a> to download the video instead.</p>
							</video>
						</div>
					<?php else : ?>
						<?php echo wp_get_attachment_image($image['id'], $size); ?>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

</div>