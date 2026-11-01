<?php

namespace App\Controllers;

class User extends BaseController
{
<<<<<<< HEAD
    protected $model;
=======
>>>>>>> 2d934bb005ad1de9db3413806de22260e55925c4

    public function __construct()
    {
        $this->model = new \App\Models\ModelTransaksi();
    }
<<<<<<< HEAD

    public function index()
    {
        if (session()->get('logged_in')) {
            // Ambil data dari model dengan pengaman nilai default (??) jika null/kosong
            $topLocation  = $this->model->getTopLocation();
            $topSales     = $this->model->getTopSales();
            $topProduct   = $this->model->getTopProduct();
            $downProduct  = $this->model->getDownProduct();

            $data = [
                'donutChartData'  => $this->model->getSurveyData() ?? [],
                'columnChartData' => $this->model->getSurveyDataLast6Months() ?? [],
                'topLocation'     => $topLocation ?? ['nama_lokasi' => 'Belum Ada Data', 'total' => 0],
                'topSales'        => $topSales ?? ['nama_lengkap' => 'Belum Ada Data', 'total_penjualan' => 0],
                'topProduct'      => $topProduct ?? ['nama_barang' => 'Belum Ada Data', 'total' => 0],
                'downProduct'     => $downProduct ?? ['nama_barang' => 'Belum Ada Data', 'total' => 0]
            ];

=======
    public function index()
    {
        if (session()->get('logged_in')) {
            $data = [
                'donutChartData' => $this->model->getSurveyData(),
                'columnChartData' => $this->model->getSurveyDataLast6Months(),
                'topLocation' => $this->model->getTopLocation(),
                'topSales' => $this->model->getTopSales(),
                'topProduct' => $this->model->getTopProduct(),
                'downProduct' => $this->model->getDownProduct()
            ];
            // dd($data);
>>>>>>> 2d934bb005ad1de9db3413806de22260e55925c4
            return view('User/dashboard', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
