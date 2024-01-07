<?php
/**
 * Main file of a theme responsible for displaying content on the homepage of your website.
 *
 * @package fwb
 */

namespace fwb;

get_header();
?>

<div class="fwb-container">
	<div class="fwb-row">
		<?php get_sidebar(); ?>
		<div class="fwb-content fwb-col-auto">
			<header class="page-header alignwide">
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</header>
			<?php
			if ( have_posts() ) {
				// Load posts loop.
				while ( have_posts() ) {
					the_post();
					// Output your post content here.
					the_title('<h2>', '</h2>');
					the_content();
				}
			} else {
				// If no content, include the "No posts found" template.
				get_template_part( 'template-parts/content', 'none' );
			}
			?>
		</div>
	</div>
</div>

<?php
get_footer();
