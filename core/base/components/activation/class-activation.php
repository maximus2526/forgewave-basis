<?php
/**
 * ?FILE DESCRIPTION?
 *
 * @package fwb
 */
namespace fwb;
class Activation {
    use Singleton;
    public function init() {
        var_dump('1221213');
        wp_die();
    }
}



// Activation::get_instance();