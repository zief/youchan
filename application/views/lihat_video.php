<?php 

if($img=youtube_thumb_url('http://www.youtube.com/watch?v=H3BS0XX0Owc')){
$img=htmlspecialchars($img);
echo '<img src="'. $img .'" alt="" />';
}else{
echo '<img src="noimage.png" alt="" />';
}

?>