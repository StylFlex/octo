<div class="row-fluid">
  <div class="span6 offset3">
    <?php
    $this->beginWidget('zii.widgets.CPortlet', [
    		    'title'=>"<i class=\"fa fa-user-secret\" aria-hidden=\"true\"></i> Private access",
    	   ]
       );
       $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',[
            'id'=>'verticalForm',
            //  'htmlOptions'=>array('class'=>'well'),
          ]);
          echo $form->textFieldRow($model, 'username', array('class'=>'span3'));
          echo $form->passwordFieldRow($model, 'password', array('class'=>'span3'));
      ?>
        <br>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); ?>
      <?php $this->endWidget(); ?>
    <?php $this->endWidget();?>
  </div>
</div>
