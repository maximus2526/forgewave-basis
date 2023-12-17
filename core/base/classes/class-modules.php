<?php
/**
 * Class for creating modules.
 *
 * @package fwb
 */

namespace fwb;

/**
 * Modules class.
 */
class Modules {
    use Singleton;

    /**
     * Initializes the modules.
     *
     * @return void
     */
    public function init() {
        $this->includeModules();
    }

    /**
     * Includes modules from the specified directory.
     *
     * @return void
     */
    public function includeModules() {
        $modulesPath = FWB_MODULES;
        $directories = scandir($modulesPath);

        foreach ($directories as $directory) {
            $directoryPath = $modulesPath . '/' . $directory;

            if (is_dir($directoryPath) && strpos($directory, '.') !== 0) {
                $files = scandir($directoryPath);
                $this->includeFiles($files, $directoryPath);
            }
        }
    }

    /**
     * Includes PHP files from the specified directory.
     *
     * @param array  $files          Array of files in the directory.
     * @param string $directoryPath  Path to the directory.
     *
     * @return void
     */
    public function includeFiles($files, $directoryPath) {
        foreach ($files as $file) {
            $filePath = $directoryPath . '/' . $file;

            if (pathinfo($file, PATHINFO_EXTENSION) === 'php' &&
                (strpos($file, 'class-') === 0 || strpos($directoryPath, 'class-') === 0)
            ) {
                require_once $filePath;
            }
        }
    }
}

// Instantiate the Modules class using the Singleton trait.
Modules::get_instance();
