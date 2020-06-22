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
                   Data Kelas <?= $this->session->flashdata('info'); ?> <a href="<?= base_url('admin/ruang_kelas/lihatdata'); ?>">Lihat Data</a>
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
                      <form action="<?= base_url('admin/ruang_kelas/do_input'); ?>" method="post" enctype="multipart/form-data">                                   
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Input Select</label>
                                <div class="row">
                                <div class="col-sm-2 ml-3">
                                    <select name="nama1" class="form-control">
                                        <option>X</option>
                                        <option>XI</option>
                                        <option>XII</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 ml-3">
                                    <select name="nama2" class="form-control">
                                        <option>RPL</option>
                                        <option>MM</option>
                                        <option>TKR</option>
                                        <option>TSM</option>
                                        <option>AK</option>
                                        <option>APH</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 ml-3">
                                    <select name="nama3" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="example-email">Jumlah Siswa</label>
                                <div class="col-md-8">
                                    <input type="number" maxlength="2" name="jumlah_siswa" id="example-email" class="form-control" placeholder="">
                                </div>
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
          