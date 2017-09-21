
<link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
<script type="text/javascript" src="js/colorpicker.js"></script>
<script type="text/javascript" src="js/eye.js"></script>
<script type="text/javascript" src="js/utils.js"></script>
<script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>
<?php
$this->menu=array(
	array('label'=>'Main page', 'url'=>array('index')),
	array('label'=>'Menu', 'url'=>array('menu'),'active'=>true),
                
);

?>
               <div class="form">
         

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'colour-couleurr-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->hiddenField($model, 'id'); ?>
<div id="accordion">
<div>
        <h3><a href="#">Main Menu</a></h3>
        <div>
        <table>
        <tr><td width="30%">    
        <?php echo $form->labelEx($model,'Background Colour'); ?></td><td> <?php echo $form->textField($model,'menubgcolor'); ?></td></tr>
        <tr><td>    
        <?php echo $form->labelEx($model,'Font Colour'); ?></td><td> <?php echo $form->textField($model,'menufontcolor'); ?></td></tr>
        <tr><td>  
        <?php echo $form->labelEx($model,'Active Colour'); ?></td><td> <?php echo $form->textField($model,'menuactive'); ?></td></tr>
        </table>
        </div>
</div>
<div>
        <h3><a href="#">Sub Menu </a></h3>
        <div>
        <table>
        <tr><td width="30%">     
        <?php echo $form->labelEx($model,'Background Colour'); ?></td><td> <?php echo $form->textField($model,'submenubgcolor'); ?></td></tr>
        <tr><td>    
        <?php echo $form->labelEx($model,'Font Colour'); ?></td><td> <?php echo $form->textField($model,'submenufontcolor'); ?></td></tr>
        <tr><td>    
        <?php echo $form->labelEx($model,'Hover Colour'); ?> </td><td><?php echo $form->textField($model,'submenuhover'); ?></td></tr>
        </table>
        </div></div>

</div>
<br>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit',array('class'=>'mySubmit')); ?>
	</div>
</div>
<?php $this->endWidget(); ?>



