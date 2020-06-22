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
                   Jadwal pelajaran <?= $this->session->flashdata('info'); ?> <a href="<?= base_url('admin/jadwal_pelajaran/lihatdata') ?>">Lihat Data</a>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php endif;     ?>
        
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Format</h3>
                    </div>
                    <div class="card-body mx-4">
                      <form action="<?= base_url('admin/jadwal_pelajaran/input'); ?>" method="post" enctype="multipart/form-data">  
                        <div class="form-group">
                            <label class="control-label">Kelas</label>
                                <select name="id_kelas" class="form-control" >
                                    <option></option>
                                    <?php foreach($kelas as $ks) : ?>
                                        <option value="<?= $ks->id;?>"><?= $ks->nama_ruangan;?></option>
                                    <?php endforeach;?>
                                </select>
                        </div>
                        <div class="form-group">
                            <label class=" control-label">Mata Pelajaran</label>
                                <select name="kode_mapel" class="form-control" >
                                    <option></option>
                                    <?php foreach($mapel as $ks) : ?>
                                        <option value="<?= $ks->kode_mapel;?>"><?= $ks->nama_mapel;?></option>
                                    <?php endforeach;?>
                                </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Hari</label>
                                <select name="hari" class="form-control" >
                                    <option></option>
                                    <option value="senin">Senin</option>
                                    <option value="selasa">Selasa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumat">Jumat</option>
                                    <option value="sabtu">Sabtu</option>
                                </select>
                        </div>

                        <div class="form-group">
                        <label class="control-label">Jam Pelajaran</label>
                            <div class="row ">
                            <div class="col">
                                <select name="jam_awal" class="form-control" >

                                    <?php
                                    for($i=7; $i<=17;$i++)
                                    {
                                        if($i <= 9){$i = "0$i";}
                                        echo "<option>$i</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col">
                                <select name="menit_awal" class="form-control" >

                                    <?php
                                    for($i=0; $i<=59;$i++)
                                    {
                                        if($i <= 9){$i = "0$i";}
                                        echo "<option>$i</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="">
                                <p style="margin-top: 7px; text-align: center;">s/d</p>
                            </div>
                            <div class="col">
                                <select name="jam_akhir" class="form-control" >

                                    <?php
                                    for($i=7; $i<=17;$i++)
                                    {
                                        if($i <= 9){$i = "0$i";}
                                        echo "<option>$i</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col">
                                <select name="menit_akhir" class="form-control" >

                                    <?php
                                    for($i=0; $i<=59;$i++)
                                    {
                                        if($i <= 9){$i = "0$i";}
                                        echo "<option>$i</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" control-label">Guru</label>
                                <select name="nip" class="form-control" >
                                    <option disabled selected></option>
                                    <?php foreach($guru as $gr) : ?>
                                        <option value="<?= $gr->nip;?>"><?= $gr->nama;?></option>
                                    <?php endforeach;?>
                                </select>
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
          