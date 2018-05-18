
<hr></hr><center>

<!-- <table border="1" bgcolor="cyan">
<tr><th> Link Video</th><th class="col2"></th></tr>

<?php
/*foreach($video as $v){
	echo "<tr> 	<td>$v->linkvideo</td>
				<td>".anchor('userprofile/edit/'.$v->idvideo,'EDIT')."</td>
				<td>".anchor('userprofile/delete/'.$v->idvideo, 'DELETE')."</td></tr>";

}*/
?>
</table>
-->

<?php
$template = array(


        'table_open'  => '<table border="2" align="left"  cellpadding="4" height="200" cellspacing="0" width="900" class="mytable" >',
        
		
		'table_close' => '</table>'
		
);
//table header
$this->table->set_heading('Link Video ', 'Status Banned' ,'' );
//<td width="500" height="60" bgcolor="cyan">'.$linkvideo[70].'</td>

foreach($video as $v){ 
$this->table->add_row( $v->linkvideo, $v->banned ,' '.anchor('userprofile/edit/'.$v->idvideo ,'EDIT'), ' '.anchor('userprofile/banned/'.$v->idvideo ,'Banned'),''.anchor('userprofile/unbanned/'.$v->idvideo ,'Unbanned'));
}


$this->table->set_template($template);
//buat tabel

echo $this->table->generate(); //generating tabel nya

echo br();

echo $this->pagination->create_links(); // buat paginationnya 


?>
