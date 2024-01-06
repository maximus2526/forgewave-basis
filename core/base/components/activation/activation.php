<?php
/**
 * ?FILE DESCRIPTION?
 *
 * @package fwb
 */
namespace fwb\Base\Components\Activation;
class Activation {
    use fwb\Base\Traits\Singleton;
    public function init() {
        var_dump('122Singleton as Singleton1213');
        wp_die();
    }
}



// Activation::get_instance();