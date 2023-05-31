<?php

/**
 * Single Project Categories Block Template.
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
$class_name = 'single-project-categories';
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
$currPost = get_queried_object_id();
$title = get_the_title($currPost);
$terms = get_the_terms($currPost, 'project-category');

if ($terms) : ?>

	<ul <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
		<?php foreach ($terms as $term) :
			$color = get_field('category_color', $term); ?>
			<li class="<?php echo $term->slug; ?>" style="color: <?php echo $color; ?>;">+ <?php echo $term->name; ?></li>
		<?php endforeach; ?>
	</ul>

<?php endif;
