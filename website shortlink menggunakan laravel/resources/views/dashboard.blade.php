@extends('layout.main')

@section('content')
<style>
    :root { --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%); }
    .card-modern { border: none; border-radius: 20px; box-shadow: 0 8px 30px rgba(0,0,0,0.06); transition: 0.3s; background: #ffffff; }
    .stat-value { font-size: 2rem; font-weight: 800; color: #1e293b; }
    .stat-label { color: #64748b; font-size: 0.875rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; }
    .chart-box { border-radius: 20px; background: #ffffff; padding: 25px; box-shadow: 0 8px 30px rgba(0,0,0,0.06); }
    .table-container { border-radius: 20px; overflow: hidden; }
    .custom-badge { padding: 0.5rem 1rem; border-radius: 12px; font-weight: 700; font-size: 0.75rem; }
</style>

<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-end mb-5">
        <div>
            <h1 class="h2 fw-bold text-dark">Analytics Dashboard</h1>
            <p class="text-muted mb-0">Overview of your shortlink performance</p>
        </div>
        <button class="btn btn-primary px-4 py-2" style="border-radius: 12px;">Download Report</button>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card-modern p-4">
                <div class="stat-label mb-2">Total Link Draft</div>
                <div class="stat-value">{{ $draftCount }}</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-modern p-4">
                <div class="stat-label mb-2">Total Link Online</div>
                <div class="stat-value text-success">{{ $onlineCount }}</div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-8"><div class="chart-box"><div id="lineChart" style="height: 400px;"></div></div></div>
        <div class="col-lg-4"><div class="chart-box"><div id="pieChart" style="height: 400px;"></div></div></div>
    </div>

    <div class="card-modern p-4">
        <h5 class="fw-bold mb-4">Detailed Statistics</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr class="text-muted">
                        <th>URL PATH</th>
                        <th>STATUS</th>
                        <th>TOTAL USER CLICKS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($urls as $url)
                    <tr>
                        <td class="fw-bold text-dark">{{ $url->short_url }}</td>
                        <td>
                            <span class="custom-badge {{ $url->status == 'online' ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' }}">
                                {{ strtoupper($url->status) }}
                            </span>
                        </td>
                        <td class="fw-bold">{{ number_format($url->visits) }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="text-center py-5">No records found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    const pieData = @json($pieChartData);
    const lineData = @json($lineChartData);

    Highcharts.chart('pieChart', {
        chart: { type: 'pie', backgroundColor: 'transparent' },
        title: { text: 'Distribution', align: 'left' },
        credits: { enabled: false },
        plotOptions: { pie: { innerSize: '60%', dataLabels: { enabled: false } } },
        series: [{ data: [{ name: 'Draft', y: pieData.data[0], color: '#cbd5e1' }, { name: 'Online', y: pieData.data[1], color: '#22c55e' }] }]
    });

    Highcharts.chart('lineChart', {
        chart: { type: 'areaspline', backgroundColor: 'transparent' },
        title: { text: 'Traffic Trend', align: 'left' },
        credits: { enabled: false },
        xAxis: { categories: lineData.map(i => i.created_at), lineColor: 'transparent' },
        yAxis: { title: { text: '' }, gridLineColor: '#f1f5f9' },
        series: [{ name: 'Visits', data: lineData.map(i => i.visits), color: '#4f46e5', fillOpacity: 0.1 }]
    });
</script>
@endsection