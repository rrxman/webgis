<h1 style="margin: 20px"><?= $title; ?></h1>
<div class="card mb-3" style="width: 100%; height: 580px">
  <div class="row no-gutters">
    <div class="col-md-5">
        <div id="mapid" class="sidebar-map"></div>
    </div>
    <div class="col-md-7">
      <div class="card-body">
        <h5 class="card-title"><?= $dataSekolah['nama_sklh']; ?></h5>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th>Alamat</th>
                <td>
                    <?= $dataSekolah['alamat']; ?>
                </td>
            </tr>
            <tr>
                <th>Latitude</th>
                <td><?= $dataSekolah['lat']; ?></td>
            </tr>
            <tr>
                <th>Longitude</th>
                <td><?= $dataSekolah['lon']; ?></td>
            </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
