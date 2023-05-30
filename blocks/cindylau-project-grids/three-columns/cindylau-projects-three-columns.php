<?php

/**
 * Three Column Project Block Template.
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
$class_name = 'grid project-grid project-grid-3-columns';
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
$projects = get_field('select_projects');
?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="--bs-gap: 1.25rem">
	<?php if ($projects) : foreach ($projects as $post) : setup_postdata($post);
			$id = $post->ID;
			$title = get_the_title($id);
			$link = get_the_permalink($id);
			$img = get_the_post_thumbnail($id, 'full', array('class' => 'img-fluid'));
			$terms = get_the_terms($id, 'project-category'); ?>
			<div class="g-col-12 g-col-lg-4 project">
				<?php if ($img) : ?>
					<div class="project-thumb">
						<?php echo $img; ?>
					</div>
				<?php endif; ?>
				<div class="project-info">
					<h3>
						<a href="<?php echo $link; ?>" class="stretched-link">
							<?php echo $title; ?>
							<i class="fa-solid fa-circle-arrow-right"></i></a>
					</h3>
					<?php if ($terms) : ?>
						<ul class="categories">
							<?php foreach ($terms as $term) :
								$color = get_field('category_color', $term); ?>
								<li class="<?php echo $term->slug; ?>" style="color: <?php echo $color; ?>;">+ <?php echo $term->name; ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
	<?php endforeach;
	endif; ?>
</div>