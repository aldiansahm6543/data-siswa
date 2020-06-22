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
                        <form action="<?= base_url('admin/mata_pelajaran/do_edit'); ?>" method="post">  
                            <div class="form-group">
                                <label class="control-label">Kode Mata Pelajaran</label>
                                  <input type="hidden" name="id" value="<?= $mapel->id ?>">
                                    <input type="text" name="kode_mapel" class="form-control" value="<?= $mapel->kode_mapel; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nama Mata Pelajaran</label>
                                    <input type="text" name="nama_mapel" class="form-control" value="<?= $mapel->nama_mapel; ?>">
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
          