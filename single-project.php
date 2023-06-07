<?php get_header();

$backLink = get_field('back_to_work_link', 'options');

if (have_posts()) :
	while (have_posts()) :
		the_post();
		the_content();
	endwhile;
else :
	echo '<p>No content found.</p>';
endif;

if ($backLink) :
	$url = $backLink['url'];
?>
	<div class="container-fluid back-to-work">
		<div class="mouse-pointer init">
			<a href="<?php echo $url; ?>">Back to <br>Work</a>
		</div>
	</div>
<?php endif;
get_footer();
