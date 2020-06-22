<div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <?php if ($this->session->userdata('level') == 'admin'): ?>
              <div class="avatar"><img src="<?= base_url('asset/') ?>img/default.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <?php elseif ($this->session->userdata('level') == 'guru'): ?>
              <div class="avatar"><img src="<?= base_url('asset/img/guru/') . $user['photo']; ?>" alt="..." class="img-fluid rounded-circle"></div>
            <?php elseif ($this->session->userdata('level') == 'siswa'): ?>
              <div class="avatar"><img src="<?= base_url('asset/img/siswa/') . $user['photo']; ?>" alt="..." class="img-fluid rounded-circle"></div>
            <?php endif; ?>
            <div class="title">
              <h1 class="h4"><?= $this->session->userdata('nama'); ?> </h1>
              <p><?= $this->session->userdata('level'); ?></p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading"><?= $this->session->userdata('level'); ?></span>
          <ul class="list-unstyled">
            <?php if ($this->session->userdata('level') == 'admin'): ?>
            <li ><a href="<?= base_url('admin/dashboard'); ?>"> <i class="icon fas fa-home"></i>Dashboard</a></li>
            <li ><a href="<?= base_url('admin/user'); ?>"> <i class="icon fas fa-users"></i>Data user</a></li>
            <li><a href="#inputdata" aria-expanded="false" data-toggle="collapse"> <i class="icon fas fa-folder-plus"></i>Input data</a>
              <ul id="inputdata" class="collapse list-unstyled ">
                <li><a href="<?= base_url('admin/guru/input') ?>">Guru</a></li>
                <li><a href="<?= base_url('admin/siswa/input') ?>">Siswa</a></li>
                <li><a href="<?= base_url('admin/ruang_kelas/input') ?>">Ruang Kelas</a></li>
                <li><a href="<?= base_url('admin/mata_pelajaran/input') ?>">Mata Pelajaran</a></li>
              </ul>
            </li>
            <li><a href="#lihatdata" aria-expanded="false" data-toggle="collapse"> <i class="icon fas fa-folder"></i>Lihat data</a>
              <ul id="lihatdata" class="collapse list-unstyled ">
                <li><a href="<?= base_url('admin/guru/lihatdata') ?>">Guru</a></li>
                <li><a href="<?= base_url('admin/siswa/lihatdata') ?>">Siswa</a></li>
                <li><a href="<?= base_url('admin/ruang_kelas/lihatdata') ?>">Kelas</a></li>
                <li><a href="<?= base_url('admin/mata_pelajaran/lihatdata') ?>">Mata pelajaran</a></li>
              </ul>
            </li>
            <li><a href="#akademik" aria-expanded="false" data-toggle="collapse"> <i class="icon fas fa-calendar"></i>Jadwal</a>
              <ul id="akademik" class="collapse list-unstyled ">
                <li><a href="<?= base_url('admin/jadwal_pelajaran/input') ?>">Input Jadwal Pelajaran</a></li>
                <li><a href="<?= base_url('admin/jadwal_pelajaran/lihatdata') ?>">Lihat Jadwal Pelajaran</a></li>
              </ul>
            </li>

            <?php elseif ($this->session->userdata('level') == 'guru'): ?>
              <li><a href="<?= base_url('guru/dashboard'); ?>"> <i class="icon fas fa-home"></i>Dashboard</a></li>
              <li><a href="#nilai" aria-expanded="false" data-toggle="collapse"> <i class="icon fas fa-chart-pie"></i>Nilai</a>
              <ul id="nilai" class="collapse list-unstyled ">
                <li><a href="<?= base_url('guru/nilai/input'); ?>"><i class="fas fa-plus"></i>Input Nilai</a></li>
                <li><a href="<?= base_url('guru/nilai/list_nilai') ?>"><i class="far fa-eye"></i>Lihat Nilai</a></li>
              </ul>
              </li>
              <li><a href="<?= base_url('guru/jadwal_pelajaran'); ?>"> <i class="icon far fa-calendar-alt"></i>Jadwal Pelajaran</a></li>

            <?php elseif ($this->session->userdata('level') == 'siswa'): ?>
              <li ><a href="<?= base_url('siswa/dashboard'); ?>"> <i class="icon fas fa-home"></i>Dashboard</a></li>
              <li><a href="#nilai" aria-expanded="false" data-toggle="collapse"> <i class="icon fas fa-chart-pie"></i>Nilai</a>
              <ul id="nilai" class="collapse list-unstyled ">
                <li><a href="<?= base_url('siswa/nilai/semester_ganjil'); ?>">Semester Ganjil</a></li>
                <li><a href="<?= base_url('siswa/nilai/semester_genap') ?>">Semester Genap</a></li>
              </ul>
              </li>
              <li><a href="<?= base_url('siswa/jadwal_pelajaran'); ?>"> <i class="icon far fa-calendar-alt"></i>Jadwal Pelajaran</a></li>
            <?php endif; ?>
          </ul>
        </nav>