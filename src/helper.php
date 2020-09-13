<?php

namespace isadmin\migration;

function vendor_path()
{
    static $path;

    if ($path) {
        return $path;
    }

    foreach (get_included_files() as $file) {
        if (false !== strrpos($file, 'vendor/autoload.php')) {
            return $path = dirname($file);
        }
    }

    return null;
}