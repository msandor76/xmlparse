<?php
/**
 * Sample layout
 */

use Core\Language;

?>


<hr>
<?php
echo "Így is létezik a head-title: ".$title;
?>
<hr>


<div class="page-header">
	<h1><?php echo $data['title'] ?></h1>
</div>

<p><?php echo $data['welcome_message'] ?></p>

<a class="btn btn-md btn-success" href="<?php echo DIR;?>">
	<?php echo Language::show('back_home', 'Welcome'); ?>
</a>
<hr>
<?php
//print_r($data["welcomeusers"]);
/*
foreach($data["welcomeusers"] as $welcomeuser){
	echo($welcomeuser->name."<br>");
}
* */
?>
