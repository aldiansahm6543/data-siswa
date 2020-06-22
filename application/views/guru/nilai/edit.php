<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="container-fluid">
              <p class="no-margin-bottom text-white "><?= $judul; ?></p>
            </div>
          </header>
      <div class="container mt-3"> 

          <div class="col-lg-10 mx-auto">
        
                  <div class="card">
                    <div class="card-header d-flex align-items-center bg-info">
                      <h3 class="h4 text-white">Format</h3>
                    </div>
                    <div class="card-body">
                      <form action="<?= base_url('guru/nilai/do_edit'); ?>" method="post" enctype="multipart/form-data">  
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Siswa</label>
                            <div class="col-sm-10">
                              <input type="hidden" name="id_nilai" value="<?= $nilai_siswa->id_nilai ?>">
                              <input type="hidden" name="nik_siswa" value="<?= $nilai_siswa->nik_siswa ?>">
                              <input type="text" class="form-control" value="<?= $nilai_siswa->nama; ?>"readonly>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Kelas</label>
                            <div class="col-sm-10">
                              <input type="hidden" name="kelas">
                              <input type="text" class="form-control" value="<?= $nilai_siswa->nama_ruangan; ?>" readonly>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Mata Pelajaran</label>
                            <div class="col-sm-10">
                              <select name="mapel" class="form-control">
                                <?php foreach($mapel as $m) : ?>
                                  <?php if ($m->kode_mapel == $nilai_siswa->kode_mapel): ?>
                                    <option value="<?= $m->kode_mapel ?>"  selected><?= $m->nama_mapel ?></option>
                                  <?php else: ?>
                                    <option value="<?= $m->kode_mapel ?>"><?= $m->nama_mapel ?></option>
                                  <?php endif; ?>
                                <?php endforeach;?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Semester</label>
                            <div class="col-sm-10">
                              <select name="semester" class="form-control">
                                <option value="<?= $nilai_siswa->semester; ?>" selected readonly><?= $nilai_siswa->semester; ?></option>
                                <option value="genap">Genap</option>
                                <option value="ganjil">Ganjil</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Tahun Ajaran</label>
                            <div class="col-sm-10">
                              <select name="thn_ajaran" class="form-control required">
                                <option value="<?= $nilai_siswa->thn_ajaran; ?>" selected><?= $nilai_siswa->thn_ajaran; ?></option>
                                <?php for($i=2014;$i<=2020;$i++){$a = $i+1; echo "<option>$i-$a</option>";}?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Tugas</label>
                            <div class="col-sm-10">
                              <input type="number" name="tugas" class="form-control" value="<?= $nilai_siswa->tugas; ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">UTS</label>
                            <div class="col-sm-10">
                              <input type="number" name="uts" class="form-control" value="<?= $nilai_siswa->uts; ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">UAS</label>
                            <div class="col-sm-10">
                              <input type="number" name="uas" class="form-control" value="<?= $nilai_siswa->uas; ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                          </div>                                 
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          