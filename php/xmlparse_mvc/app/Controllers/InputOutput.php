<?php
namespace App\Controllers;

//use Helpers\HTMLPurifier;

use \App\Common\PublicController,
    \Helpers\Session,
	\Helpers\Secu,
	\Helpers\Url,
	\Helpers\Database,
	\Maer\Security\Csrf\Csrf;

class InputOutput extends PublicController{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$csrf = new \Maer\Security\Csrf\Csrf();
		echo "token: ". $csrf->getToken()."<hr>";
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
	
	public function xmlimport(){
		$csrf = new \Maer\Security\Csrf\Csrf();
		if ($csrf->validateToken($_POST['csrftoken'])) {
			//It's a valid token!";
			$this->productModel->truncateTable("products");
			$this->productModel->truncateTable("products_relproducts_xref");
			
			$xmlObj = simplexml_load_file("doc/products.xml");

			foreach($xmlObj as $key=>$val){
				$data = array(
					'product_id' => $val->Id ,
					'name' => $val->Name
				);
				$lastId = $this->productModel->insertProduct($data);
				
				$relIdCount = count($val->RelId);
				if($relIdCount >0){
					// we have relId
					for($i=0; $i<$relIdCount; $i++){
						$this->productModel->insertProductRelIdXref($lastId, $val->RelId[$i]);
					}
				}
				
			}
			
			
		} else {
			echo "That token isn't valid!";
		}
		\Core\View::rendertemplate('header',$data);
		\Core\View::render('InputOutput/input',$data,$error);
		\Core\View::rendertemplate('footer',$data);
		//exit;
	}
	
	
	public function csvimport(){
		$csrf = new \Maer\Security\Csrf\Csrf();
		if ($csrf->validateToken($_POST['csrftokencsv'])) {
			//It's a valid token!";
			$this->productModel->truncateTable("products");
			$this->productModel->truncateTable("products_relproducts_xref");
			$filename = "doc/products.csv";//"valami.csv";
			$fileArr = file($filename);
			$delimiter =  ";"; // tab delimiter: "\t";
			
			foreach($fileArr as $key=>$val ){
				if($key>0){
					$rowArr = explode($delimiter,$val);
					$rowDataCount = count($rowArr); 
					$id = intval($rowArr[0]);//id
					$name = $rowArr[1];//name
					
					$data = array(
						'product_id' => $id ,
						'name' => $name
					);
					$lastId = $this->productModel->insertProduct($data);
					
					for($i=2;$i<$rowDataCount;$i++){
						//echo(intval($rowArr[$i])."|");//relid1..2..3
						$relid = intval($rowArr[$i]);
						if($relid>0)$this->productModel->insertProductRelIdXref($lastId, $relid );
					}
				}
			}
			
		} else {
			echo "That token isn't valid!";
		}
		\Core\View::rendertemplate('header',$data);
		\Core\View::render('InputOutput/input',$data,$error);
		\Core\View::rendertemplate('footer',$data);
		//exit;
	}
	
	
	
}



?>
