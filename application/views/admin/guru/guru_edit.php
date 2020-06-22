<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="container-fluid">
              <p class="no-margin-bottom text-white "><?= $judul; ?></p>
            </div>
          </header>
      <div class="container mt-3"> 

          <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <form action="<?= base_url('admin/guru/do_edit'); ?>" method="post" enctype="multipart/form-data">                                   
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">NIP</label>
                                            <div class="col-md-10">
                                                <input type="hidden" name="id_guru" value="<?= $guru->id_guru ?>">
                                                <input type="text" name="nip" class="form-control" value="<?= $guru->nip; ?>" readonly>
                                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Nama Guru</label>
                                            <div class="col-md-10">
                                                <input type="text" name="nama" class="form-control" value="<?= $guru->nama; ?>">
                                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >TTL</label>
                                            <div class="row">
                                            <div class="col-md-4 ml-3">
                                                <input type="text" name="ttl"  class="form-control" placeholder="Tempat" value="<?= $guru->ttl; ?>">
                                                <?= form_error('ttl', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-2 control-label" >Warganegara</label>
                                            <div class="col-md-10">
                                                <input type="text" name="warganegara"  class="form-control" value="<?= $guru->warganegara; ?>">
                                                <?= form_error('warganegara', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Agama</label>
                                            <div class="col-md-3">
                                                <select class="custom-select" name="agama">
                                                  <option value="<?= $guru->agama; ?>" selected>Islam</option>
                                                  <option >Two</option>
                                                  <option >Three</option>
                                                </select>
                                                <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Jabatan</label>
                                            <div class="col-md-10">
                                                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="<?= $guru->jabatan; ?>">
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
                                                <input type="text" name="nope" class="form-control" placeholder="Nomor Handphone" value="<?= $guru->nope; ?>">
                                                <?= form_error('nope', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Alamat</label>
                                            <div class="col-md-10">
                                                <textarea name="alamat" class="form-control" rows="5"><?= $guru->alamat; ?></textarea>
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
                                              <input type="submit" class="btn btn-info waves-effect waves-light" value="Edit">
                                          </div>
                                      </div>
                                  </form>
                    </div>
                  </div>
                </div>
              </div>
          