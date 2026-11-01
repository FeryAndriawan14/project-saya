<?php

namespace App\Controllers;

use App\Models\PengunjungModel;
use App\Models\DepartemenModel;
use App\Models\TujuanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class PengunjungController extends BaseController
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
    $model = new \App\Models\PengunjungModel();
    
    $data = [
        'title'      => 'Daftar Pengunjung',
        // Kita join ke departemen DAN tujuan
        'pengunjung' => $model->select('pengunjung.*, departemen.nama_departemen, tujuan.tujuan')
                              ->join('departemen', 'departemen.department_id = pengunjung.department_id', 'left')
                              ->join('tujuan', 'tujuan.tujuan_id = pengunjung.tujuan_id', 'left')
                              ->paginate(10),
        'pager'      => $model->pager
    ];
    return view('pengunjung/index', $data);
}
//public function index()
//{
    //$model = new \App\Models\PengunjungModel();
    
    //$data = [
        //'pengunjung' => $model->select('pengunjung.*, departemen.nama_departemen')
                             // ->join('departemen', 'departemen.department_id = pengunjung.department_id', 'left')
                             // ->paginate(10),
        //'pager' => $model->pager
    //];
   // return view('pengunjung/index', $data);
//}
 //public function index()
//{
    // Menggunakan paginate() bawaan CodeIgniter
   // $data = [
       // 'title'      => 'Daftar Pengunjung',
        //'pengunjung' => $this->pengunjungModel->paginate(10), // Langsung panggil paginate()
        //'pager'      => $this->pengunjungModel->pager,
        //'departemen' => $this->departemenModel->findAll(),
       // 'tujuan'     => $this->tujuanModel->findAll(),
    //];
    //return view('pengunjung/index', $data);
//}  
//public function index()
//{
   // $data = [
        //'title'      => 'Daftar Pengunjung',
        // Mengambil data dengan pagination (misal 10 data per halaman)
       // 'pengunjung' => $this->pengunjungModel->getDetailedDataPaginate(10), 
        //'pager'      => $this->pengunjungModel->pager,
        //'departemen' => $this->departemenModel->findAll(),
        //'tujuan'     => $this->tujuanModel->findAll(),
   // ];
   /// return view('pengunjung/index', $data);
