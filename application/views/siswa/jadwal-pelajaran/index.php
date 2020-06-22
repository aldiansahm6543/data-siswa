<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header" style="background: rgba(0, 162, 43, 0.2);">
            <div class="container-fluid">
              <p class="no-margin-bottom text-white ">Dashboard</p>
            </div>
          </header>
          <div class="container mt-3" > 

           <div class="col-lg-12	 mx-auto" >
        
          <div class="card" >
            <div class="card-body">
              <form action="<?= base_url('siswa/jadwal_pelajaran'); ?>" method="post"> 
              	<div class="form-group ml-3">
              		<div class="row">	
	              	<select name="hari" class="form-control col-md-2">
	              		<option disabled selected>-hari-</option>
                        <option >senin</option>
                        <option >selasa</option>
                        <option >rabu</option>
                        <option >kamis</option>
                        <option >jumat</option>
                        <option >sabtu</option>
	                </select>
	                <input type="submit" class="btn btn-success" value="Lihat">
	            	</div>
	            </div>
              </form>
              <div class="table-responsive">
	              <table id="dataTable" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>No.</th>
	                  <th>Hari</th>
	                  <th>Kelas</th>
	                  <th>Mata Pelajaran</th>
	                  <th>Jam</th>
	                </tr>
	                </thead>
	                <tbody>
	                <?php
	                  $no = 1;
	                  foreach($jadwal as $j) {
	                  ?>         
	                    <tr>
	                      <td><?= $no; ?></td>
	                      <td><?= $j->hari; ?></td>
	                      <td><?= $j->nama_ruangan; ?></td>
	                      <td><?= $j->nama_mapel; ?></td>
	                      <td><?= $j->jam_awal;?>:<?= $j->menit_awal;?>-<?= $j->jam_akhir;?>:<?= $j->menit_akhir;?></td>
	                    </tr>
	                <?php
	                  $no++; }
	                ?> 
	                <?php if (!$jadwal): ?>
	              			<div class="alert alert-danger" role="alert">Tidak ada data untuk ditampilkan</div>
	                <?php endif; ?>
	                </tbody>
	              </table>
          	</div>
            </div>
          </div>
        </div>
      </div>