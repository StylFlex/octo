<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=Yii::app()->params['site']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Antoine Vincent">
	  <link href='http://fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<?php
  $baseUrl = Yii::app()->request->baseUrl;
  $cs = Yii::app()->getClientScript();
  Yii::app()->clientScript->registerCoreScript('jquery');
  $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
  $cs->registerCssFile($baseUrl.'/css/bootstrap-responsive.min.css');
  $cs->registerCssFile($baseUrl.'/css/abound.css');
  $cs->registerCssFile($baseUrl.'/css/style-blue.css');
 ?>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  </head>

<body>

<section id="navigation-main">
<!-- Require the navigation -->
<?php require_once('tpl_navigation.php')?>
</section><!-- /#navigation-main -->

<section class="main-body">
    <div class="container-fluid">
            <!-- Include content pages -->
            <?php echo $content; ?>
    </div>
</section>

<!-- Require the footer -->
<?php require_once('tpl_footer.php')?>

  </body>
</html>
