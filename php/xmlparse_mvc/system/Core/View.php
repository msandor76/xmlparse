<?php


namespace Core;

use Helpers\Hooks;

/**
 * View class to load template and views files.
 */
class View
{
    /**
     * @var array Array of HTTP headers
     */
    private static $headers = array();

    /**
     * Include template file.
     *
     * @param  string $path  path to file from views folder
     * @param  array  $data  array of data
     * @param  array  $error array of errors
     */
    public static function render($path, $data = false, $error = false)
    {
        self::sendHeaders();

        //pass data to check and store it
        $data = self::dataLoadandConvert($data);

        foreach ($data as $name => $value) {
            ${$name} = $value;
        }

        require APPDIR."Views/$path.php";
    }
    
    // render cache esetén, ha használunk cache-t
    public static function renderCache($path, $data = false, $error = false){
		if ($data)
        {
            extract($data);
        }
		
        $cacheFile = 'cache/cache_' . str_replace('/', '_',  $path . '.php');
		$useCache = false;
		if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < CACHE_TIME && USE_CACHE == TRUE) {
			$useCache = true;
			$cacheLifetime = time() - filemtime($cacheFile);
		}

		if ($useCache) {
			//include($cacheFile);
			$content = file_get_contents($cacheFile);
		} else {
			self::sendHeaders();
			require APPDIR."Views/$path.php";
			$content = ob_get_contents();
			ob_end_clean();

			if (USE_CACHE == TRUE) {
				//write cache
				$fh = @fopen($cacheFile, 'w+');
				if ($fh) {
					fwrite($fh, $content);
					fclose($fh);
				} else {
					echo 'Cache write error!<br>';
				}
			}
		}  
		
		self::renderTemplate('header',$data);
		echo $content;
		self::renderTemplate('footer',$data);
		
    }// render END
    

    /**
     * Include template file.
     *
     * @param  string  $path  path to file from Modules folder
     * @param  array $data  array of data
     * @param  array $error array of errors
     */
    public static function renderModule($path, $data = false, $error = false)
    {
        self::sendHeaders();

        //pass data to check and store it
        $data = self::dataLoadandConvert($data);

        foreach ($data as $name => $value) {
            ${$name} = $value;
        }

        require APPDIR."Modules/$path.php";
    }

    /**
     * Return absolute path to selected template directory.
     *
     * @param  string  $path  path to file from views folder
     * @param  array   $data  array of data
     * @param  string  $custom path to template folder
     */
    public static function renderTemplate($path, $data = false, $custom = TEMPLATE)
    {
        self::sendHeaders();

        //pass data to check and store it
        $data = self::dataLoadandConvert($data);

        foreach ($data as $name => $value) {
            ${$name} = $value;
        }

        //require APPDIR."Templates/$custom/$path.php";
        require TEMPLATE_DIR."templates/$custom/$path.php";
    }

    /**
     * place hook calls into the relevant data array call
     * @param  array $data
     * @return array $data
     */
    public static function dataLoadandConvert($data)
    {
        $hooks = Hooks::get();
        $data['afterBody']  = $hooks->run('afterBody', $data['afterBody']);
        $data['css']        = $hooks->run('css', $data['css']);
        $data['js']         = $hooks->run('js', $data['js']);

        return $data;
    }

    /**
     * Add HTTP header to headers array.
     *
     * @param  string  $header HTTP header text
     */
    public function addHeader($header)
    {
        self::$headers[] = $header;
    }

    /**
     * Add an array with headers to the view.
     *
     * @param array $headers
     */
    public function addHeaders(array $headers = array())
    {
        self::$headers = array_merge(self::$headers, $headers);
    }

    /**
     * Send headers
     */
    public static function sendHeaders()
    {
        if (!headers_sent()) {
            foreach (self::$headers as $header) {
                header($header, true);
            }
        }
    }
}
