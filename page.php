<?php
/**
 * Template file used to display individual pages on your website.
 *
 * @package fwb
 */
namespace fwb;

get_header();
?>
<div class="fwb-container">
	<div class="fwb-row">
		<?php get_sidebar() ?>
		<div class="fwb-content fwb-col-auto">
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
