<?php

namespace App\Http\Controllers;

use App\Models\Url; // Pastikan model Url digunakan
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah URL draft dan online
        $draftCount = Url::where('status', 'draft')->count();
        $onlineCount = Url::where('status', 'online')->count();

        // Dapatkan daftar URL dengan status draft dan online
        $urls = Url::select('short_url', 'status', 'visits')->orderBy('created_at', 'desc')->get();

        // Data untuk grafik
        $urlVisits = Url::select('short_url', 'visits')
            ->where('status', 'online') // Hanya ambil URL online
            ->orderBy('visits', 'desc')
            ->limit(10) // Batasi 10 URL teratas
            ->get();

        $pieChartData = [
            'labels' => ['Draft', 'Online'], // Label status URL
            'data' => [$draftCount, $onlineCount] // Jumlah draft dan online
        ];

        // Data untuk line chart (visits over time)
        $lineChartData = Url::select('created_at', 'visits')
            ->where('status', 'online')
            ->orderBy('created_at')
            ->get()
            ->map(function ($item) {
                return [
                    'created_at' => $item->created_at->format('Y-m-d'), // Format tanggal
                    'visits' => $item->visits
                ];
            });

        // Kirim data ke view
        return view('dashboard', [
            'draftCount' => $draftCount,
            'onlineCount' => $onlineCount,
            'urls' => $urls,
            'chartData' => [
                'urls' => $urlVisits->pluck('short_url')->toArray(),
                'visits' => $urlVisits->pluck('visits')->toArray(),
            ],
            'pieChartData' => $pieChartData,
            'lineChartData' => $lineChartData->toArray(),
        ]);
    }
}
