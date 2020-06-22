<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header" style="background: rgba(0, 162, 43, 0.2);">
            <div class="container-fluid">
              <p class="no-margin-bottom text-white "><?= $judul ?></p>
            </div>
          </header>
          <div class="container mt-3" > 

           <div class="col-lg-12	 mx-auto" >
        
          <div class="card" >
            <div class="card-body">
            	<button type="submit" class="badge badge-info p-3 mb-2" onclick="if(confirm('Anda akan mengunduh Nilai Semester Ganjil ?')) window.location.href='<?= base_url('siswa/cetak/semester_ganjil'); ?>';"><i class="far fa-file-pdf"></i> Cetak</button>
              <div class="table-responsive">
	              <table id="dataTable" class="table table-bordered table-striped">
	                <thead>
	                <tr>
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
	                <?php
	                   foreach ($semester as $s){
	                  ?>         
	                    <tr>
		                    <td><?= $s->nama_mapel;?></td>
		                    <td><?= $s->semester;?></td>
		                    <td><?= $s->thn_ajaran;?></td>
		                    <td><?= $s->tugas;?></td>
		                    <td><?= $s->uts;?></td>
		                    <td><?= $s->uas;?></td>
		                    <td><?= $s->rata;?></td>
	                    </tr>
	                <?php
	                  }
	                ?> 
	                <?php if (!$semester): ?>
	              			<div class="alert alert-danger" role="alert">Tidak ada data untuk ditampilkan</div>
	                <?php endif; ?>
	                </tbody>
	              </table>
          	</div>
            </div>
          </div>
        </div>
      </div>