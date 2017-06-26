<?php
namespace App\Controllers;

//use Helpers\HTMLPurifier;

use \Helpers\Session,
	\Helpers\Secu,
	\Helpers\Url,
	\Helpers\Database;

class Home extends \Core\Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$csrf = new \Maer\Security\Csrf\Csrf();
		//echo "token: ". $csrf->getToken()."<hr>";
		$data['csrf'] = $csrf;
		$data['title'] = 'Import-export';
		$data['metakey'] = '';
		$data['metadesc'] = '';

		if(USE_CACHE){
			\Core\View::renderCache('home/home',$data,$error);
		}
		else{
			\Core\View::rendertemplate('header',$data);
			\Core\View::render('home/home',$data,$error);
			\Core\View::rendertemplate('footer',$data);
		}
		
	}
	
	
}



?>
