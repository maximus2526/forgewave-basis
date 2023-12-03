<?php
/**
 * Theme functions
 *
 * @package fwb
 */

namespace fwb;

function include_theme_autoloader() {
	require get_template_directory() . '/vendor/autoload.php';
}

use fwb\activate\Activation;

include_theme_autoloader();


$activation = new Activation;

$activation->init();
