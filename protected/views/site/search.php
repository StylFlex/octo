<script type="text/javascript">
$.fn.serializeObject = function() {
    var o = Object.create(null),
        elementMapper = function(element) {
            element.name = $.camelCase(element.name);
            return element;
        },
        appendToResult = function(i, element) {
            var node = o[element.name];

            if ('undefined' != typeof node && node !== null) {
                o[element.name] = node.push ? node.push(element.value) : [node, element.value];
            } else {
                o[element.name] = element.value;
            }
        };

    $.each($.map(this.serializeArray(), elementMapper), appendToResult);
    return o;
};
function request(form, data, hasError){

  if (!hasError) {
          $('#sqbtn').addClass('disabled');
          $('#sqrst').addClass('disabled');
          $("#result").html('<center><i class="fa fa-spinner fa-spin fa-5x fa-fw" style="margin-top:10%"></i></center>').show();
          $.ajax({
                  type :'POST',
                  url  : "<?=Yii::app()->createUrl('site/PhotoLists');?>",
                  data: { data:  JSON.stringify($('#photoForm').serializeObject())},
                  success:function(data,status) {

                      $("#result").html(data);
                      $('#sqbtn').removeClass('disabled');
                      $('#sqrst').removeClass('disabled');

                  },
                  error: function(data){ $("#result").html(data);}

          });

  } return false;
}


$(document).ready(function(){
  $( "#sqrst" ).click(function() {
    $("#error").hide();
    $("#result").hide();
    $("#details").hide();
    $("#dialog").dialog("close");
  });
  $("#img").load(function(){
      $("#load").hide();
      $("#img").show();
  });
});

function openNav(photoId) {
    $("#dialog").dialog("open");
    $("#dialog").dialog('option', 'title', $("#title"+photoId).val());
    $("#img").attr('src', $("#img"+photoId).val());
    $("#details").show();
    $("#ownerName").html($("#ownerName"+photoId).val());
    $("#title").html($("#title"+photoId).val());
    $("#description").html($("#description"+photoId).val());
    $("#datetaken").html($("#datetaken"+photoId).val());
}


</script>
<div class="subnav navbar navbar-fixed-top" style="z-index:1010;position: fixed;">
<?php
$this->beginWidget('bootstrap.widgets.TbBox', array(
  'title' =>'Search photos on Flickr',
  'headerIcon' => 'icon-search',
  'htmlOptions' => array('class'=>'bootstrap-widget-table'),
));
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'photoForm',
  'type'=>'horizontal',
  'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
    'afterValidate'=>'js:request'
	),
));
?>
<div class="row-fluid">
<br>

<div class="span4">
<?php echo $form->textFieldRow($model, 'photo',array('placeholder' => 'Search' )); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('id'=>'sqbtn','buttonType'=>'submit', 'label'=>'Submit')); ?>&nbsp;
<?php $this->widget('bootstrap.widgets.TbButton', array('id'=>'sqrst','buttonType'=>'reset', 'label'=>'Reset')); ?>
<?php $this->endWidget(); ?>
</div>
<div class="span7" id=details style="display:none;">
  <!--blockquote-->
    <b>Photo made by:</b> <span id=ownerName></span><br>
    <b>Date Taken:</b> <span id=datetaken></span><br>
    <b>Title:</b> <span id=title></span><br>
    <b>Description:</b> <span id=description></span>
  <!--/blockquote-->
</div>
<?php $this->endWidget(); ?>
</div>
</div>
<?php
 $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'=>'dialog',
        'options'=>array(
            'title' => 'dialog',
            'autoOpen'=>false,
            'show'=>'slide',
            'hide'=>'explode',
            'position'=>'center',
	    'resizable'=>'false',
            'modal'=>true,
            'close'=> 'js:function(){ $(this).dialog("close"); $("#details").hide();}',
            'buttons'=>array(
                  'Close'=>'js:function(){ $(this).dialog("close"); $("#details").hide();}',
            ),
            'width'=>'auto',
            'height'=>'auto',
        ),
    ));
?>


<img id=img max-height=650px max-width=650px style="display:none">
<div id=load>
<center><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></center>
</div>
<?php  $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>

<div style="width: 95%; margin: 0 auto; padding-left:30px;margin-top:115px;" id="result"></div>
