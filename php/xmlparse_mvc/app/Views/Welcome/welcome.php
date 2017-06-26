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

<a class="btn btn-md btn-success" href="<?php echo DIR;?>subpage">
	<?php echo Language::show('open_subpage', 'Welcome'); ?>
</a>
<?php
\Core\View::render('welcome/teszt_box',$data,$error);
?>
