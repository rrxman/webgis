        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <form action="<?= base_url('admin/update_data'); ?>" method="post">
            <div class="body">
              <div class="row mb-3">
                <div class="col-lg-4">
                  <label for="nama">Nama Mahasiswa</label>
                  <input type="hidden" name="id" id="id" value="<?php echo $pontren['id']; ?>">
                  <input type="hidden" name="updater" id="updater" value="<?php echo $user['email']; ?>">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa" onfocus="true" value="<?php echo $pontren['nama']?>">
                </div>
                <div class="col-lg-8">
                  <label for="jk">Jenis Kelamin</label>
                  <select name="jk" id="jk" class="form-control">
                    <option value="">Pilih Jenis Kelamin</option>
                    <?php foreach($jk as $j) : ?>
                      <option value="<?= $j['id_jk']; ?>" <?php echo $j['id_jk'] == $pontren['jk'] ? "selected" : null ?>><?= $j['jk']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="wn">Kewarganegaraan</label>
                <select name="wn" id="wn" class="form-control">
                    <option value="">Pilih Kewarganegaraan</option>
                    <?php foreach($warganegara as $w) : ?>
                      <option value="<?= $w['id_warga']; ?>" <?php echo $w['id_warga'] == $pontren['kewarganegaraan'] ? "selected" : null ?>><?= $w['warga']; ?></option>
                    <?php endforeach; ?>
                  </select>
              </div>
              <div class="form-group">
                <label for="stts">Status Sipil</label>
                <select name="stts" id="stts" class="form-control">
                  <option value="">Pilih Status</option>
                  <?php foreach($stts as $s) : ?>
                    <option value="<?= $s['id_stts']; ?>" <?php echo $s['id_stts'] == $pontren['stts_sipil'] ? "selected" : null ?>><?= $s['status']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="row mb-3">
                <div class="col-lg-4">
                  <label for="kec">Kecamatan</label>
                  <select name="kec" id="kec" class="form-control">
                    <option value="">Pilih Kecamatan</option>
                    <?php foreach($dataKecamatan as $kec) : ?>
                      <option value="<?= $kec['id_kecamatan']; ?>" <?php echo $kec['id_kecamatan'] == $pontren['kec'] ? "selected" : null ?>><?= $kec['kec']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-4">
                  <label for="kab">Kabupaten</label>
                  <select name="kab" id="kab" class="form-control">
                    <option value="">Pilih Kabupaten</option>
                    <?php foreach($dataKabupaten as $kab) : ?>
                      <option value="<?= $kab['id']; ?>" <?php echo $kab['id'] == $pontren['kab/kot'] ? "selected" : null ?>><?= $kab['kab']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-4">
                  <label for="sklh">Provinsi</label>
                  <select name="prov" id="prov" class="form-control">
                    <option value="">Pilih Provinsi</option>
                    <?php foreach($dataProvinsi as $prov) : ?>
                      <option value="<?= $prov['id']; ?>" <?php echo $prov['id'] == $pontren['prov'] ? "selected" : null ?>><?= $prov['prov']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" rows="4"><?php echo $pontren['alamat']?></textarea>
              </div>
              <div class="row mb-3">
                <div class="col-lg-6">
                  <label for="lat">Latitude</label>
                  <input type="text" class="form-control" id="lat" name="lat" placeholder="Masukkan Latitude" onfocus="true" value="<?php echo $pontren['lat']?>">
                </div>
                <div class="col-lg-6">
                  <label for="lon">Longitude</label>
                  <input type="text" class="form-control" id="lon" name="lon" placeholder="Masukkan Longitude" onfocus="true" value="<?php echo $pontren['lon']?>">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-6">
                  <label for="sekolah">Asal Sekolah</label>
                  <!-- <input type="text" class="form-control" id="sekolah" name="sekolah" placeholder="Masukkan Asal Sekolah"> -->
                  <select name="sklh" id="sklh" class="form-control">
                    <option value="">Pilih Sekolah</option>
                    <?php foreach($dataSekolah as $sklh) : ?>
                      <option value="<?= $sklh['id']; ?>" <?php echo $sklh['id'] == $pontren['asal_sekolah'] ? "selected" : null ?>><?= $sklh['nama_sklh']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-6">
                  <label for="jurusan">Jurusan & Tahun Lulus</label>
                  <div class="row">
                    <div class="col-8 col-lg-6">  
                      <select name="jurusan" id="jurusan" class="form-control">
                        <option value="">Pilih Jurusan</option>
                        <?php foreach($jurusan as $j) : ?>
                          <option value="<?= $j['id_jurus']; ?>" <?php echo $j['id_jurus'] == $pontren['jurusan'] ? "selected" : null ?>><?= $j['jurusan']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-4 col-lg-6">
                      <input type="text" class="form-control" id="lulus" name="lulus" placeholder="Tahun Lulus" value="<?php echo $pontren['thn_lulus']?>">
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
                      <option value="<?= $prodi['id']; ?>" <?php echo $prodi['id'] == $pontren['prodi1'] ? "selected" : null ?>><?= $prodi['prodi']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-4">
                  <label for="prodi2">Program Studi 2</label>
                  <select name="prodi2" id="prodi2" class="form-control">
                    <option value="">Pilih Prodi 2</option>
                    <?php foreach($dataProdi as $prodi) : ?>
                      <option value="<?= $prodi['id']; ?>" <?php echo $prodi['id'] == $pontren['prodi2'] ? "selected" : null ?>><?= $prodi['prodi']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-4">
                  <label for="prodi3">Program Studi 3</label>
                  <select name="prodi3" id="prodi3" class="form-control">
                    <option value="">Pilih Prodi 3</option>
                    <?php foreach($dataProdi as $prodi) : ?>
                      <option value="<?= $prodi['id']; ?>" <?php echo $prodi['id'] == $pontren['prodi3'] ? "selected" : null ?>><?= $prodi['prodi']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="prestasi">Detail Prestasi</label>
                <textarea type="text" class="form-control" id="prestasi" name="prestasi" placeholder="Masukkan Detail Prestasi" rows="4"><?php echo $pontren['dtail_pres']?></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Detail Modal -->
      <div class="modal fade" id="modalUnit" tabindex="-1" role="dialog" aria-labelledby="modalUnitLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalUnitLabel">Unit Pendidikan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <ul class="list-group">
              <?php foreach ($ponpes_unit as $unit) { ?>
                <li class="list-group-item"><?php echo $unit['nama_unit']; ?></li>
              <?php } ?>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          </div>
        </div>
      </div>
    </div>