<?php
/**
 * SideBar.php show sidebar
 *
 * @package  fwb
 */

?>
<?php

if ( is_active_sidebar( 'main-sidebar' ) ) {
	dynamic_sidebar( 'main-sidebar' );
}