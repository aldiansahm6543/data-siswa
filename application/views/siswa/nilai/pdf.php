<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SMKN 1 DEPOK</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">
  	th,td{
  		padding-left: 20px;
  	}
  	tr th{
	border:0;
	background-color: black;
	color: white;
	padding:10px 10px;
	}
	 td{
	 	border:1px solid black;
	 	padding: 5px;
	}
  </style>
</head>
<body>
	<h1 style="text-align: center">Nilai Semester Ganjil</h1>
	<?php echo "Tanggal : ".date('d-m-Y'); ?>
	<hr style="margin-bottom: 100px;">
	<table class="table table-bordered" width="100px" align="center">
		<thead>
	        <tr>
	          <th>No</th>
	          <th>Mata Pelajaran</th>
	          <th>Semester</th>
	          <th>Tahun Ajaran</th>
	          <th>Tugas</th>
	          <th>UTS</th>
	          <th>UAS</th>
	          <th>Rata-rata</th>
	        </tr>
	        </thead>
	        <tbody>
	        <?php $no = 1;
	           foreach ($ganjil as $s): ?>         
	            <tr>
	            	<td><?= $no; ?></td>
	                <td><?= $s->nama_mapel;?></td>
	                <td><?= $s->semester;?></td>
	                <td><?= $s->thn_ajaran;?></td>
	                <td><?= $s->tugas;?></td>
	                <td><?= $s->uts;?></td>
	                <td><?= $s->uas;?></td>
	                <td><?= $s->rata;?></td>
	            </tr>
	        <?php $no++;
	      		endforeach; ?> 
		</tbody>
	</table>
</body>
</html>