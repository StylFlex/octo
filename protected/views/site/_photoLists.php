<?php
foreach($listPhotos as $single_photo){
  if (isset($single_photo->url_m)) {

    $photo_url = 'http://farm'. $single_photo->farm.'.staticflickr.com/'.$single_photo->server.'/'.$single_photo->id.'_'.$single_photo->secret.'_s.jpg';
?>
    <div class=dashIcon>
        <img src="<?=$photo_url?>" onclick="openNav(<?=$single_photo->id?>)">
            <br>
        <span style="font-size:10px;cursor:pointer;float:left;" onclick="openNav(<?=$single_photo->id?>)">&#9776; 0pen</span>
    </div>
    <input type=hidden id="ownerName<?=$single_photo->id?>" value="<?=addslashes($single_photo->ownername)?>">
    <input type=hidden id="title<?=$single_photo->id?>" value="<?=addslashes($single_photo->title)?>">
    <input type=hidden id="description<?=$single_photo->id?>" value="<?=str_replace("\"","'",substr($single_photo->description->_content,0,320))?>">
    <input type=hidden id="datetaken<?=$single_photo->id?>" value="<?=addslashes($single_photo->datetaken)?>">
    <input type=hidden id="img<?=$single_photo->id?>" value="<?=$single_photo->url_m?>">
<?php

  }
}

