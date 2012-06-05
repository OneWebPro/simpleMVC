<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo SITE_CHARSET ?>" />
    <title><?php echo $app->getSiteTitle();?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $app->getBaseUrl();?>css/style.css"/>
    <script src="<?php echo $app->getBaseUrl();?>js/jquery-1.7.2.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo $app->getBaseUrl();?>js/jquery.onewebpro.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="content">
    <a href="<?php echo $app->getBaseUrl() ;?>">
        <div class="banner"> <img src="<?php echo $app->getBaseUrl()."img/radio_active.jpg";?>" />  </div>
    </a>
     <div class="systemMessage">
    <?php
        $app->error();
    ?>
     </div>
<?php
  include_once("menu.php");
  $this->view();
  include_once("foot.php");
?>