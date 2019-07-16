<!DOCTYPE html>
<html>
	<head>
		<title>Tape List</title>
		<?php
			include 'koneksi.php';
			error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		?>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css">
			body 
			{
				background-color: white;
				font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			}
			.demo-table 
			{
				border-collapse: collapse;
				font-size: 13px;
			}
			.demo-table th,	.demo-table td 
			{
				border: 1px solid #e1edff;
				padding: 7px 17px;
			}
			.demo-table .title 
			{
				caption-side: bottom;
				margin-top: 12px;
			}
			.demo-table th 
			{
				background-color: #508abb;
				color: #FFFFFF;
				border-color: #6ea1cc !important;
				text-transform: uppercase;
			}
			.demo-table td 
			{
				color: #353535;
			}
			.demo-table  td:first-child, .demo-table  td:last-child, .demo-table  td:nth-child(4) 
			{
				text-align: left;
			}
			.demo-table  tr:nth-child(odd) td 
			{
				background-color: #f4fbff;
			}
			.demo-table  tr:hover td 
			{
				background-color: #ffffa2;
				border-color: #ffff0f;
				transition: all .2s;
			}
			h3
			{
				font-family: sans-serif;
			}
			.dropbtn 
			{
					background-color: #5bc0de;
					color: white;
					padding: 3px;
					font-size: 12px;
					border: none;
			}
	 		.dropdown 
			{
				position: relative;
				display: inline-block;
			}
	
			.dropdown-content 
			{
				display: none;
				position: absolute;
				background-color: lightgrey;
				min-width: 200px;
				z-index: 1;
			}
			.dropdown-content a 
			{
				color: black;
				padding: 12px 16px;
				text-decoration: none;
					display: block;
			}
	 		.dropdown-content a:hover {background-color: white;}
			.dropdown:hover .dropdown-content {display: block;}
			.dropdown:hover .dropbtn {background-color: grey;}
		</style>
	</head>

	<body>
		<div class="header">
			<img src="kpc2.png" width="180px" height="75px" align="left">	
			<table border="0" width="100%">
				<tr>
				<td width="85%" align="center"><font face="Britannic Bold" color="#CD5C5C" size="6">Data Tape</font></td>
				</tr>
			</table>
		</div>

		<div class="wrap">
			<table border="0" width="100%">
				<tr>
					<td>
						<button class="btn btn-info  btn-xs" data-toggle="modal" data-target="#modalForm"><i class='fas fa-plus-circle' style='font-size:12px;color:white'></i> Add Tape</button>
						
						<div class="dropdown">
							<button class="btn btn-success btn-xs"><i class='fas fa-plus-circle' style='font-size:12px;color:white'></i> Print</button>
							<div class="dropdown-content">
								<a href="cetak.php">Export to PDF</a>
								<a href="export.php">Export to Excel</a>
							</div>
						</div>
					</td>
					<form action="awal.php" method="POST">
						<td width="83%" align="right">
								<select name="kategori"  class="search2">
										<option value='all'>ALL</option>
										<option value='id'>ID Tape</option>
										<option value='tld'>TLD</option>
										<option value='exp'>Data Expiration</option>
										<option value='vol'>Volume Pool</option>
										<option value='loc'>Location</option>
										<option value='remarks'>Remarks</option>
										<option value='stat'>Media Status</option>
										<option value='change'>Date of Change</option>
								</select>
							<input type="text" name="cari" class="search">
							<button type="submit" value="Cari" name="carii" class="button"><i class='fas fa-search' style='font-size:14px;color:white'></i></button>
						</td>
					</form>
				</tr>
				<tr>
				</tr>
			</table>

			<table border="1" width="100%" class="demo-table">
				<tr>
					<th width="1%">No</th>
					<th width="6%">ID Tape</th>
					<th width="1%">TLD</th>
					<th width="15%">Data Expiration</th>
					<th width="16%">Volume Pool</th>
					<th width="9%">Location</th>
					<th width="10%">Remarks</th>
					<th width="15%">Media Status</th>
					<th width="15%">Date Of Change</th>
					<th width="11%">Action</th>
				</tr>
				<?php 
					$cari = $_POST['cari'];
					$kategori = $_POST['kategori'];
					if ($kategori=='all')
					{
						$q="select * from tape_list where id_tape like '%$cari%' or tld like '%$cari%' or data_expiration like '%$cari%' or volume_pool like '%$cari%' or location like '%$cari%'  or location like '%$cari%' or remarks like '%$cari%' or media_status like '%$cari%' or date_of_change like '%$cari%'";
					}
					else if ($kategori=="id")
					{
						$q="select * from tape_list where id_tape like '%$cari%'";
					}
					else if ($kategori=='tld')
					{
						$q="select * from tape_list where tld like '%$cari%'";
					}
					else if ($kategori=='exp')
					{
						$q="select * from tape_list where data_expiration like '%$cari%'";
					}
					else if ($kategori=='vol')
					{
						$q="select * from tape_list where volume_pool like '%$cari%'";
					}
					else if ($kategori=='loc')
					{
						$q="select * from tape_list where location like '%$cari%'";
					}
					else if ($kategori=='remarks')
					{
						$q="select * from tape_list where remarks like '%$cari%'";
					}
					else if ($kategori=='stat')
					{
						$q="select * from tape_list where media_status like '%$cari%'";
					}
					else if ($kategori=='change')
					{
						$q="select * from tape_list where date_of_change like '%$cari%'";
					}
					else
					{
						$q="select * from tape_list";
					}
					$master = mysqli_query($koneksi,$q);
					$no = 1;
					foreach ($master as $row) 
					{
						echo "<tr>
						<td>$no</td>
						<td>".$row['id_tape']."</td>
						<td>".$row['tld']."</td>
						<td>".$row['data_expiration']."</td>
						<td>".$row['volume_pool']."</td>
						<td>".$row['location']."</td>
						<td>".$row['remarks']."</td>
						<td>".$row['media_status']."</td>
						<td>".$row['date_of_change']."</td>
						<td><a href='edit.php?id_tape=$row[id_tape]' class='btn btn-success btn-xs'>Edit</a>
						<a href='delete.php?id_tape=$row[id_tape]' class='btn btn-danger btn-xs'>Del</a>
						</td>
						</tr>";
						$no++;
					}
				?>
			</table>
		</div>

		<form method="POST" action="awal.php">
			<div class="modal fade" id="modalForm" role="dialog">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <!-- Modal Header -->
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal">
			                    <span aria-hidden="true">&times;</span>
			                    <span class="sr-only">Close</span>
			                </button>
			                <h4 class="modal-title" id="labelModalKu">Add Form</h4>
			            </div>

			            <!-- Modal Body -->
			            <div class="modal-body">
			                <p class="statusMsg"></p>
			                    <div class="form-group">
			                        <label>ID Tape</label>
			                        <input type="text" class="form-control" name="masukkanTape" placeholder="Insert Id Tape"/>
			                    </div>

			                    <div class="form-group">
			                        <label>TLD</label>
			                        <select name='masukkanTld' value="<?php echo $data['tld'] ?>" class="form-control" />
								        <option value=''> </option>
								        <?php
								        include 'koneksi.php';
								       error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
								        $a=mysqli_query($koneksi,"select * from tld");
								        while($b=mysqli_fetch_array($a))
								        {
								          if($b[0]==$data[3])
								            echo"<option value='$b[0]'>$b[0]</option>";
								          else
								            echo"<option value='$b[0]'>$b[0]</option>";
								        }
								        ?>
								     </select>
			                    </div>

			                    <div class="form-group">
			                        <label>Data Expiration</label>
			                        <input type="date" class="form-control" name="masukkanExp" placeholder="Insert Data Expiration">
			                    </div>

			                    <div class="form-group">
			                        <label>Volume Pool</label>
			                        <select value="<?php echo $data['vol'] ?>" class="form-control" name="masukkanVol"/>
								        <option value=''> </option>
								          <?php
								          $a1=mysqli_query($koneksi,"select * from vol_pool");
								          while($b1=mysqli_fetch_array($a1))
								          {
								            if($b1[0]==$data[3])
								              echo"<option value='$b1[0]'>$b1[0]</option>";
								            else
								              echo"<option value='$b1[0]'>$b1[0]</option>";
								          }
								          ?>
								    </select>
			                    </div>

			                    <div class="form-group">
			                        <label>Location</label>
			                        <select value="<?php echo $data['loc'] ?>" class="form-control" name="masukkanLoc"/>
							           <option value=''> </option>
							          <?php
							          $a2=mysqli_query($koneksi,"select * from location");
							          while($b2=mysqli_fetch_array($a2))
							          {
							            if($b2[0]==$data[4])
							              echo"<option value='$b2[0]' >$b2[0]</option>";
							            else
							              echo"<option value='$b2[0]'>$b2[0]</option>";
							          }
							          ?>
							         </select>
			                    </div>

			                    <div class="form-group">
			                        <label>Remarks</label>
			                        <input type="text" class="form-control" name="masukkanRemarks" placeholder="Insert Remarks">
			                    </div>

			                     <div class="form-group">
			                        <label>Media Status</label>
			                        <select value="<?php echo $data['media_list'] ?>" class="form-control" name="masukkanMedia"/>
								        <option value=''> </option>
								          <?php
								          $a3=mysqli_query($koneksi,"select * from media_status");
								          while($b3=mysqli_fetch_array($a3))
								          {
								            if($b3[0]==$data[6])
								              echo"<option value='$b3[0]' >$b3[0]</option>";
								            else
								              echo"<option value='$b3[0]'>$b3[0]</option>";
								          }
								          ?>
								          </select>
			                    </div>

			                     <div class="form-group">
			                        <label>Date Of Change</label>
			                        <input type="date" class="form-control" name="masukkanChange" placeholder="Insert Date Of Change"></textarea>
			                    </div>
			            </div>

			            <!-- Modal Footer -->
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                <button type="submit" class="btn btn-primary submitBtn">Save</button>
			            </div>
			        </div>
			    </div>
			</div>

			<?php
					    $id = $_POST['masukkanTape'];
					    $tld = $_POST['masukkanTld'];
					    $exp = $_POST['masukkanExp'];
					    $vol = $_POST['masukkanVol'];
					    $loc = $_POST['masukkanLoc'];
					    $remarks = $_POST['masukkanRemarks'];
					    $media = $_POST['masukkanMedia'];
					    $change = $_POST['masukkanChange'];
					    if(isset($id))
					    {
					      	$q = mysqli_query($koneksi,"insert into  tape_list set id_tape='$id', tld='$tld', data_expiration='$exp', volume_pool='$vol', location='$loc', remarks='$remarks', media_status='$media', date_of_change='$change' ");
					    		if($q==1)
						        {
						          echo"<script language='javascript'>alert('Input Success');
						          document.location='awal.php'</script>";
						        }
						        else
						        {
						          echo"<script language='javascript'>alert('ID is Available');
						          document.location='awal.php'</script>";
						        }
					          
					    }
					?>
		</form>
	</body>
</html>