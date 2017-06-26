<?php 
namespace App\Models;

use Core\Model;

class ProductModel extends Model 
{    
    function __construct(){
        parent::__construct();
    }  
    
    public function getProduct($id){
		return $this->db->select('SELECT * FROM '.PREFIX.'products WHERE product_id = :id', array(':id' => $id));
	}
		
	public function getProducts(){
		return $this->db->select('SELECT * FROM '.PREFIX.'products');
	}
	
	public function getAccessories($productId){
		$accessoires = array();
		$result = $this->db->select('SELECT * FROM '.PREFIX.'products_relproducts_xref WHERE product_id = :id', array(':id' => $productId));
		if(count($result) > 0){
			foreach($result as $res){
				$row = $this->getProduct($res->relid);
				array_push($accessoires, $row);
			}
		}
		return $accessoires;
	}
	
	public function insertProduct($data){
		// customer_login_attempts
		//$data = array('name' => 'valaki');
		$last_id = $this->db->insert(PREFIX."products", $data );
		return $last_id;
	}
	
	public function insertProductRelIdXref($product_id, $relId){
		// customer_login_attempts
		$data = array(
			'product_id' => (int)$product_id,
			'relid' => (int)$relId
			);
		$last_id = $this->db->insert(PREFIX."products_relproducts_xref", $data );
		return $last_id;
	}
	
	public function truncateTable($table){
		$this->db->truncate(PREFIX.$table);
	}
	
}



/*
// http://wiki.hashphp.org/Validation
// do some validation first!
if (filter_var($_GET['int_col'], FILTER_VALIDATE_INT) === false) {
  die('You must enter a valid integer!');
}
 
$dsn = 'mysql:dbname=my_database;host=myserver.com';
$username = 'username';
$password = 'password';
$user_id = 1;
 
// Set up PDO
$pdo = new PDO($dsn, $username, $password);

// Our parametrized query using placeholders.  No need for quotes around values, it will do this for us.
$query = "SELECT secret_data FROM mytable WHERE string_col = ? AND int_col = ? AND user_id = ?";

// our input values in order for the place holders.  No need to escape, it will do it for us!
$parameters = array($_GET['string_col'], $_GET['int_col'], $user_id);

// Prepare the query
$statement = $pdo->prepare($query);

// execute the query with our parameters
$statement->execute($parameters);

// Get the first returned row
$row = $statement->fetch(PDO::FETCH_ASSOC);

*/
