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
  	/*design table 1*/
.table1 {
    color: #232323;
    border-collapse: collapse;
    width: 95px;
}
 
.table1, th, td {
    border: 1px solid #999;
    padding: 10px;
}
.table1 tr th{
    background: #35A9DB;
    color: #fff;
    font-weight: normal;
}
  </style>
</head>
<body>
	<h1 style="text-align: center">REKAP NILAI SISWA</h1>
	<?php echo "Tanggal : ".date('d-m-Y'); ?>
	<hr style="margin-bottom: 100px;">
	<table class="table1" width="100px" align="center">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Siswa</th>
				<th>Kelas</th>
				<th>Mata Pelajaran</th>
				<th>Semester</th>
				<th>Tugas</th>
				<th>UTS</th>
				<th>UAS</th>
				<th>Rata-Rata</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			 foreach($nilai as $nilai) : ?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $nilai->nama;?></td>
					<td><?= $nilai->nama_ruangan;?></td>
					<td><?= $nilai->nama_mapel;?></td>
					<td><?= $nilai->semester;?></td>
					<td><?= $nilai->tugas;?></td>
					<td><?= $nilai->uts;?></td>
					<td><?= $nilai->uas;?></td>
					<td><?= $nilai->rata;?></td>
				</tr>
			<?php
			$no++;
			 endforeach;?>
		</tbody>
	</table>
</body>
</html>