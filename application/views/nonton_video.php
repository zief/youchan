<!-- <center><input type="submit" value=" Mulai" name="submit"/></center> -->

<?php 

$this->load->helper("autoembed");

?>
<div class="table-responsive">
        <table class="table table-hover">
        <thead>
          <tr> </tr>
          <th></th>

        </thead>

<?php
$autoembed = new AutoEmbed();
foreach($video as $v){
	echo "<tr> 	<td> </td>
			<td>";

			echo $autoembed->parse($v->linkvideo);

	echo "</td>

		</tr>";

}
// $content = "http://www.youtube.com/watch?v=SLk4Ia0otko
// 		  ";
 

//         $autoembed = new AutoEmbed();
//         $content = $autoembed->parse($content);


echo $content;

//   $this->load->helper("video");
  
//   $youtube_url = 'http://www.youtube.com/watch?v=SLk4Ia0otko';

//   $id = youtube_id($youtube_url);

// echo $id;
?>