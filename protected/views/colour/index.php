<script>
$(function() {
      //  callAjax('<?php// echo $model->theme; ?>');

});
function callAjax(id) {

            $("#preview").html('<img src="images/load.gif">' ).show();
            var request = $.ajax({
                url: "<?php echo Yii::app()->createUrl('Setup/Colour/preview');?>&id="+id
                });
            request.done(function(msg) {$("#preview").html( msg ).show();});
            request.fail(function(jqXHR, textStatus) {$("#preview").html( textStatus ).show();});
}
</script>
<?php
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                        'id'=>'image-form',
                        'type'=>'horizontal',
                        'enableAjaxValidation'=>false,

));
?>
<script type="text/javascript">
    $(document).ready(function() {
        $("a").click(function() {
            $('head').append('<link rel="stylesheet" href="css/style-blue.css" type="text/css" />');
        });
    });
</script>
<div>
    <a href="javascript:">Make this text Green!</a>

<div class="span7">
<?php Controller::debug($color); ?>
<div class="span3">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',
                                                        'size'=>'small',
                                                        'label'=>'Save',

                                                    ));
?>
</div>
</div>
<div class="span3" id="preview"></div>
<?php
$this->endWidget();
?>
