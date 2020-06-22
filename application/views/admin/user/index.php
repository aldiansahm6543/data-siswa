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
              <form action="<?= base_url('admin/user'); ?>" method="post" enctype="multipart/form-data"> 
                <div class="form-group ml-3" >
                  <div class="row"> 
                  <select name="level" class="form-control col-md-2">
                      <option disabled selected>pilih level</option>
                      <option >Admin</option>
                      <option >Guru</option>
                      <option >Murid</option>
                  </select>
                  <input type="submit" class="btn btn-success" value="Lihat">
                </div>
              </div>
              </form>
              <form action="<?= base_url('admin/user'); ?>" method="post" enctype="multipart/form-data"> 
              <div class="form-group ml-3">
                <div class="row"> 
                  <input type="text" class="form-control col-md-2" placeholder="cari.." name="cari">
                  <input type="submit" class="btn btn-success" value="Cari">
                </div>
              </div>
              </form>
              <div class="table-responsive">
	              <table id="dataTable" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  	<th>No</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Level</th>
                      <th>Status</th>
                      <th>Aksi</th>
	                </tr>
	                </thead>
	                <tbody>
	                   	<?php $nomor = 1; ?>
	                    <?php foreach ($user as $u): ?>
                        <tr>
                          <td><?= $nomor;?> </td>
                            <?php $nomor++;?>
                          <td><?= $u->username; ?></td>
                          <td><?= $u->nama; ?></td>
                          <td><?= $u->level; ?></td>
                          <td><?php if ($u->__active == 0) : ?>
                            Tidak aktif
                          <?php else: ?>
                            Aktif
                          <?php endif; ?>
                          </td>
                          <td >
                            <?php if ($u->__active == 1) : ?>
                             <button type="submit" class="btn btn-danger waves-effect" onclick="if(confirm('Apakah anda yakin akan menonaktifkan <?= $u->nama; ?>?')) window.location.href='<?=base_url('admin/user/nonaktif/') . $u->id; ?>';"><i>Nonaktif</i></button>
                            <?php else: ?>
                              <button type="submit" class="btn btn-success waves-effect" onclick="if(confirm('Apakah anda yakin akan mengaktivasi <?= $u->nama; ?>?')) window.location.href='<?=base_url('admin/user/aktif/') . $u->id; ?>';"><i>Aktif</i></button>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
	                </tbody>
	              </table>
          	</div>
            </div>
          </div>
        </div>
      </div>