<?php

use Dompdf\Dompdf;

defined('BASEPATH') or exit('No direct script access allowed');

class cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            $this->session->set_flashdata('penyusup', 'penyusup');
            redirect('auth');
        }
    }

    public function checker($nomor_do)
    {
        // $lokasi = 'https://localhost/application/libraries/dompdf/autoload.inc.php';
        // require_once $lokasi;

        $data['checker1'] = $this->M_cetak->checker1($nomor_do);
        $data['checker2'] = $this->M_cetak->checker2($nomor_do);

        $this->load->view('V_checker', $data);

        // Get output html 
        $html = $this->output->get_output();

        // Load pdf library
        $this->load->library('pdf');

        // Load HTML content
        $this->dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $this->dompdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("fifo-warehouse.pdf", array("Attachment" => 0));
    }

    public function printpelanggan($nomor_do)
    {
        // $lokasi = 'https://localhost/application/libraries/dompdf/autoload.inc.php';
        // require_once $lokasi;

        $data['pel1'] = $this->M_cetak->pelanggan1($nomor_do);
        $data['pel2'] = $this->M_cetak->pelanggan2($nomor_do);

        $this->load->view('V_notapelanggan', $data);

        // Get output html 
        $html = $this->output->get_output();

        // Load pdf library
        $this->load->library('pdf');

        // Load HTML content
        $this->dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $this->dompdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("fifo-warehouse.pdf", array("Attachment" => 0));
    }
}
