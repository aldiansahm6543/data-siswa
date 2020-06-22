<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="container-fluid">
              <p class="no-margin-bottom text-white "><?= $judul; ?></p>
            </div>
          </header>
      <div class="container mt-3"> 

          <div class="col-lg-12">
            <?php if ($this->session->flashdata('info')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   Data Guru <?= $this->session->flashdata('info'); ?> <a href="<?= base_url('admin/guru/lihatdata') ?>">Lihat Data</a>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php endif;     ?>
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Format</h3>
                    </div>
                    <div class="card-body">
                      <form action="<?= base_url('admin/guru/do_input'); ?>" method="post" enctype="multipart/form-data">                                   
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">NIP</label>
                                            <div class="col-md-10">
                                                <input type="text" name="nip" class="form-control">
                                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Password</label>
                                            <div class="row">
                                            <div class="col-md-5">
                                                <input type="password" name="password1" class="form-control ml-3" placeholder="Buat password">
                                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="password" name="password2" class="form-control ml-3" placeholder="Konfirmasi password">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Nama Guru</label>
                                            <div class="col-md-10">
                                                <input type="text" name="nama" class="form-control">
                                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >TTL</label>
                                            <div class="row">
                                            <div class="col-md-4 ml-3">
                                                <input type="text" name="ttl1"  class="form-control" placeholder="Tempat">
                                                <?= form_error('ttl1', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-4 ml-3">
                                                <input type="text" name="ttl2" class="form-control" placeholder="Tanggal Lahir">
                                                <?= form_error('ttl2', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-2 control-label" >Warganegara</label>
                                            <div class="col-md-10">
                                                <input type="text" name="warganegara"  class="form-control">
                                                <?= form_error('warganegara', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Agama</label>
                                            <div class="col-md-3">
                                                <select class="custom-select" name="agama">
                                                  <option value="islam" >Islam</option>
                                                  <option >Two</option>
                                                  <option >Three</option>
                                                </select>
                                                <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Jabatan</label>
                                            <div class="col-md-10">
                                                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                                                <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Jenis Kelamain</label>
                                            <div class="col-md-10">
                                                <input type="radio" name="jk" id="optionsRadios2" value="L"> L
                                                <input type="radio" class="ml-3"  name="jk" id="optionsRadios2" value="P"> P
                                                <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >No. Handphone</label>
                                            <div class="col-md-10">
                                                <input type="text" name="nope" class="form-control" placeholder="Nomor Handphone">
                                                <?= form_error('nope', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Alamat</label>
                                            <div class="col-md-10">
                                                <textarea name="alamat" class="form-control" rows="5"></textarea>
                                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Upload Photo</label>
                                            <div class="col-md-10">
                                                <input type="file" name="gambar">
                                            </div>
                                        </div>
                                        <div class="form-group m-b-0">
                                            <div class="col-sm-offset-2 col-sm-9">
                                              <input type="submit" class="btn btn-info waves-effect waves-light" value="Tambah">
                                          </div>
                                      </div>
                                  </form>
                    </div>
                  </div>
                </div>
              </div>
          