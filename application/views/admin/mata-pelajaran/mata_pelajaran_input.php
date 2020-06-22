<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="container-fluid">
              <p class="no-margin-bottom text-white "><?= $judul; ?></p>
            </div>
          </header>
      <div class="container mt-3"> 

          <div class="col-lg-7 mx-auto mt-5">
            <?php if ($this->session->flashdata('info')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   Data mapel <?= $this->session->flashdata('info'); ?> <a href="<?= base_url('admin/mata_pelajaran/lihatdata') ?>">Lihat Data</a>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php endif; ?>
        
                  <div class="card p-4">
                    <div class="card-body mx-auto">
                        <form action="<?= base_url('admin/mata_pelajaran/input'); ?>" method="post">  
                            <div class="form-group">
                                <label class="control-label">Kode Mata Pelajaran</label>
                                    <input type="text" name="kode_mapel" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="example-email">Nama Mata Pelajaran</label>
                                    <input type="text" name="nama_mapel" class="form-control " placeholder="">
                            </div>
                            <div class="form-group m-b-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                  <button type="submit" class="btn btn-info waves-effect waves-light">Tambah</button>
                              </div>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
          