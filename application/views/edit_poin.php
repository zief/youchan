<center>
<?php echo "<h3>".$judul."</h3>"; ?>
<hr> 

<?php 
$this->load->helper("cekpoin");
$id = $this->uri->segment(3);
echo form_open($tempat_submit); ?>


<table border="1">
	
	<tr>
		<td>ID user</td><td> <?php echo form_input('iduser', $id, array('placeholder'=>'id')); ?></td>
	</tr>

	<tr>
		<td>Jumlah Poin</td><td> <?php echo cekPoin($id); ?></td>
	</tr>

	<tr>
		<td><?php echo $status;?>Poin</td><td> <?php echo form_input('poin', '', array('placeholder'=>'Jumlah poin')); ?></td>
	</tr>
	<tr><td colspan = "2"><?php echo form_submit('Submit','SIMPAN DATA'); ?> <?php echo anchor('Dashboard/manageuser','Kembali'); ?></td></tr>
</table>

<?php echo form_close(); ?>