//}
 //public function index()
    //{
      //  $data['title'] = 'Daftar Pengunjung';
      //  $data['pengunjung'] = $this->pengunjungModel->getDetailedData();
        //$data['departemen'] = $this->departemenModel->findAll();
        //$data['tujuan'] = $this->tujuanModel->findAll();
       // return view('pengunjung/index', $data);
    //}



    public function create()
    {
        $data['title'] = 'Tambah Pengunjung';
        return view('pengunjung/create', $data);
    }

    public function store()
    {
        // Simpan data departemen baru
        $nama_departemen = $this->request->getPost('nama_departemen');
        $this->departemenModel->save(['nama_departemen' => $nama_departemen]);
        $department_id = $this->departemenModel->insertID();

        // Simpan data tujuan baru
        $nama_tujuan = $this->request->getPost('tujuan');
        $this->tujuanModel->save(['tujuan' => $nama_tujuan]);
        $tujuan_id = $this->tujuanModel->insertID();

        // Simpan data pengunjung
        $this->pengunjungModel->save([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'perusahaan' => $this->request->getPost('perusahaan'),
            'department_id' => $department_id,
            'tujuan_id' => $tujuan_id,
            'waktu_masuk' => $this->request->getPost('waktu_masuk'),
            'waktu_keluar' => $this->request->getPost('waktu_keluar'),
            'catatan' => $this->request->getPost('catatan')
        ]);

        return redirect()->to('/pengunjung');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Pengunjung';
        $data['pengunjung'] = $this->pengunjungModel->find($id);
        $data['departemen'] = $this->departemenModel->findAll();
        $data['tujuan'] = $this->tujuanModel->findAll();
        return view('pengunjung/edit', $data);
    }

    public function update($id)
{
    // Tangkap data dari form edit
    $data = [
        'nama'          => $this->request->getPost('nama'),
        'email'         => $this->request->getPost('email'),
        'perusahaan'    => $this->request->getPost('perusahaan'),
        'department_id' => $this->request->getPost('department_id'),
        'tujuan_id'     => $this->request->getPost('tujuan_id'),
        'waktu_masuk'   => $this->request->getPost('waktu_masuk'),  // Tambahkan ini
        'waktu_keluar'  => $this->request->getPost('waktu_keluar') ?: null, // Tambahkan ini (otomatis jadi NULL jika kosong)
        'catatan'       => $this->request->getPost('catatan')
    ];

    // Simpan ke database
    $this->pengunjungModel->update($id, $data);

    // Berikan feedback sukses (opsional)
    return redirect()->to('/pengunjung')->with('success', 'Data pengunjung berhasil diupdate.');
}

    public function delete($id)
    {
        $this->pengunjungModel->delete($id);
        return redirect()->to('/pengunjung');
    }

    
    // Method to export data to Excel
    public function exportExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set Header
        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Perusahaan');
        $sheet->setCellValue('D1', 'Departemen');
        $sheet->setCellValue('E1', 'Tujuan');
        $sheet->setCellValue('F1', 'Waktu Masuk');
        $sheet->setCellValue('G1', 'Waktu Keluar');
        $sheet->setCellValue('H1', 'Catatan');

        // Fetch Data
        $pengunjungData = $this->pengunjungModel->getDetailedData();
        $row = 2;
        foreach ($pengunjungData as $data) {
            $sheet->setCellValue('A' . $row, $data['nama']);
            $sheet->setCellValue('B' . $row, $data['email']);
            $sheet->setCellValue('C' . $row, $data['perusahaan']);
            $sheet->setCellValue('D' . $row, $data['nama_departemen']);
            $sheet->setCellValue('E' . $row, $data['tujuan']);
            $sheet->setCellValue('F' . $row, $data['waktu_masuk']);
            $sheet->setCellValue('G' . $row, $data['waktu_keluar']);
            $sheet->setCellValue('H' . $row, $data['catatan']);
            $row++;
        }

        // Write to file
        $writer = new Xlsx($spreadsheet);
        $filename = 'pengunjung_data.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    // // Method to export data to PDF
    // public function exportPDF()
    // {
    //     $options = new Options();
    //     $options->set('isHtml5ParserEnabled', true);
    //     $options->set('isRemoteEnabled', true);

    //     $dompdf = new Dompdf($options);
    //     $html = '<h1>Data Pengunjung</h1>';
    //     $html .= '<table border="1" width="100%">
    //                 <thead>
    //                     <tr>
    //                         <th>Nama</th>
    //                         <th>Email</th>
    //                         <th>Perusahaan</th>
    //                         <th>Departemen</th>
    //                         <th>Tujuan</th>
    //                         <th>Waktu Masuk</th>
    //                         <th>Waktu Keluar</th>
    //                         <th>Catatan</th>
    //                     </tr>
    //                 </thead>
    //                 <tbody>';

    //     // Fetch Data
    //     $pengunjungData = $this->pengunjungModel->getDetailedData();
    //     foreach ($pengunjungData as $data) {
    //         $html .= '<tr>
    //                     <td>' . $data['nama'] . '</td>
    //                     <td>' . $data['email'] . '</td>
    //                     <td>' . $data['perusahaan'] . '</td>
    //                     <td>' . $data['nama_departemen'] . '</td>
    //                     <td>' . $data['tujuan'] . '</td>
    //                     <td>' . $data['waktu_masuk'] . '</td>
    //                     <td>' . $data['waktu_keluar'] . '</td>
    //                     <td>' . $data['catatan'] . '</td>
    //                   </tr>';
    //     }

    //     $html .= '</tbody></table>';

    //     $dompdf->loadHtml($html);
    //     $dompdf->setPaper('A4', 'landscape');
    //     $dompdf->render();
    //     $dompdf->stream('pengunjung_data.pdf', array('Attachment' => 1));
    //     exit;
    // }
   // public function exportPDFAll()
    //{
       // $pengunjungModel = new PengunjungModel();
       // $data['pengunjung'] = $pengunjungModel->findAll();

        //$dompdf = new Dompdf();
        //$dompdf->loadHtml(view('pengunjung/pdf_all', $data));
        //$dompdf->setPaper('A4', 'landscape');
       // $dompdf->render();
       // $dompdf->stream('Daftar_Pengunjung.pdf', array("Attachment" => false));


        public function exportpdfall() // pastikan semua huruf kecil
{
    $model = new \App\Models\PengunjungModel();
    
    $data['pengunjung'] = $model->select('pengunjung.*, departemen.nama_departemen, tujuan.tujuan')
                                ->join('departemen', 'departemen.department_id = pengunjung.department_id', 'left')
                                ->join('tujuan', 'tujuan.tujuan_id = pengunjung.tujuan_id', 'left')
                                ->findAll();

    $html = view('pengunjung/pdf_all', $data);

    // PENTING: Tambahkan proses render Dompdf di sini agar tidak kosong
    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('Daftar_Pengunjung.pdf', ["Attachment" => false]);
    exit;
}
    }

