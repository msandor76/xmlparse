<?php
define('APPDIR', realpath(__DIR__.'/../app/').'/');
define('SYSTEMDIR', realpath(__DIR__.'/../system/').'/');
define('PUBLICDIR', realpath(__DIR__).'/');
define('SYSTEM_ROOT', realpath(__DIR__.'/../').'/'); // ROOTDIR




/** load composer autoloader */
if (file_exists(SYSTEM_ROOT.'vendor/autoload.php')) {
    require SYSTEM_ROOT.'vendor/autoload.php';
} else {
    echo "Nincs, nem talalom az autoload fajlt!";
    exit;
}

if (!is_readable(APPDIR.'Config.php')) {
    die('No Config.php found.');
}


define('ENVIRONMENT', 'development');  // development, production

if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            break;
        case 'production':
            error_reporting(0);
            break;
        default:
            exit('The application environment is not set correctly.');
    }

}

/** initiate Alias */
new Core\Alias();
new App\Config();
require SYSTEM_ROOT.'app/routes.php';
