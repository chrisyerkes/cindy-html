<?php

/**
 * Badge Hero Block Template.
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
$class_name = 'white-wave-header big-hero about-hero';
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
$heroCopy = get_field('hero_copy');
?>
<section <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
	<div class="container">
		<div class="row align-items-start">
			<div class="col-lg-3 badge-container">
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_branding.svg" class="svg badge01" alt="Branding" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_web-ui-design.svg" class="svg badge02" alt="Web + UI Design" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_education.svg" class="svg badge03" alt="Education" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_print-design.svg" class="svg badge04" alt="Print Design" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_bear.svg" class="svg badge05" alt="Bear" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_bdays.png" class="svg badge06" alt="Remembers B-Days" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_runner.svg" class="svg badge07" alt="Long Distance Runner" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_rocket.svg" class="svg badge08" alt="Rocket" />
			</div>
			<div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
				<div class="logo-container">
					<div class="logo-background-shape">
						<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" class="main-logo" viewBox="0 0 800 799.99">
							<circle cx="400" cy="400" r="400" style="fill: #2a2927" />
							<path d="M467.19 586.01c-8.85 0-17.24.04-25.63-.07-.64 0-1.54-.94-1.86-1.65-11.31-24.7-22.57-49.43-33.83-74.15-5.79-12.7-11.59-25.4-17.39-38.09-.19-.41-.45-.78-.85-1.46-9.33 13.25-14.94 27.76-18.22 43.54 2.37-.14 4.56-.37 6.75-.39 17.1-.2 30.58 10.3 34.54 26.86 3.4 14.19-6.72 28.97-21.81 31.86-14.89 2.86-29.89-4.62-37.39-18.63l-1.56-2.91c-1.91 2.42-3.73 4.6-5.41 6.88-5.72 7.75-9.65 16.33-11.74 25.71-.41 1.84-1.07 2.61-3.11 2.57-6.8-.14-13.6-.05-20.79-.05.46-2.09.79-3.87 1.25-5.61 4.91-18.74 13.4-35.47 27.73-48.89 1.36-1.27 2.63-2.73 4.21-3.66 2.83-1.67 3.53-4.16 3.85-7.17 2.72-25.12 11.74-47.67 27.41-67.63 2.88-3.67 5.74-5.33 10.45-4.99 6.32.45 12.69.15 19.04.08 1.6-.02 2.45.44 3.15 1.99 19.88 44.11 39.82 88.19 59.74 132.27.45 1 .84 2.04 1.47 3.59Zm-98.32-48.3c1.86 5.28 4.27 10.09 9.83 12.46 3.23 1.38 7.92.36 9.49-1.97 1.39-2.06.66-5.14-1.93-8.09-4-4.56-10.56-5.52-17.39-2.4Zm101.22-77.99c2.35 4.14 5.66 7.79 8.84 11.4 2.91 3.3 3.06 4.48-.13 7.65-1.19 1.19-2.38 2.37-3.52 3.6-10.71 11.5-10.66 27.02.12 38.46 1.15 1.22 2.27 2.5 3.58 3.54 2.39 1.91 2.43 4.11 1.36 6.72-1.76 4.3-3.54 8.61-5.04 13-3.45 10.08-.43 19.58 7.68 24.57 4.38 2.7 9.22 4.05 14.31 4.34 8.03.47 14.28 3.83 18.52 10.75.82 1.34 1.83 2.59 2.85 3.8 8.77 10.35 22.09 11.03 31.68 1.46 2.35-2.35 4.22-5.2 6.27-7.85 3.41-4.42 7.82-7.07 13.42-7.7 2.5-.28 4.99-.64 7.48-1.05 14.89-2.42 22.21-14.15 17.65-28.49-1.24-3.89-3-7.61-4.55-11.4-2.02-4.97-1.97-5.29 1.75-9.04.99-.99 2.02-1.94 2.95-2.98 7.86-8.79 10.33-18.81 5.37-29.65-2.03-4.43-5.72-8.17-9.01-11.92-3.02-3.44-3.17-4.68-.05-7.93 2.5-2.62 5.05-5.27 7.1-8.23 2.93-4.24 4.53-9.01 4.24-14.49-7.52 0-14.7-.03-21.87.05-.68 0-1.55.58-1.98 1.15-2.85 3.79-5.77 7.56-8.37 11.52-5.59 8.53-6.82 17.58-1.48 26.59 2.33 3.93 5.84 7.18 8.89 10.67 2.11 2.42 2.16 4.25-.1 6.56-1.11 1.13-2.26 2.22-3.39 3.34-8.87 8.84-10.87 19.15-6.52 30.76 1.3 3.46 2.74 6.88 4.23 10.62-7.43 1.47-15.07 1.24-21.74 5.13-6.76 3.94-10.44 10.72-14.88 15.99-5.31-5.38-10.04-11.22-15.81-15.73-6.1-4.78-14.33-3.87-21.88-5.46 1.36-3.32 2.6-6.32 3.83-9.32 4.38-10.7 3.59-20.72-4.05-29.78-1.38-1.63-2.94-3.13-4.48-4.61-3.53-3.41-3.55-5.05-.01-8.56 1.32-1.31 2.73-2.55 3.94-3.97 7.02-8.23 9.94-17.46 4.79-27.55-3.02-5.92-7.31-11.2-11.08-16.73-.25-.37-.94-.63-1.43-.64-7.26-.04-14.52-.03-22.91-.03 1.22 4.27 1.63 8.24 3.43 11.41Zm-273.32 126.1h101.8v-22.47h-3.74c-28.38 0-42.16-.05-70.54.07-2.88.01-3.55-.76-3.55-3.57.1-35.95.06-71.89.06-107.84v-3.69h-24.04v137.49Zm129.97-174.11V304.24c.89 1.13 1.36 1.67 1.75 2.25 13.01 18.98 26.01 37.95 39 56.94 10.63 15.53 21.21 31.08 31.9 46.57.63.91 1.98 1.87 3.01 1.88 9.43.14 18.86.08 28.29.06.43 0 .87-.18 1.35-.29V274.33h-24.19v107.6c-.95-1.26-1.42-1.82-1.83-2.42-7.1-10.38-14.19-20.77-21.28-31.15-16.3-23.83-32.63-47.65-48.87-71.52-1.34-1.97-2.71-2.84-5.19-2.79-8.3.18-16.62.07-24.93.07h-3.14v137.59h24.11Zm133.62.26V274.4c.79-.1 1.49-.26 2.2-.26 20.08-.15 40.15-.35 60.23-.4 14.43-.04 27.93 3.44 39.99 11.53 13.76 9.23 22.58 22.06 26.59 38.04 4.86 19.34 3.31 38.13-6.6 55.68-10.83 19.2-27.9 29.77-49.44 32.64-9.74 1.29-19.74.7-29.62.71-13.45.01-26.89-.23-40.34-.36h-3.01Zm24.17-69.2v43.32c0 1.45-.13 2.74 2.05 2.76 13.06.15 26.16 1.07 39.18.44 15.77-.76 28.05-8.35 35.84-22.32 5.46-9.78 6.84-20.41 5.4-31.37-1.16-8.82-4.29-16.94-10.16-23.8-9.03-10.57-20.79-15.13-34.43-15.13-11.58 0-23.15.44-34.73.48-2.7.01-3.21.97-3.19 3.41.1 14.07.05 28.14.05 42.2Zm-275.29-20.45c-1.65-20.86-12.67-35.35-31-44.53-14.4-7.21-29.85-9.29-45.75-7.45-23.39 2.7-41.04 14.41-51.7 35.35-11.1 21.8-11.65 44.68-3.27 67.43 7.22 19.61 21.02 33.28 41.19 39.64 19.15 6.04 38.14 4.59 56.59-3.15 12.72-5.34 22.66-13.92 28.85-26.42 3.51-7.09 5.28-14.6 5.14-22.7h-24.75c-.09.35-.21.61-.22.87-.73 10.73-5.86 18.82-14.83 24.59-6.65 4.29-14.06 6.25-21.85 7.11-18.32 2.03-35.38-5.21-44.36-22.18-8.49-16.04-8.93-32.84-2.77-49.71 4.62-12.65 13.34-21.7 26.23-26.1 11.35-3.88 22.8-3.02 34.04.84 7.5 2.58 13.83 6.86 18.43 13.45 3.39 4.86 4.74 10.39 5.25 16.25h24.79c0-1.27.07-2.28-.01-3.28Zm528.52-48.16c0 7.58.03 14.83-.06 22.07 0 .46-.83 1.29-1.31 1.32-14.52.92-23.07 8.05-33.78 16.99-6.91 5.77-13.19 12.29-19.72 18.44 3.83 5.79 7.46 10.84 10.64 16.16 6.66 11.13 12.08 22.76 11.48 36.16-.41 9.37-2.77 18.06-10.69 24.19-4.14 3.2-8.9 4.99-14.04 5.85-8.57 1.43-17.12 1.42-25.55-.74-12.11-3.1-19.38-11.49-21.32-23.82-1.91-12.16.41-23.6 6.05-34.31 4.11-7.8 8.92-15.23 13.74-23.36-15.05-16.28-27.79-32.33-52.27-36.01v-22.82c5.15-.37 6.94.59 11.86 1.99 15.82 4.49 28.95 13.57 41.01 24.31 4.99 4.44 9.42 9.51 14.32 14.51 10.03-10.95 20.45-20.61 32.72-28.1 12.23-7.47 21.95-12.84 36.92-12.83Zm-69.27 80.1c-2.96 5.1-5.58 9.58-8.17 14.08-.69 1.21-1.42 2.42-1.91 3.72-.72 1.91-1.41 3.86-1.81 5.85-1.71 8.54 1.65 13.81 9.58 14.72 2.55.29 5.23.08 7.77-.37 4.99-.9 7.64-3.87 7.48-8.88-.1-3.18-.55-6.63-1.93-9.43-3.23-6.56-7.12-12.81-11.02-19.68Zm-416.21-79.28c-.44 0-.96.12-1.32.37-4.46 3.05-9.15 5.83-13.29 9.26-12.23 10.14-12.17 25.73.09 35.81 3.15 2.59 6.76 4.63 10.22 6.81 4.04 2.55 4.04 2.79-.12 5.35-3.09 1.9-6.25 3.74-9.16 5.9-13.39 9.93-13.55 27.1-.34 37.26 2.94 2.26 6.24 4.06 9.36 6.1 1.2.78 2.35 1.63 3.86 2.68-5.46 3.88-10.64 7.16-15.37 11.01-4.99 4.05-7.33 9.63-7.62 16.4 7.48 0 14.74 0 21.99-.02.44 0 .94-.18 1.3-.43 4.63-3.29 9.54-6.27 13.8-9.99 10.4-9.07 10.46-24.2.17-33.42-3.36-3.01-7.45-5.22-11.14-7.88-1.23-.89-2.27-2.03-3.39-3.06 1.11-.92 2.16-1.94 3.35-2.75 3.01-2.03 6.25-3.75 9.09-5.99 13.05-10.26 12.99-27-.11-37.21-2.63-2.05-5.61-3.66-8.37-5.56-1.4-.97-2.65-2.14-3.97-3.22 1.36-1.07 2.69-2.18 4.08-3.21 3.81-2.81 7.9-5.3 11.39-8.46 4.45-4.02 6.63-9.31 6.57-15.76-7.3 0-14.19 0-21.09.02Z" style="fill: #bddcf2" />
						</svg>
					</div>
				</div>
				<?php if ($heroCopy) {
					echo $heroCopy;
				} ?>
			</div>
			<div class="col-lg-3 badge-container">
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_gemini.svg" class="svg badge09" alt="Gemini" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_illustration.svg" class="svg badge10" alt="Illustration" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_packaging.svg" class="svg badge11" alt="Packaging" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_art-direction.svg" class="svg badge12" alt="Art Direction" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_whale.svg" class="svg badge13" alt="Whale" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_social-media.svg" class="svg badge14" alt="Social Media" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_movie-buff.svg" class="svg badge15" alt="Movie Buff" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_motion-graphics.svg" class="svg badge16" alt="Motion Graphics" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/badge_food.svg" class="svg badge17" alt="Food MM" />
			</div>
		</div>
	</div>
</section>