        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
          <?php endif; ?>

          <?= $this->session->flashdata('message'); ?>
          <a href="<?php echo base_url('admin/add_data'); ?>" class="btn btn-primary">Tambah Data</a>
          <a href="<?php echo base_url('admin/preview'); ?>" class="btn btn-success">Import Data</a>
          
          <div>

            <div class="table table-responsive-sm mt-4">
              <table class="table table-bordered" id="table-ponpes">
                <thead>
                  <tr style="text-align: center;">
                    <th>#</th>
                    <th>Nama</th>
                    <th>Kota/Kabupaten</th>                    
                    <th>Sekolah Asal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0;
                  foreach ($dataMahasiswa as $mahasiswa) {
                    ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $mahasiswa['nama'];?></td>
                      <td><?php echo $mahasiswa['kab/kot'];?></td>
                      <td><?php echo $mahasiswa['asal_sekolah'];?></td>
                      <td>
                        <a class="badge badge-pill badge-success" href="<?php echo base_url('admin/edit_data/') . $mahasiswa['id']; ?>">Edit</a>
                        <a class="badge badge-pill badge-warning" href="<?php echo base_url('admin/detail/') . $mahasiswa['id']; ?>">Detil</a>
                        <a class="badge badge-pill badge-danger" data-toggle="modal" data-target="#modalHapus" href="<?php echo base_url('admin/hapus/') . $mahasiswa['id']; ?>">Hapus</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>

          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Delete Modal -->

      <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus data?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Yakin ingin menghapus "<?php echo $mahasiswa['id']; ?>"?</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
              <a class="btn btn-danger" href="<?php echo base_url('admin/hapus/') . $mahasiswa['id']; ?>">Hapus</a>
            </div>
          </div>
        </div>
      </div>