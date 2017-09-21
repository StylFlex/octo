<script type="text/javascript">

        function switchColor(color) {
            var newColor ="css/style-"+color+".css";
            $('head').append("<link rel=stylesheet href='"+newColor+"' type='text/css' >");
        }
</script>

<?php
$colors = ['blue','red','grey','brown','purple','orange','green'];
foreach($colors as $color) {
  $items[]=array('label'=>ucfirst($color),'url'=>'#','itemOptions'=>array('onclick' => "switchColor('$color')"), 'visible'=>!Yii::app()->user->isGuest);
 }

	 $this->widget('bootstrap.widgets.TbNavbar', array(
				'brand'=>Yii::app()->params['site'],
			 'collapse'=>true, // requires bootstrap-responsive.css
			 'htmlOptions'=>array('class'=>'navbar navbar-inverse navbar-fixed-top','style'=>'width:100%'),
			 'items'=>array(
					array(
					 'encodeLabel'=>false,
					 'class'=>'bootstrap.widgets.TbMenu',
					 'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(

						       array('label'=>'Themes Color', 'visible'=>!Yii::app()->user->isGuest,
						             'items'=>$items,
                        ),
			 		          array('label'=>'Hi '.Yii::app()->user->name,'url'=>'#','visible'=>!Yii::app()->user->isGuest,
					 'items'=>array(
	                 array('label'=>'Logout ', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
							          )
            ),

						 	),

				),
      ),
		));
