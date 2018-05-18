<!-- <?php echo anchor('userprofile/input/','INPUT VIDEO'); ?> -->
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


//         'table_open'  => '<table border="2" align="left"  cellpadding="4" height="500" cellspacing="0" width="900" class="mytable" >',
        
		
// 		'table_close' => '</table>'
		
// );
// //table header
// $this->table->set_heading('id', 'Username' ,'Email','','' );
//<td width="500" height="60" bgcolor="cyan">'.$linkvideo[70].'</td>
?>
 <div class="table-responsive">
        <table class="table table-hover">
        <thead>
          <tr>
              <th>#</th>
              <th>ID</th>
              <th>USERNAME</th>
              <th>EMAIl</th>
              <th>POIN</th>
             
           </tr>
        </thead>

        <tbody id="myTable">
<?php

$this->load->helper("cekpoin");
foreach($user as $s){ 
echo "<tr> 	<td> </td>
			<td>$s->id</td>
			<td>$s->username</td>
			<td>$s->email</td>
			<td>"; echo cekPoin($s->id);echo"</td>
			<td>".anchor('Dashboard/addpoin/'.$s->id,'+ POIN')."</td>
			<td>".anchor('Dashboard/deletepoin/'.$s->id, ' - Poin')."</td>

		</tr>";

// $this->table->add_row( $s->id, $s->username, $s->email, ' '.anchor('userprofile/addpoin/'.$s->id ,'Add Poin'), ' '.anchor('userprofile/deletepoin/'.$s->id ,'DELETE Poin'), ' '.anchor('Dashboard/video/'.$s->id ,'Videos'));
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
