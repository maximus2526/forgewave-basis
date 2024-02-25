<?php
/**
 * Main file of a theme responsible for displaying content on the homepage of your website.
 *
 * @package fwb
 */

namespace fwb;

global $post;

get_header();
?>

<div class="fwb-container">
	<div class="fwb-row">
		<?php get_sidebar(); ?>
		<div class="fwb-content fwb-col-auto">
			<?php if ( get_post_meta( $post->ID, 'fwb_hide_title_field', true  )): ?>
			<div class="fwb-page-header alignwide">
				<h1 class="fwb-page-title"><?php single_post_title(); ?></h1>
			</div>
			<?php
			endif;
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
