<?php
namespace App\Common;
use Core\Model;

class CategoryMenu extends Model{
	
	function __construct(){
		parent::__construct();
	}
	
	public function getCatMenu(){
		return array("itt a kategória menü");
	}
		
}





?>
