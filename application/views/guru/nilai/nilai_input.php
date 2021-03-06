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
                   Nilai <?= $this->session->flashdata('info'); ?> <a href="<?= base_url('guru/nilai/list_nilai') ?>">Lihat Data</a>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php endif;     ?>
        
          <div class="card" >
            <div class="card-header d-flex align-items-center bg-info " >
              <p class="mb-0 text-white" >Pilih kelas</p>
            </div>
            <div class="card-body">
              <form action="<?= base_url('guru/nilai/input'); ?>" method="post" enctype="multipart/form-data"> 
              	<div class="form-group ml-3">
              		<div class="row">	
	              	<select name="kelas" class="form-control col-md-2">
	                    <option disabled selected>Pilih Kelas</option>
	                    <?php foreach($kelas as $ks) : ?>
	                        <option value="<?=$ks->id;?>"><?=$ks->nama_ruangan;?></option>
	                    <?php endforeach;?>
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
	                  <th>Nama</th>
	                  <th>Kelas</th>
	                  <th>Aksi</th>
	                </tr>
	                </thead>
	                <tbody>
	                <?php
	                  $no = 1;
	                  foreach($siswa as $s) {
	                  ?>         
	                    <tr>
	                      <td><?= $no; ?></td>
	                      <td><?= $s->nama; ?></td>
	                      <td><?= $s->nama_ruangan; ?></td>
	                      <td> <a href="<?= base_url('guru/nilai/do_input/') . $s->id_siswa; ?>" class="badge badge-warning p-2" > Input Nilai</a>
	                      </td>
	                    </tr>
	                <?php
	                  $no++; }
	                ?> 
	                </tbody>
	              </table>
          	</div>
            </div>
          </div>
        </div>
      </div>