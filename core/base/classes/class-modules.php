<?php
/**
 * Class for creating modules.
 *
 * @package fwb
 */
namespace fwb;

class Modules {
	use Singleton;

	public function init() {
		$this->include_modules();
	}

	public function include_modules() {
		$modules_path = FWB_MODULES;
		$directories  = scandir( $modules_path );

		foreach ( $directories as $directory ) {
			$directory_path = $modules_path . '/' . $directory;

			if ( is_dir( $directory_path ) && strpos( $directory, '.' ) !== 0 ) {
				$files = scandir( $directory_path );

				foreach ( $files as $file ) {
					$file_path = $directory_path . '/' . $file;

					if ( pathinfo( $file, PATHINFO_EXTENSION ) === 'php' &&
						( strpos( $file, 'class-' ) === 0 || strpos( $directory, 'class-' ) === 0 )
					) {
						require_once $file_path;
					}
				}
			}
		}
	}
}

Modules::get_instance();
