<?php
use Core\Language;
?>



<div class="row">

	<div class="col-sm-12">
		<!-- fő  -->
					
		<form method="post" action="<?php echo SITEURL; ?>import/xml">
			<input type="hidden" name="csrftoken" value="<?php echo $csrf->getToken() ?>" />
			<input type="submit" class="btn btn-md btn-success" name="subm" value="XML-ből importálás">
		</form>
		<br>
		<form method="post" action="<?php echo SITEURL; ?>import/csv">
			<input type="hidden" name="csrftokencsv" value="<?php echo $csrf->getToken() ?>" />
			<input type="submit" class="btn btn-md btn-success" name="submcsv" value="CSV-ből importálás">
		</form>
		<br>				
		<a class="btn btn-md btn-success" href="<?php echo SITEURL; ?>termekek">Termékek listája</a>
		<!-- END fő -->
	</div>
	
</div><!-- row END -->
