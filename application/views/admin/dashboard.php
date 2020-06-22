
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="container-fluid">
              <p class="no-margin-bottom text-white ">Dashboard</p>
            </div>
          </header>

          <!-- Profile -->
          <img src="<?= base_url('asset/') ?>img/smkn1.jpg" width="50%" style="height: 326px;"><img src="<?= base_url('asset/') ?>img/smkn-1.jpg" width="50%" style="height: 326px;">
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts">
            <div class="container-fluid" align="center">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <a href="<?= base_url('admin/siswa/lihatdata'); ?>">
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title"><span>Jumlah<br>Siswa</span>
                      <div class="progress">
                        <div role="progressbar" style="width: <?= $total_siswa; ?>%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?= $total_siswa; ?></strong></div>
                  </div>
                </div></a>
                <!-- Item -->
                <a href="<?= base_url('admin/ruang_kelas/lihatdata'); ?>">
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="icon-padnote"></i></div>
                    <div class="title"><span>Jumlah<br>Kelas</span>
                      <div class="progress">
                        <div role="progressbar" style="width: <?= $total_kelas; ?>%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?= $total_kelas; ?></strong></div>
                  </div>
                </div>
                </a>
                <!-- Item -->
                <a href="<?= base_url('admin/guru/lihatdata'); ?>">
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="icon-bill"></i></div>
                    <div class="title"><span>Jumlah<br>Guru</span>
                      <div class="progress">
                        <div role="progressbar" style="width: <?= $total_guru; ?>%; height: 4px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?= $total_guru; ?></strong></div>
                  </div>
                </div>
                </a>
                <!-- Item -->
                <a href="<?= base_url('admin/mata_pelajaran/lihatdata'); ?>">
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="icon-check"></i></div>
                    <div class="title"><span>Jumlah<br>Mapel</span>
                      <div class="progress">
                        <div role="progressbar" style="width: <?= $total_mapel; ?>%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?= $total_mapel; ?></strong></div>
                  </div>
                </div>
                </a>
              </div>
            </div>
          </section>