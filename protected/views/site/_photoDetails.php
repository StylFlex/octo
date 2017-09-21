<script>
$(document).ready(function(){
  $("#photo"+<?=$photo->id?>).load(function(){
      $("#load"+<?=$photo->id?>).hide();
      $("#photo"+<?=$photo->id?>).show();
  });
});
</script>
<input type=hidden id="ownerName<?=$photo->id?>" value="<?=addslashes($photo->ownername)?>">
<input type=hidden id="title<?=$photo->id?>" value="<?=addslashes($photo->title)?>">
<input type=hidden id="description<?=$photo->id?>" value="<?=str_replace("\"","'",substr($photo->description->_content,0,320))?>">
<input type=hidden id="datetaken<?=$photo->id?>" value="<?=addslashes($photo->datetaken)?>">

<div id="<?=$photo->id?>" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav(<?=$photo->id?>)">&times;</a>
  <div class="overlay-content">
    <img src="<?=$photo->url_m?>" id="photo<?=$photo->id?>" max-height=500px max-width=650px style="display:none">
    <div id="load<?=$photo->id?>">
      <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
    </div>
  </div>
</div>
