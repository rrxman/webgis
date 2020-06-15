        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
          <?php endif; ?>
          <form action="<?= base_url('admin/add_data'); ?>" method="post">
            <div class="body">
              <div class="row mb-3">
                <div class="col-lg-4">
                  <label for="nama">Nama Mahasiswa</label>
                  <input type="hidden" name="id" id="id" value="<?php echo $getCode; ?>">
                  <input type="hidden" name="updater" id="updater" value="<?php echo $user['email']; ?>">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa" onfocus="true">
                </div>
                <div class="col-lg-8">
                  <label for="jk">Jenis Kelamin</label>
                  <select name="jk" id="jk" class="form-control">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="1">Laki-laki</option>
                    <option value="2">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="wn">Kewarganegaraan</label>
                <select name="wn" id="wn" class="form-control">
                    <option value="">Pilih Kewarganegaraan</option>
                    <option value="1">WNI</option>
                    <option value="2">WNI Keturunan</option>
                    <option value="3">WNA</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="stts">Status Sipil</label>
                <select name="stts" id="stts" class="form-control">
                  <option value="">Pilih Status</option>
                  <option value="1">Menikah</option>
                  <option value="2">Belum Menikah</option>
                  <option value="3">Janda</option>
                  <option value="4">Duda</option>
                </select>
              </div>
              <div class="row mb-3">
                <div class="col-lg-4">
                  <label for="kec">Kecamatan</label>
                  <select name="kec" id="kec" class="form-control">
                    <option value="">Pilih Kecamatan</option>
                    <?php foreach($dataKecamatan as $kec) : ?>
                      <option value="<?= $kec['id_kecamatan']; ?>"><?= $kec['kec']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-4">
                  <label for="kab">Kabupaten</label>
                  <select name="kab" id="kab" class="form-control">
                    <option value="">Pilih Kabupaten</option>
                    <?php foreach($dataKabupaten as $kab) : ?>
                      <option value="<?= $kab['id']; ?>"><?= $kab['kab']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-4">
                  <label for="sklh">Provinsi</label>
                  <select name="prov" id="prov" class="form-control">
                    <option value="">Pilih Provinsi</option>
                    <?php foreach($dataProvinsi as $prov) : ?>
                      <option value="<?= $prov['id']; ?>"><?= $prov['prov']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
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
              <div class="row mb-3">
                <div class="col-lg-6">
                  <label for="sekolah">Asal Sekolah</label>
                  <!-- <input type="text" class="form-control" id="sekolah" name="sekolah" placeholder="Masukkan Asal Sekolah"> -->
                  <select name="sklh" id="sklh" class="form-control">
                    <option value="">Pilih Sekolah</option>
                    <?php foreach($dataSekolah as $sklh) : ?>
                      <option value="<?= $sklh['id']; ?>"><?= $sklh['nama_sklh']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-6">
                  <label for="jurusan">Jurusan & Tahun Lulus</label>
                  <div class="row">
                    <div class="col-8 col-lg-6">  
                      <select name="jurusan" id="jurusan" class="form-control">
                        <option value="">Pilih Jurusan</option>
                        <option value="1">IPA</option>
                        <option value="2">IPS</option>
                        <option value="3">Bahasa</option>
                        <option value="4">Lainnya</option>
                      </select>
                    </div>
                    <div class="col-4 col-lg-6">
                      <input type="text" class="form-control" id="lulus" name="lulus" placeholder="Tahun Lulus">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-4">
                  <label for="prodi1">Program Studi 1</label>
                  <select name="prodi1" id="prodi1" class="form-control">
                    <option value="">Pilih Prodi 1</option>
                    <?php foreach($dataProdi as $prodi) : ?>
                      <option value="<?= $prodi['id']; ?>"><?= $prodi['prodi']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-4">
                  <label for="prodi2">Program Studi 2</label>
                  <select name="prodi2" id="prodi2" class="form-control">
                    <option value="">Pilih Prodi 2</option>
                    <?php foreach($dataProdi as $prodi) : ?>
                      <option value="<?= $prodi['id']; ?>"><?= $prodi['prodi']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-4">
                  <label for="prodi3">Program Studi 3</label>
                  <select name="prodi3" id="prodi3" class="form-control">
                    <option value="">Pilih Prodi 3</option>
                    <?php foreach($dataProdi as $prodi) : ?>
                      <option value="<?= $prodi['id']; ?>"><?= $prodi['prodi']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="prestasi">Detail Prestasi</label>
                <textarea type="text" class="form-control" id="prestasi" name="prestasi" placeholder="Masukkan Detail Prestasi" rows="4"></textarea>
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