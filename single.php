<?php
/**
 * Template file for displaying individual posts on your website.
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
			<?php
			if ( function_exists( 'is_product' ) && is_product() ) {
				woocommerce_content();
				comments_template();
			} elseif ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					?>
						<h2 class='title'>
						<?php the_title(); ?>
						</h2>
						<?php
						the_content();
						comments_template();
				}
			} else {
				get_template_part( 'template-parts/content/content-none' );
			}
			?>
		</div>
	</div>
</div>

<?php
get_footer();
?>
