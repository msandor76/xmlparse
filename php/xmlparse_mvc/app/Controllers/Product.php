<?php
namespace App\Controllers;

//use Helpers\HTMLPurifier;

use \App\Common\PublicController,
    \Helpers\Session,
	\Helpers\Secu,
	\Helpers\Url,
	\Helpers\Database;

//   \App\Common\PublicController
class Product extends PublicController{ //   \Core\Controller
	private $products = array();
	
	public function __construct(){
		parent::__construct();
		//$this->productModel = new \Models\ProductModel();
		$this->products = $this->productModel->getProducts();		
	}
	
	public function index(){
		$data['title'] = 'Termékek listája';
		$data['metakey'] = '';
		$data['metadesc'] = '';
		$data['products'] = $this->products;
		
		if(USE_CACHE){
			\Core\View::renderCache('home/home',$data,$error);
		}
		else{
			\Core\View::rendertemplate('header',$data);
			\Core\View::render('Product/productlist',$data,$error);
			\Core\View::rendertemplate('footer',$data);
		}
		
	}
	
	public function productsList(){
		$data['title'] = 'Termékek listája';
		$data['metakey'] = '';
		$data['metadesc'] = '';
		$data['products'] = $this->products;
		
		if(USE_CACHE){
			\Core\View::renderCache('home/home',$data,$error);
		}
		else{
			\Core\View::rendertemplate('header',$data);
			\Core\View::render('Product/productlist',$data,$error);
			\Core\View::rendertemplate('footer',$data);
		}
		
	}
	
	
}



?>
