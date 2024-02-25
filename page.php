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
			<?php if ( get_post_meta( $post->ID, 'fwb_hide_title_field', true  )): ?>
			<h1 class="fwb-page-title"><?php single_post_title(); ?></h1>
			<?php
			endif;

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
