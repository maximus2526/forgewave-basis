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
		<div class="fwb-col-3">
			<?php
			if ( is_active_sidebar( 'main-sidebar' ) ) {
				dynamic_sidebar( 'main-sidebar');
			}
			?>
		</div>
		<div class="fwb-col-9">
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
