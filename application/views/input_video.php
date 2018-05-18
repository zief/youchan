<center>
<?php echo "<h3> Form Input Video </h3>"; ?>
<hr> 
<?php echo form_open('Userprofile/input_simpan'); ?>

<table border="1">
	<!-- <tr>
		<td>ID User</td><td> <?php echo form_input('iduser', $product['iduser'], array('placeholder'=>'ID User')); ?></td>
	</tr>
	<tr>
		<td>ID Video</td><td> <?php echo form_input('idvideo', $product['idvideo'], array('placeholder'=>'ID Video')); ?></td>
	</tr>  -->
	<tr>
		<td>Link</td><td> <?php echo form_input('linkvideo', '', array('placeholder'=>'Link')); ?></td>
	</tr>
	<tr><td colspan="2"><?php echo form_submit('Submit','SIMPAN DATA'); ?> <?php echo anchor('userprofile/konek2','Kembali'); ?></td></tr>
</table>

<?php echo form_close(); ?>