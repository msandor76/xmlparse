<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>
    <meta charset="utf-8">
    <title><?php echo $title.' - '.SITETITLE;?></title>
    <?php
    echo $meta;//place to pass data / plugable hook zone
    Assets::css([
        Url::templatePath('common').'css/bootstrap.min.css',
        Url::templatePath('common').'css/font-awesome.min.css',
        Url::templatePath('default').'css/style.css',
    ]);
    /* minifyolasra
      Assets::css([
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',
        Url::templatePath().'css/style.css',
    ], true, true);*/
    
    echo $css;
    ?>
</head>
<body>
<?php echo $afterBody; //place to pass data / plugable hook zone?>

<div class="container">

<p><img src='<?=Url::templatePath();?>images/logo.png' alt='<?php echo SITETITLE;?>'></p>
