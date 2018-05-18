<?php echo anchor('userprofile/input/','INPUT VIDEO'); ?>
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
// $template = array(


//         'table_open'  => '<table border="2" align="left"  cellpadding="4" height="200" cellspacing="0" width="900" class="mytable" >',
        
		
// 		'table_close' => '</table>'
		
// );


?>
<div class="table-responsive">
        <table class="table table-hover">
        <thead>
          <tr>
              <th>Link Video</th>
              <th></th>
              <th> </th>
              <th> </th>
             
           </tr>
        </thead>

        <tbody id="myTable">
<?php
//table header
// $this->table->set_heading('Link Video ', '' ,'' );
//<td width="500" height="60" bgcolor="cyan">'.$linkvideo[70].'</td>

// foreach($video as $v){ 
// $this->table->add_row( $v->linkvideo, ' '.anchor('userprofile/edit/'.$v->idvideo ,'EDIT'), ' '.anchor('userprofile/hapus/'.$v->idvideo ,'DELETE'));
foreach($video as $v){
	echo "<tr> 	<td>$v->linkvideo</td>
				<td>".anchor('userprofile/edit/'.$v->idvideo,'EDIT')."</td>
				<td>".anchor('userprofile/hapus/'.$v->idvideo, 'DELETE')."</td>
				</tr>";
}
?>
 </tbody>
        </table>
<?php
// $this->table->set_template($template);
//buat tabel

// echo $this->table->generate(); //generating tabel nya

echo br();

echo $this->pagination->create_links(); // buat paginationnya 


?>
