<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<title><?=Yii::app()->params['site']?></title>
</head>
<body>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'=>'dialog',
        'options'=>array(
    				'autoOpen'=>false,
            'show'=>'slide',
            'hide'=>'explode',
            'position'=>'center',
            'modal'=>true,
						'display'=>'table',
						'overflow-y'=>'auto',
						'overflow-x'=>'auto',
						'width'=>'auto',
						'buttons'=>array('Close'=>'js:function(){ $(this).dialog("close");}'),
        ),
    ));
    echo '<div align=center style="padding-top:50px;"><i class="fa fa-refresh fa-spin fa-4x"></i></div>';
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

  <br>
  <div class="row-fluid">
    <div id="header">
			<div class="logo"><?=Yii::app()->params['site']?></div>
		</div>
    <br clear="all">
				<div style="padding:20px;">
		<?php
		$this->beginWidget('bootstrap.widgets.TbBox', array(
			'title' =>$this->subTitle,
			'headerIcon' => 'icon-'.$this->icon,
			'htmlOptions' => array('class'=>'bootstrap-widget-table'),
		));
		?>
	    <?php echo $content; ?>
		  </div>
			<?php $this->endWidget(); ?>
	</div>


</body>
</html>
