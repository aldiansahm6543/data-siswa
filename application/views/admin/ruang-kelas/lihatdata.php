<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header" style="background: rgba(0, 162, 43, 0.2);">
            <div class="container-fluid">
              <p class="no-margin-bottom text-white "><?= $judul ?></p>
            </div>
          </header>
          <div class="container mt-3" > 

           <div class="col-lg-12	 mx-auto" >
        	<?php if ($this->session->flashdata('info')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   Data kelas <?= $this->session->flashdata('info'); ?> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php endif; ?>
          <div class="card" >
            <div class="card-body">
              <div class="table-responsive">
	              <table id="dataTable" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  	<th>No</th>
                        <th>Nama Ruangan</th>
                        <th>Jumlah Siswa</th>
                        <th>Actions</th>
	                </tr>
	                </thead>
	                <tbody>
	                   	<?php $nomor = 1; ?>
	                    <?php foreach($kelas as $sw) : ?>
	                        <tr>
	                            <td><?= $nomor;?> </td>
	                            <?php $nomor++;?>
	                            <td><?= $sw->nama_ruangan; ?>
	                            </td>
	                            <td><?= $sw->jumlah_siswa; ?></td>
	                            <td class="actions">
	                                <button type="submit" class="btn-info waves-effect" 
                                    onclick="window.location.href='<?=base_url('admin/ruang_kelas/edit/') . $sw->id; ?>';"><i>Update</i></button>
                                    <button type="submit" class="btn-danger waves-effect" 
                                    onclick="if(confirm('Apakah anda yakin akan menghapus <?= $sw->nama_ruangan; ?>?')) 
                                    window.location.href='<?=base_url('admin/ruang_kelas/delete/') . $sw->id; ?>';"><i>Delete</i></button>
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