       <!-- Navbar -->
      <nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="container">
            <img class="logo" src="<?= base_url();?>assets/img/unim.png" alt="" href="<?php echo base_url('welcome'); ?>">
            <h5 class="text ml-5 mt-1">Sistem Informasi Geografis</h5>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link <?php if($this->uri->segment(2) == "") { echo "active"; } ?>" href="<?php echo base_url('welcome') ?>">Beranda<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link <?php if($this->uri->segment(2) == "map") { echo "active"; } ?>" href="<?php echo base_url('welcome/map'); ?>">Peta</a>
                <a class="nav-item nav-link <?php if($this->uri->segment(2) == "about") { echo "active"; } ?>" href="<?php echo base_url('welcome/about') ?>">Tentang Kami</a>
                <a class="nav-item nav-link <?php if($this->uri->segment(2) == "contact") { echo "active"; } ?>" href="<?php echo base_url('welcome/contact') ?>">Kontak Kami</a>
                <a class="nav-item btn btn-primary" href="<?= base_url('auth'); ?>">Masuk</a>
              </div>
            </div>
          </div>
        </nav>
      </nav>
      <!-- End Navbar -->