<!-- Footer -->
<footer class="Footer warna">
    <div class="text-center">
      <p><?= date('Y'); ?> All Right Reserved by Rohman UNIM</p>
  </div>
</footer>
<!-- End Footer -->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/vendor/leaflet/leaflet.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/leaflet.ajax.js') ?>"></script>
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
<script src="<?php echo base_url('assets/js') ?>/L.Control.Sidebar.js"></script>
<script src="<?php echo base_url('assets/js/leaflet-gps.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/leaflet-search.js'); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/leaflet.groupedlayercontrol.js"></script>
<script type="text/javascript">
    var baseUrl = "<?php echo base_url(); ?>"
    // INISIALISASI MAP
    var mymap = L.map('mapid').setView([-7.561269, 112.440948], 11);
    // LAYER MAP
    var streets = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiZ2l2YW5nIiwiYSI6ImNqeDMydHZ4NzBmaDg0OW5zbjRla3dobXIifQ.qjS0wBxXfvfxJMBB9VPd5g'
    }).addTo(mymap);
    // FULLSCREEN
    mymap.addControl(new L.Control.Fullscreen());
    
    // SIDEBAR
    var sidebar = L.control.sidebar('sidebar', {
        closeButton: true,
        position: 'left'
    });
    mymap.addControl(sidebar);
    mymap.on('click', function () {
        sidebar.hide();
    })

    var sidebar1 = L.control.sidebar('sidebar1', {
        closeButton: true,
        position: 'left'
    });
    mymap.addControl(sidebar1);
    mymap.on('click', function () {
        sidebar1.hide();
    })
    // GPS Tracker
    var gps = new L.Control.Gps({
        // autoActive:true,
        autoCenter:true
    });//inizialize control

    gps
    .on('gps:located', function(e) {
        e.marker.bindPopup('Lokasi Saya: '+e.latlng.toString()).openPopup()
        mymap.getCenter()
    })
    .on('gps:disabled', function(e) {
        e.marker.closePopup()
    }); 
    gps.addTo(mymap);
    // marker
    var mystyle = {
        "color": "#fff",
        "weight": 5,
        "opacity": 0.5
    };

    function optionIconAll (feature, latlng){
        let allIcon = L.icon({
            iconUrl: baseUrl+'assets/img/home.png',
            iconSize:     [30, 30] // size of the icon
        })
        return L.marker(latlng, {icon: allIcon})
    }

    let layerAll = {
        pointToLayer: optionIconAll
    }

        function optionIconKota (feature, latlng){
        let allIcon = L.icon({
            iconUrl: baseUrl+'assets/img/test-marker1.png',
            iconSize:     [30, 30] // size of the icon
        })
        return L.marker(latlng, {icon: allIcon})
    }

    let layerKota = {
        pointToLayer: optionIconKota
    }


        function optionIconKab (feature, latlng){
        let allIcon = L.icon({
            iconUrl: baseUrl+'assets/img/test-marker2.png',
            iconSize:     [30, 30] // size of the icon
        })
        return L.marker(latlng, {icon: allIcon})
    }

    let layerKab = {
        pointToLayer: optionIconKab
    }

    function optionIconC1 (feature, latlng){
        let allIcon = L.icon({
            iconUrl: baseUrl+'assets/img/number_1.png',
            iconSize:     [30, 30] // size of the icon
        })
        return L.marker(latlng, {icon: allIcon})
    }

    let layerC1 = {
        pointToLayer: optionIconC1
    }

    function optionIconC2 (feature, latlng){
        let allIcon = L.icon({
            iconUrl: baseUrl+'assets/img/number_2.png',
            iconSize:     [30, 30] // size of the icon
        })
        return L.marker(latlng, {icon: allIcon})
    }

    let layerC2 = {
        pointToLayer: optionIconC2
    }

    function optionIconC3 (feature, latlng){
        let allIcon = L.icon({
            iconUrl: baseUrl+'assets/img/number_3.png',
            iconSize:     [30, 30] // size of the icon
        })
        return L.marker(latlng, {icon: allIcon})
    }

    let layerC3 = {
        pointToLayer: optionIconC3
    }

    function optionIconDomisili (feature, latlng){
        let allIcon = L.icon({
            iconUrl: baseUrl+'assets/img/home.png',
            iconSize:     [30, 30] // size of the icon
        })
        return L.marker(latlng, {icon: allIcon})
    }

    let layerDomisili = {
        pointToLayer: optionIconDomisili
    }

    function optionIconSekolah (feature, latlng){
        let allIcon = L.icon({
            iconUrl: baseUrl+'assets/img/school.png',
            iconSize:     [30, 30] // size of the icon
        })
        return L.marker(latlng, {icon: allIcon})
    }

    let layerSekolah = {
        pointToLayer: optionIconSekolah
    }

    var allFeature = new L.geoJSON.ajax(baseUrl+"welcome/geoJSON", layerAll);
    var kabupatenFeature = new L.geoJSON.ajax(baseUrl+"welcome/geoJsonWilayahKab", layerKab);
    var kotaFeature = new L.geoJSON.ajax(baseUrl+"welcome/geoJsonWilayahKota", layerKota);
    var c1Feature = new L.geoJSON.ajax(baseUrl+"welcome/geoJsonC1", layerC1);
    var c2Feature = new L.geoJSON.ajax(baseUrl+"welcome/geoJsonC2", layerC2);
    var c3Feature = new L.geoJSON.ajax(baseUrl+"welcome/geoJsonC3", layerC3);
    var domisiliFeature = new L.geoJSON.ajax(baseUrl+"welcome/geoJSONDomisili", layerDomisili);
    var sekolahFeature = new L.geoJSON.ajax(baseUrl+"welcome/geoJSONSekolah", layerSekolah);

    allFeature.on('click', function(e){
        sidebar.toggle();
        document.getElementById('name').innerHTML = e.layer.feature.properties.nama_ponpes;
        document.getElementById('alamat').innerHTML = e.layer.feature.properties.alamat;
        document.getElementById('tgl').innerHTML = e.layer.feature.properties.tgl_berdiri;
        document.getElementById('jsantri').innerHTML = e.layer.feature.properties.jumlah_santri;
        document.getElementById('jtenaga').innerHTML = e.layer.feature.properties.jumlah_tenaga;
    });

    domisiliFeature.on('click', function(e){
        sidebar.toggle();
        document.getElementById('name').innerHTML = e.layer.feature.properties.nama;
        document.getElementById('jk').innerHTML = e.layer.feature.properties.jk;
        document.getElementById('warga').innerHTML = e.layer.feature.properties.kewarganegaraan;
        document.getElementById('stts').innerHTML = e.layer.feature.properties.stts_sipil;
        document.getElementById('kec').innerHTML = e.layer.feature.properties.kec;
        document.getElementById('kab').innerHTML = e.layer.feature.properties.kab;
        document.getElementById('prov').innerHTML = e.layer.feature.properties.prov;
        document.getElementById('alamat').innerHTML = e.layer.feature.properties.alamat;
        document.getElementById('jurusan').innerHTML = e.layer.feature.properties.jurusan;
        document.getElementById('lulus').innerHTML = e.layer.feature.properties.thn_lulus;
        document.getElementById('prodi').innerHTML = e.layer.feature.properties.prodi1;
        document.getElementById('pres').innerHTML = e.layer.feature.properties.dtail_pres;
        document.getElementById('sekolah').innerHTML = '<a href="<?= base_url('welcome/detail/')?>' + e.layer.feature.properties.asal_sekolah + '">' + e.layer.feature.properties.nama_sklh + '</a>';
    });

    sekolahFeature.on('click', function(e){
        sidebar1.toggle();
        document.getElementById('name_sklh').innerHTML = e.layer.feature.properties.nama_sklh;
        document.getElementById('alamat1').innerHTML = e.layer.feature.properties.alamat_sekolah;
    });

    kabupatenFeature.on('click', function(e){
        sidebar.toggle();
        document.getElementById('name').innerHTML = e.layer.feature.properties.nama_ponpes;
        document.getElementById('alamat').innerHTML = e.layer.feature.properties.alamat;
        document.getElementById('tgl').innerHTML = e.layer.feature.properties.tgl_berdiri;
        document.getElementById('jsantri').innerHTML = e.layer.feature.properties.jumlah_santri;
        document.getElementById('jtenaga').innerHTML = e.layer.feature.properties.jumlah_tenaga;
    });

    kotaFeature.on('click', function(e){
        sidebar.toggle();
        document.getElementById('name').innerHTML = e.layer.feature.properties.nama_ponpes;
        document.getElementById('alamat').innerHTML = e.layer.feature.properties.alamat;
        document.getElementById('tgl').innerHTML = e.layer.feature.properties.tgl_berdiri;
        document.getElementById('jsantri').innerHTML = e.layer.feature.properties.jumlah_santri;
        document.getElementById('jtenaga').innerHTML = e.layer.feature.properties.jumlah_tenaga;
    });

    c1Feature.on('click', function(e){
        sidebar.toggle();
        document.getElementById('name').innerHTML = e.layer.feature.properties.nama_ponpes;
        document.getElementById('alamat').innerHTML = e.layer.feature.properties.alamat;
        document.getElementById('tgl').innerHTML = e.layer.feature.properties.tgl_berdiri;
        document.getElementById('jsantri').innerHTML = e.layer.feature.properties.jumlah_santri;
        document.getElementById('jtenaga').innerHTML = e.layer.feature.properties.jumlah_tenaga;
    });

    c2Feature.on('click', function(e){
        sidebar.toggle();
        document.getElementById('name').innerHTML = e.layer.feature.properties.nama_ponpes;
        document.getElementById('alamat').innerHTML = e.layer.feature.properties.alamat;
        document.getElementById('tgl').innerHTML = e.layer.feature.properties.tgl_berdiri;
        document.getElementById('jsantri').innerHTML = e.layer.feature.properties.jumlah_santri;
        document.getElementById('jtenaga').innerHTML = e.layer.feature.properties.jumlah_tenaga;
    });

    c3Feature.on('click', function(e){
        sidebar.toggle();
        document.getElementById('name').innerHTML = e.layer.feature.properties.nama_ponpes;
        document.getElementById('alamat').innerHTML = e.layer.feature.properties.alamat;
        document.getElementById('tgl').innerHTML = e.layer.feature.properties.tgl_berdiri;
        document.getElementById('jsantri').innerHTML = e.layer.feature.properties.jumlah_santri;
        document.getElementById('jtenaga').innerHTML = e.layer.feature.properties.jumlah_tenaga;
    });
    // Cari
    var searchControl = new L.Control.Search({
        layer: domisiliFeature,
        propertyName: 'nama'

    });

    searchControl.on('search:locationfound', function(e) {
        console.log(e);
        sidebar.toggle();
        document.getElementById('name').innerHTML = e.layer.feature.properties.nama;
        document.getElementById('alamat').innerHTML = e.layer.feature.properties.alamat;

    }).on('search:collapsed', function(e) {
        console.log(e);
        // sidebar.toggle();
        // document.getElementById('name').innerHTML = e.layer.feature.properties.nama_ponpes;
        // document.getElementById('alamat').innerHTML = e.layer.feature.properties.alamat;
        // document.getElementById('tgl').innerHTML = e.layer.feature.properties.tgl_berdiri;
        // document.getElementById('jsantri').innerHTML = e.layer.feature.properties.jumlah_santri;
        // document.getElementById('jtenaga').innerHTML = e.layer.feature.properties.jumlah_tenaga;
    });
    
    mymap.addControl( searchControl );  //inizialize search control


    var baseMaps = {
        "OSM": L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'),
        "Streets": streets,
        "Satellite": L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.satellite',
            accessToken: 'pk.eyJ1IjoiZ2l2YW5nIiwiYSI6ImNqeDMydHZ4NzBmaDg0OW5zbjRla3dobXIifQ.qjS0wBxXfvfxJMBB9VPd5g'
        })
    };

    var overlays = {
        // "Tampil": {
        //     "Semua": allFeature
        // },
        "Filter": {
            "Domisili": domisiliFeature,
            "Asal Sekolah": sekolahFeature
        },
        // "Kelompok": {
        //     "Besar": c1Feature,
        //     "Menengah": c2Feature,
        //     "Kecil": c3Feature
        // }
    };

    L.control.groupedLayers(baseMaps, overlays).addTo(mymap);
</script>
<!-- <script>
    $(document).ready(function(){
        $("#alamat").on("click", function(e){
            e.preventDefault();
            var targetUrl = $(this).attr('rel');
            $.ajax({
                url: targetUrl,
                type: "GET",
                success:function(){
                    alert("done");
                    return false;
                },
                error:function (){
                    alert("testing error");
                }
            });
        });
    });
</script> -->
</body>
</html>