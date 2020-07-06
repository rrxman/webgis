        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
          <?php endif; ?>
          <form action="<?= base_url('admin/add_sekolah'); ?>" method="post">
            <div class="body">
                <div class="form-group">
                  <label for="nama">Nama Sekolah</label>
                  <input type="hidden" name="id" id="id" value="<?php echo $getCode; ?>">
                  <input type="hidden" name="updater" id="updater" value="<?php echo $user['email']; ?>">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Sekolah" onfocus="true">
                </div>
              <div class="form-group">
                <label for="alamat">Alamat Sekolah</label>
                <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" rows="4"></textarea>
              </div>
              <div class="row mb-3">
                <div class="col-lg-6">
                  <label for="lat">Latitude</label>
                  <input type="text" class="form-control" id="lat" name="lat" placeholder="Masukkan Latitude" onfocus="true">
                </div>
                <div class="col-lg-6">
                  <label for="lon">Longitude</label>
                  <input type="text" class="form-control" id="lon" name="lon" placeholder="Masukkan Longitude" onfocus="true">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->