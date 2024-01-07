<?php
/**
 * Template part for displaying a message when no posts are found.
 *
 * @package fwb
 */

namespace fwb;
?>

<article id="post-0" class="post no-results not-found fwb-no-results">

	<header class="entry-header">
		<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'fwb' ); ?></h1>
	</header>

	<div class="entry-content">
		<p><?php esc_html_e( 'Apologies, but no results were found for the requested archive.', 'fwb' ); ?></p>
	</div><!-- .entry-content -->

</article><!-- #post-0 -->
