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
                   Data Guru <?= $this->session->flashdata('info'); ?> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php endif;     ?>
          <div class="card" >
            <div class="card-body">
	        	<form action="<?= base_url('admin/guru/lihatdata'); ?>" method="post" enctype="multipart/form-data"> 
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
	                    <th>NIP</th>
	                    <th>Nama Guru</th>
	                    <th>Tempat, tgl lahir</th>
	                    <th>Jabatan</th>
	                    <th>JK</th>
	                    <th>Alamat</th>
	                    <th>No. Telp</th>
	                    <th>Actions</th></th>
	                </tr>
	                </thead>
	                <tbody>
	                   	<?php $nomor = 1; ?>
	                    <?php foreach($guru as $sw) : ?>
	                        <tr>
	                            <td><?= $nomor;?> </td>
	                            <?php $nomor++;?>
	                            <td><?= $sw->nip; ?>
	                            </td>
	                            <td><?= $sw->nama; ?></td>
	                            <td><?= $sw->ttl; ?></td>
	                            <td><?= $sw->jabatan; ?></td>
	                            <td><?= $sw->jk; ?></td>
	                            <td><?= $sw->alamat; ?></td>
	                            <td><?= $sw->nope;?></td>
	                            <td class="actions">
	                            	<button type="submit" class="btn-info waves-effect" 
	                                onclick="window.location.href='<?=base_url('admin/guru/read/') . $sw->id_guru; ?>';"><i>Read</i></button>
	                                <button type="submit" class="btn-warning waves-effect" 
	                                onclick="window.location.href='<?=base_url('admin/guru/edit/') . $sw->id_guru; ?>';"><i>Update</i></button>
	                                <button type="submit" class="btn-danger waves-effect" 
	                                onclick="if(confirm('Apakah anda yakin akan menghapus <?= $sw->nama; ?>?')) 
	                                window.location.href='<?=base_url('admin/guru/delete/') . $sw->id_guru; ?>';"><i>Delete</i></button>
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