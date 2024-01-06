<?php
/**
 * Template file used to display individual pages on your website.
 *
 * @package fwb
 */

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
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();

					the_content();


				endwhile;
			endif;

			?>
		</div>
	</div>
</div>

<?php
get_footer();
?>
