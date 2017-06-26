<?php
namespace App\Common;

use Core\Controller;
//use Core\Model;
use App\Common\CategoryMenu;
use App\Models\ProductModel;

class PublicController extends Controller{
	protected $catMenuCommon;
	protected $productModel;
	
	function __construct(){
		parent::__construct();
		$this->productModel = new ProductModel(); //  $this->productModel = new \Models\ProductModel();
        $this->catMenuCommon = new CategoryMenu();
	}
	
	
		
}





?>
