<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container bg-light">
    <h1 class="text-center my-4">Dashboard Report</h1>
    <h1 class="text-center my-4">Visitor Analytics Dashboard</h1>
    <p class="text-center text-muted">Periode: 1 Januari 2024 - 31 Desember 2024</p>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-tosca text-white">
                    <h5>Total Pengunjung per Bulan</h5>
                </div>
                <div class="card-body">
                    <div id="totalPengunjungByMonth"></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-tosca text-white">
                    <h5>Departemen Terbanyak</h5>
                </div>
                <div class="card-body">
                    <div id="departemenWithMostVisitors" style="width:100%; height:400px;"></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-tosca text-white">
                    <h5>Tanggal Terbanyak</h5>
                </div>
                <div class="card-body">
                    <div id="dateWithMostVisitors" style="width:100%; height:400px;"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-tosca text-white">
                    <h5>Pengunjung per Perusahaan</h5>
                </div>
                <div class="card-body">
                    <div id="visitorByCompany" style="width:100%; height:400px;"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-tosca text-white">
                    <h5>Pengunjung per Tujuan</h5>
                </div>
                <div class="card-body">
                    <div id="visitorByPurpose" style="width:100%; height:400px;"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-header bg-tosca text-white">
                    <h5>Pengunjung per Departemen</h5>
                </div>
                <div class="card-body">
                    <div id="visitorByDepartemen" style="width:100%; height:600px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // 1. Chart Total Pengunjung per Bulan
        Highcharts.chart('totalPengunjungByMonth', {
            chart: { type: 'line' },
            title: { text: 'Total per Bulan' },
            xAxis: { categories: <?= json_encode(array_keys($totalPengunjungByMonth)) ?> },
            yAxis: { title: { text: 'Jumlah' } },
            series: [{
                name: 'Pengunjung',
                data: <?= json_encode(array_values($totalPengunjungByMonth)) ?>,
                color: '#20c997'
            }]
        });

        // 2. Chart Departemen dengan Pengunjung Terbanyak
        Highcharts.chart('departemenWithMostVisitors', {
            chart: { type: 'column' },
            title: { text: 'Departemen Terbanyak' },
            xAxis: { categories: <?= json_encode(array_column($departemenWithMostVisitors, 'nama_departemen')) ?> },
            yAxis: { title: { text: 'Jumlah' } },
            series: [{
                name: 'Pengunjung',
                data: <?= json_encode(array_column($departemenWithMostVisitors, 'jumlah_pengunjung'), JSON_NUMERIC_CHECK) ?>,
                color: '#20c997'
            }]
        });

        // 3. Chart Tanggal dengan Pengunjung Terbanyak
        Highcharts.chart('dateWithMostVisitors', {
    chart: { type: 'column' },
    title: { text: 'Tanggal Terbanyak' },
    xAxis: { categories: <?= json_encode($dates) ?> },
    yAxis: { 
        title: { text: 'Jumlah' },
        // Menambahkan properti ini untuk memaksakan skala bilangan bulat
        allowDecimals: false, 
        min: 0,
        // Opsional: menentukan tickInterval agar lompatannya bulat (misal 1, 2, 3 atau 2, 4, 6)
        tickInterval: 1 
    },
    series: [{
        name: 'Pengunjung',
        data: <?= json_encode($dateWithMostVisitors, JSON_NUMERIC_CHECK) ?>,
        color: '#20c997'
    }]
});
//Highcharts.chart('dateWithMostVisitors', {
            //chart: { type: 'column' },
           // title: { text: 'Tanggal Terbanyak' },
           // xAxis: { categories: <?= json_encode($dates) ?> },
            //yAxis: { title: { text: 'Jumlah' } },
            //series: [{
              //  name: 'Pengunjung',
              //  data: <?= json_encode($dateWithMostVisitors, JSON_NUMERIC_CHECK) ?>,
              //  color: '#20c997'
          //  }]
       // });

        // 4. Chart Pengunjung Berdasarkan Perusahaan
        Highcharts.chart('visitorByCompany', {
            chart: { type: 'pie' },
            title: { text: 'Berdasarkan Perusahaan' },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data: <?= json_encode($visitorByCompany) ?>
            }]
        });

        // 5. Chart Pengunjung Berdasarkan Tujuan
        Highcharts.chart('visitorByPurpose', {
            chart: { type: 'pie' },
            title: { text: 'Berdasarkan Tujuan' },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data: <?= json_encode($visitorByPurpose) ?>
            }]
        });

        // 6. Chart Pengunjung per Departemen
        Highcharts.chart('visitorByDepartemen', {
            chart: { type: 'bar' },
            title: { text: 'Detail per Departemen' },
            xAxis: { categories: <?= json_encode(array_column($visitorByDepartemen, 'name')) ?> },
            yAxis: { title: { text: 'Jumlah' } },
            series: [{
                name: 'Pengunjung',
                data: <?= json_encode(array_column($visitorByDepartemen, 'y'), JSON_NUMERIC_CHECK) ?>,
                color: '#20c997'
            }]
        });
    });
</script>

<style>
    .bg-tosca { background-color: #20c997 !important; }
    .bg-light { background-color: #f8f9fa; }
</style>

<?= $this->endSection() ?>