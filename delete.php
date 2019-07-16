<?php
include 'koneksi.php';
$id = $_GET['id_tape'];
$q=mysqli_query($koneksi, "delete from tape_list where id_tape = '$id'");
if($q==1)
{
	echo"<script language='javascript'>alert('Delete Success');
	document.location='awal.php'</script>";
}
else
{
	echo"<script language='javascript'>alert('Delete Failed');
	document.location='add_tape.php'</script>";
}