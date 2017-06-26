<?php
use Core\Language;
?>



<div class="row">
	
	<div class="col-sm-12">
		<!-- fő  -->
					
		<h2>Termékek</h2>
		
			<?php
			if(count($products)>0){
				echo("<ul class=\"list-unstyled\">");
				$productModel = new \App\Models\ProductModel();
				foreach($products as $product){
					echo("<li><h3>".$product->name."</h3>");
					// accessories
					$accessories = $productModel->getAccessories($product->product_id);
					$countAccessories = count($accessories);
					if($countAccessories > 0){
						//echo("<pre>");var_dump($accessories);echo("</pre>");
						echo("Tartozékok:<ul>");
						for($i=0; $i<$countAccessories; $i++){
							echo("<li>".$accessories[$i][0]->name."</li>");
						}
						echo("</ul>");
					}
					
					echo("</li>");
				}// foreach END
				echo("</ul>");
			}
			else{
				echo("<h3>Nincs megjeleníthető termék</h3>");
			}
			?>
			
		
		<br>
		<a class="btn btn-md btn-success" href="<?php echo SITEURL; ?>">vissza a kezdőoldalra</a>
		
		<!-- END fő -->
	</div>

</div><!-- row END -->
