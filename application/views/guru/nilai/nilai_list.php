<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header" style="background: rgba(0, 162, 43, 0.2);">
            <div class="container-fluid">
              <p class="no-margin-bottom text-white "><?= $judul; ?></p>
            </div>
          </header>
          <div class="container mt-3" > 

           <div class="col-lg-12	 mx-auto" >
            <?php if ($this->session->flashdata('info')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   Nilai <?= $this->session->flashdata('info'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php endif; ?>
        	
          <div class="card" >
            <div class="card-body">
            	<form action="<?= base_url('guru/nilai/list_nilai'); ?>" method="post" enctype="multipart/form-data"> 
              	<div class="form-group ml-3">
              		<div class="row">	
	              	<select name="kelas" class="form-control col-md-2">
	                    <option disabled selected>Pilih Kelas</option>
	                    <?php foreach($kelas as $k) : ?>
	                        <option value="<?=$k->id;?>"><?=$k->nama_ruangan;?></option>
	                    <?php endforeach;?>
	                </select>
	                <input type="submit" class="btn btn-success" value="Lihat">
	            	</div>
	            </div>
              </form>
              
              <?php if ($list_nilai): ?>
              	<button type="submit" class="badge badge-info p-2 mb-2" onclick="if(confirm('Anda akan mengunduh Nilai siswa ?')) window.location.href='<?= base_url('guru/cetak/nilai') ?>';"><i class="far fa-file-pdf"></i> Cetak</button>
              <?php else: ?>
              <?php endif; ?>

              <?php if (!$list_nilai): ?>
              <?php else: ?>
              <div class="table-responsive">
	              <table id="dataTable" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>No.</th>
	                  <th>Nama</th>
	                  <th>Kelas</th>
	                  <th>Mata Pelajaran</th>
	                  <th>Tugas</th>
	                  <th>Uts</th>
	                  <th>Uas</th>
	                  <th>Rata-rata</th>
	                  <th>Aksi</th>
	                </tr>
	                </thead>
	           <?php endif;  ?>
	                <tbody>
	                <?php
	                  $no = 1;
	                  foreach($list_nilai as $n) {
	                  ?>         
	                    <tr>
	                      <td><?= $no; ?></td>
	                      <td><?= $n->nama; ?></td>
	                      <td><?= $n->nama_ruangan; ?></td>
	                      <td><?= $n->nama_mapel; ?></td>
	                      <td><?= $n->tugas; ?></td>
	                      <td><?= $n->uts; ?></td>
	                      <td><?= $n->uas; ?></td>
	                      <td><?= $n->rata; ?></td>
	                      <td> <a href="<?= base_url('guru/nilai/edit/') . $n->id_nilai;  ?>" class="badge badge-warning p-2" > Edit</a><a href="<?= base_url('guru/nilai/hapus/') . $n->id_nilai;  ?>" class="badge badge-danger p-2" >Delete</a>
	                      </td>
	                    </tr>
	                <?php
	                  $no++; }
	                ?> 
	                </tbody>
	                <?php if (!$list_nilai): ?>
	              			<div class="alert alert-danger" role="alert">Tidak ada data untuk ditampilkan</div>
	                <?php endif; ?>
	              </table>
          	</div>
            </div>
          </div>
        </div>
      </div>