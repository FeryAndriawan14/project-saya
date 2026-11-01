<?php
namespace App\Controllers;

use App\Models\PengunjungModel;
use App\Models\DepartemenModel;
use App\Models\TujuanModel;


class DashboardController extends BaseController
{
    protected $pengunjungModel;
    protected $departemenModel;
    protected $tujuanModel;

    public function __construct()
    {
        $this->pengunjungModel = new PengunjungModel();
        $this->departemenModel = new DepartemenModel();
        $this->tujuanModel = new TujuanModel();
    }
public function index()
{
    // Mengambil data untuk statistik dashboard
    $data['total_pengunjung'] = $this->pengunjungModel->countAllResults();
    
    // Menghitung pengunjung hari ini (asumsi format datetime di DB: Y-m-d H:i:s)
    $data['pengunjung_hari_ini'] = $this->pengunjungModel
                                        ->where('DATE(waktu_masuk)', date('Y-m-d'))
                                        ->countAllResults();
    
    // Menghitung jumlah departemen
    $data['jumlah_departemen'] = $this->departemenModel->countAllResults();

    return view('dashboard/index', $data); 
}
    public function report()
    {
        $data['months'] = $this->getMonths();
        $data['totalPengunjungByMonth'] = $this->getTotalPengunjungByMonth();
        $data['departemenWithMostVisitors'] = $this->getDepartemenWithMostVisitors();
        $data['dates'] = $this->getDates();
        $data['dateWithMostVisitors'] = $this->getDateWithMostVisitors();
        $data['visitorByCompany'] = $this->getVisitorByCompany();
        $data['visitorByPurpose'] = $this->getVisitorByPurpose();
        $data['visitorByDepartemen'] = $this->getVisitorByDepartemen();

        return view('dashboard/report', $data);
    }

    private function getMonths()
    {
        return ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    }

    private function getTotalPengunjungByMonth()
    {
        // Asumsikan data ini dari query atau logika bisnis
        // Ganti dengan query yang sesuai
        return [
            'Jan' => 10,
            'Feb' => 20,
            'Mar' => 15,
            'Apr' => 30,
            'May' => 25,
            'Jun' => 40,
            'Jul' => 35,
            'Aug' => 50,
            'Sep' => 45,
            'Oct' => 60,
            'Nov' => 55,
            'Dec' => 70,
        ];
    }

    private function getDepartemenWithMostVisitors()
    {
        $result = $this->departemenModel->select('nama_departemen, COUNT(pengunjung.visitor_id) as jumlah_pengunjung')
                                        ->join('pengunjung', 'pengunjung.department_id = departemen.department_id', 'left')
                                        ->groupBy('departemen.department_id')
                                        ->orderBy('jumlah_pengunjung', 'desc')
                                        ->findAll();

        if ($result === false) {
            log_message('error', 'Query failed: ' . $this->departemenModel->getLastQuery());
            return [];
        }

        return $result;
    }

    private function getDates()
    {
        $result = $this->pengunjungModel->select('DATE(waktu_masuk) as date, COUNT(*) as total')
                                        ->groupBy('DATE(waktu_masuk)')
                                        ->orderBy('total', 'desc')
                                        ->limit(5)
                                        ->findAll();

        if ($result === false) {
            log_message('error', 'Query failed: ' . $this->pengunjungModel->getLastQuery());
            return [];
        }

        return array_column($result, 'date');
    }

    private function getDateWithMostVisitors()
    {
        $result = $this->pengunjungModel->select('DATE(waktu_masuk) as date, COUNT(*) as total')
                                        ->groupBy('DATE(waktu_masuk)')
                                        ->orderBy('total', 'desc')
                                        ->limit(5)
                                        ->findAll();

        if ($result === false) {
            log_message('error', 'Query failed: ' . $this->pengunjungModel->getLastQuery());
            return [];
        }

        return array_column($result, 'total');
    }

    private function getVisitorByCompany()
    {
        $result = $this->pengunjungModel->select('perusahaan, COUNT(*) as total')
                                        ->groupBy('perusahaan')
                                        ->orderBy('total', 'desc')
                                        ->findAll();

        if ($result === false) {
            log_message('error', 'Query failed: ' . $this->pengunjungModel->getLastQuery());
            return [];
        }

        $data = [];
        foreach ($result as $row) {
            $data[] = ['name' => $row['perusahaan'], 'y' => (int) $row['total']];
        }
        return $data;
    }

    private function getVisitorByPurpose()
    {
        $result = $this->pengunjungModel->select('tujuan.tujuan, COUNT(*) as total')
                                        ->join('tujuan', 'pengunjung.tujuan_id = tujuan.tujuan_id', 'left')
                                        ->groupBy('tujuan.tujuan')
                                        ->orderBy('total', 'desc')
                                        ->findAll();

        if ($result === false) {
            log_message('error', 'Query failed: ' . $this->pengunjungModel->getLastQuery());
            return [];
        }

        $data = [];
        foreach ($result as $row) {
            $data[] = ['name' => $row['tujuan'], 'y' => (int) $row['total']];
        }
        return $data;
    }

    private function getVisitorByDepartemen()
    {
        $result = $this->pengunjungModel->select('departemen.nama_departemen, COUNT(*) as total')
                                        ->join('departemen', 'pengunjung.department_id = departemen.department_id', 'left')
                                        ->groupBy('departemen.nama_departemen')
                                        ->orderBy('total', 'desc')
                                        ->findAll();

        if ($result === false) {
            log_message('error', 'Query failed: ' . $this->pengunjungModel->getLastQuery());
            return [];
        }

        $data = [];
        foreach ($result as $row) {
            $data[] = ['name' => $row['nama_departemen'], 'y' => (int) $row['total']];
        }
        return $data;
    }
}
