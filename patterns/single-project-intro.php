<?php

/**
 * Title: Single Project Introduction
 * Slug: cindylau/single-project-intro
 * Categories: text, cindy-theme, heroes
 * Description: Displays a preformatted single project introduction block pattern.
 * Keywords: text, content, wrapper, group, single project, work
 * Block Types: core/group, core/columns, core/column, core/paragraph, core/post-title
 */
?>

<!-- wp:group {"className":"container is-style-cindylau-project-intro","layout":{"type":"default"}} -->
<div class="wp-block-group container is-style-cindylau-project-intro"><!-- wp:post-title {"level":1} /-->

	<!-- wp:columns -->
	<div class="wp-block-columns"><!-- wp:column {"width":"66.66%"} -->
		<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:paragraph -->
			<p></p>
			<!-- /wp:paragraph -->

			<!-- wp:acf/cindylau-single-project-categories {"name":"acf/cindylau-single-project-categories","mode":"preview"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"33.33%"} -->
		<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:paragraph -->
			<p><strong>CREDITS</strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><strong>AWARDS</strong></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->