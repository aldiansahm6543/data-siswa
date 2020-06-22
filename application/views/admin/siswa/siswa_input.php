<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="container-fluid">
              <p class="no-margin-bottom text-white "><?= $judul; ?></p>
            </div>
          </header>
      <div class="container mt-3"> 

          <div class="col-lg-12 mx-auto">
            <?php if ($this->session->flashdata('info')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   Data siswa <?= $this->session->flashdata('info'); ?> <a href="<?= base_url('admin/siswa/lihatdata'); ?>">Lihat Data</a>
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
                      <form action="<?= base_url('admin/siswa/do_input'); ?>" method="post" enctype="multipart/form-data">                                   
                                       <div class="form-group">
                                            <label class="col-md-2 control-label">NIK</label>
                                            <div class="col-md-10">
                                                <input type="text" name="nik" class="form-control" value="">
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
                                            <label class="col-md-2 control-label">Kelas</label>
                                            <div class="col-md-10">
                                                <select name="id_kelas" class="form-control">
                                                    <option disabled selected>Pilih Kelas</option>
                                                    <?php foreach($kelas as $ks) : ?>
                                                        <option value="<?=$ks->id;?>"><?=$ks->nama_ruangan;?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nama Siswa</label>
                                            <div class="col-md-10">
                                                <input type="text" name="nama" class="form-control">
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
                                                    <option disabled selected>Tahun Ajaran</option>
                                                    <?php for($i=2009;$i<=2100;$i++){$a = $i+1; echo "<option>$i-$a</option>";}?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">TTL</label>
                                            <div class="row mx-auto">
                                            <div class="col-md-5">
                                                <input type="text" name="ttl1" class="form-control" placeholder="Tempat">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="ttl2" class="form-control" placeholder="Tanggal Lahir">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">No. Handphone</label>
                                            <div class="col-md-10">
                                                <input type="number" name="nope" class="form-control" placeholder="Nomor Handphone">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Alamat</label>
                                            <div class="col-md-10">
                                                <textarea name="alamat" class="form-control" rows="5"></textarea>
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
                                                <button type="submit" class="btn btn-info waves-effect waves-light">Tambah</button>
                                            </div>
                                        </div>
                                  </form>
                    </div>
                  </div>
                </div>
              </div>
          