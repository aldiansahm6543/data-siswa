<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="container-fluid">
              <p class="no-margin-bottom text-white "><?= $judul; ?></p>
            </div>
          </header>
      <div class="container mt-3"> 

          <div class="col-lg-12 mx-auto">
        
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Format</h3>
                    </div>
                    <div class="card-body">
                      <form action="<?= base_url('admin/siswa/do_edit'); ?>" method="post" enctype="multipart/form-data">                                   
                           <div class="form-group">
                                <label class="col-md-2 control-label">NIS</label>
                                <div class="col-md-10">
                                    <input type="hidden" name="id_siswa" value="<?= $siswa->id_siswa ?>">
                                    <input type="text" name="nik" class="form-control" value="<?= $siswa->nik ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Kelas</label>
                                <div class="col-md-10">
                                    <select name="id_kelas" class="form-control">
                                        <option disabled selected>Pilih Kelas</option>
                                        <?php foreach($kelas as $ks) : ?>
                                            <?php if ($ks->id == $siswa->id_kelas): ?>
                                            <option value="<?= $ks->id ?>"  selected><?= $ks->nama_ruangan ?></option>
                                          <?php else: ?>
                                            <option value="<?= $ks->id ?>" ><?= $ks->nama_ruangan ?></option>
                                          <?php endif; ?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Nama Siswa</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama" class="form-control" value="<?= $siswa->nama ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">Jenis Kelamin</label>
                                <div class="col-md-10">
                                    <input type="radio" name="jk" value="L"> Laki-Laki
                                    <input type="radio" class="ml-3" name="jk" value="P"> Perempuan
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" >Agama</label>
                                <div class="col-md-3">
                                    <select class="custom-select" name="agama">
                                     <option value="<?= $siswa->agama; ?>" readonly><?= $siswa->agama; ?></option>
                                      <option >Islam</option>
                                      <option >Hindu</option>
                                      <option >Budha</option>
                                    </select>
                                    <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Tahun Ajaran</label>
                                <div class="col-md-10">
                                    <select name="thn_ajaran" class="form-control">
                                        <option value="<?= $siswa->thn_ajaran; ?>" selected><?= $siswa->thn_ajaran; ?></option>
                                         <?php for($i=2014;$i<=2020;$i++){$a = $i+1; echo "<option>$i-$a</option>";}?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">TTL</label>
                                <div class="col-md-10">
                                    <input type="text" name="ttl" class="form-control" value="<?= $siswa->ttl; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">No. Handphone</label>
                                <div class="col-md-10">
                                    <input type="number" name="nope" class="form-control" value="<?= $siswa->nope; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Alamat</label>
                                <div class="col-md-10">
                                    <textarea name="alamat" class="form-control" rows="5" ><?= $siswa->alamat; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Upload Photo</label>
                                <div class="col-md-10">
                                    <img src="<?= base_url('asset/img/siswa/') . $siswa->photo; ?>" style="width: 7rem;"> <br/>
                                    <input type="file" name="gambar" value="<?= $siswa->photo; ?>">
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Tambah</button>
                                </div>
                            </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          