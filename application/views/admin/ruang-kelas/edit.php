<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="container-fluid">
              <p class="no-margin-bottom text-white "><?= $judul; ?></p>
            </div>
          </header>
      <div class="container mt-3"> 

          <div class="col-lg-7 mx-auto mt-5">
                  <div class="card p-4">
                    <div class="card-body mx-auto">
                        <form action="<?= base_url('admin/ruang_kelas/do_edit'); ?>" method="post">  
                            <div class="form-group">
                                <label class="control-label">Kelas</label>
                                    <input type="hidden" name="id" value="<?= $kelas->id; ?>">
                                    <input type="text" name="nama" class="form-control" value="<?= $kelas->nama_ruangan; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control" value="<?= $kelas->jumlah_siswa; ?>">
                            </div>
                            <div class="form-group m-b-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                  <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                              </div>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
          