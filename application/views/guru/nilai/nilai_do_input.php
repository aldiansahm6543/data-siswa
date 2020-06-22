<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="container-fluid">
              <p class="no-margin-bottom text-white "><?= $judul; ?></p>
            </div>
          </header>
      <div class="container mt-3"> 

          <div class="col-lg-10 mx-auto">
            <?php if ($this->session->flashdata('info')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   Data siswa <?= $this->session->flashdata('info'); ?> <a href="#">Lihat Data</a>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php endif;     ?>
        
                  <div class="card">
                    <div class="card-header d-flex align-items-center bg-info">
                      <h3 class="h4 text-white">Format</h3>
                    </div>
                    <div class="card-body">
                      <form action="<?= base_url('guru/nilai/insert'); ?>" method="post" enctype="multipart/form-data">  
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Siswa</label>
                            <div class="col-sm-10">
                              <input type="hidden" name="nik_siswa" value="<?= $siswa->nik; ?>" >
                              <input type="text" class="form-control" value="<?= $siswa->nama; ?>"readonly>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Kelas</label>
                            <div class="col-sm-10">
                              <input type="hidden" name="kelas" value="<?= $siswa->id; ?>">
                              <input type="text" class="form-control" value="<?= $siswa->nama_ruangan; ?>" readonly>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Mata Pelajaran</label>
                            <div class="col-sm-10">
                              <select name="mapel" class="form-control">
                                <option disabled selected="">Pilih Mapel</option>
                                <?php foreach($mapel as $mapel) : ?>
                                  <option value="<?=$mapel->kode_mapel;?>"><?=$mapel->nama_mapel;?></option>
                                <?php endforeach;?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Semester</label>
                            <div class="col-sm-10">
                              <select name="semester" class="form-control">
                                <option disabled selected="">Pilih Semester</option>
                                <option value="genap">Genap</option>
                                <option value="ganjil">Ganjil</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Tahun Ajaran</label>
                            <div class="col-sm-10">
                              <select name="thn_ajaran" class="form-control required">
                                <option disabled selected>Tahun Ajaran</option>
                                <?php for($i=2009;$i<=2100;$i++){$a = $i+1; echo "<option>$i-$a</option>";}?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Tugas</label>
                            <div class="col-sm-10">
                              <input type="number" name="tugas" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">UTS</label>
                            <div class="col-sm-10">
                              <input type="number" name="uts" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">UAS</label>
                            <div class="col-sm-10">
                              <input type="number" name="uas" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-default">Input Nilai</button>
                            </div>
                          </div>                                 
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          