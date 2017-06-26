<?php
namespace App;

use Helpers\Session;

class Config
{
    /**
     * Executed as soon as the framework runs.
     */
    public function __construct()
    {
        /**
         * Turn on output buffering.
         */
        ob_start();

        /**
         * Define relative base path.
         */
        define('DIR', 'http://localhost/xmlparse_mvc/');// define('DIR', '/');
		define('SITEURL', 'http://localhost/xmlparse_mvc/public/');
		define('TEMPLATE_DIR', '');
		
		//define('ASSETS_DIR', '');
		
        /**
         * Set default controller and method for legacy calls.
         */
        //define('DEFAULT_CONTROLLER', 'welcome');
        //define('DEFAULT_METHOD', 'index');

        /**
         * Set the default template.
         */
        define('TEMPLATE', 'default');
        define('ADMINTEMPLATE', 'admin');// admin folder name, in view and template folder

        /**
         * Set a default language.
         */
        define('LANGUAGE_CODE', 'Hu');


        //database details ONLY NEEDED IF USING A DATABASE
        define('DB_TYPE', 'mysql');
        define('DB_HOST', 'localhost');
        define('DB_NAME', 'xml_parse'); // database name
        define('DB_USER', 'root'); // database user
        define('DB_PASS', '');// database password

        /**
         * PREFER to be used in database calls default is mvc_
         */
        define('PREFIX', '');

        /**
         * Set prefix for sessions.
         */
        define('SESSION_PREFIX', 'mvc_');

        /**
         * Optional create a constant for the name of the site.
         */
        define('SITETITLE', 'XML parse');

        /**
         * Optionall set a site email address.
         */
        //define('SITEEMAIL', '');
        
        // Simple cache
        define('USE_CACHE', false);//if this is true we use cache
		define('CACHE_TIME', 30);
        

        /**
         * Turn on custom error handling.
         */
        set_exception_handler('Core\Logger::ExceptionHandler');
        set_error_handler('Core\Logger::ErrorHandler');

        date_default_timezone_set('Europe/Budapest');//'Europe/London'

        Session::init();
    }
}
