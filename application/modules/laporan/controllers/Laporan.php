<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_laporan');
    }

    // view
    function index(){
    $data['page'] = 'v_laporan';
    $this->load->view('v_main',$data);
    }

    function mutasi(){
      $input = array();
      parse_str($_POST['data'], $input);

    $tanggal_dari = $input['tanggal_dari'];
    $tanggal_dari = DateTime::createFromFormat('d/m/Y',  $tanggal_dari)->format('Y-m-d');
    $tanggal_sampai = $input['tanggal_sampai'];
    $tanggal_sampai = DateTime::createFromFormat('d/m/Y', $tanggal_sampai)->format('Y-m-d');
      $data['data'] = $this->M_laporan->get_mutasi($tanggal_dari,$tanggal_sampai);

    $this->load->view('v_mutasi',$data);
    }

    function pengeluaran(){

      $input = array();
      parse_str($_POST['data'], $input);

    $tanggal_dari = $input['tanggal_dari'];
    $tanggal_dari = DateTime::createFromFormat('d/m/Y',  $tanggal_dari)->format('Y-m-d');
    $tanggal_sampai = $input['tanggal_sampai'];
    $tanggal_sampai = DateTime::createFromFormat('d/m/Y', $tanggal_sampai)->format('Y-m-d');

    $data['data'] = $this->M_laporan->get_laporan_pengeluaran($tanggal_dari,$tanggal_sampai);

// die($this->db->last_query());

    $this->load->view('v_pengeluaran',$data);
    }

    function rekap_pengeluaran(){
      $input = array();
      parse_str($_POST['data'], $input);
    $tanggal_dari = $input['tanggal_dari'];
    $tanggal_dari = DateTime::createFromFormat('d/m/Y',  $tanggal_dari)->format('Y-m-d');
    $tanggal_sampai = $input['tanggal_sampai'];
    $tanggal_sampai = DateTime::createFromFormat('d/m/Y', $tanggal_sampai)->format('Y-m-d');

    $data['data_rekap'] = $this->M_laporan->get_laporan_rekap_pengeluaran($tanggal_dari,$tanggal_sampai);
    $this->load->view('v_lap_rekap_pengeluaran',$data);
    }

    function rekap_pendapatan(){
      $input = array();
      parse_str($_POST['data'], $input);
    $tanggal_dari = $input['tanggal_dari'];
    $tanggal_dari = DateTime::createFromFormat('d/m/Y',  $tanggal_dari)->format('Y-m-d');
    $tanggal_sampai = $input['tanggal_sampai'];
    $tanggal_sampai = DateTime::createFromFormat('d/m/Y', $tanggal_sampai)->format('Y-m-d');

    $data['data_rekap'] = $this->M_laporan->get_laporan_rekap_pendapatan($tanggal_dari,$tanggal_sampai);
    $this->load->view('v_lap_rekap_pendapatan',$data);
    }

    function rekap_total(){
      $input = array();
      parse_str($_POST['data'], $input);
    // $data['page'] = 'v_lap_rekap_total';
    $tanggal_dari = $input['tanggal_dari'];
    $tanggal_dari = DateTime::createFromFormat('d/m/Y',  $tanggal_dari)->format('Y-m-d');
    $tanggal_sampai = $input['tanggal_sampai'];
    $tanggal_sampai = DateTime::createFromFormat('d/m/Y', $tanggal_sampai)->format('Y-m-d');

    $query = $this->db->query('select * from unit')->result_array();
    foreach ($query as $key => $value) {
      $seri = $value['seri'];
      $query = $this->db->query('SELECT sum(harga) total from booking where (tanggal_dari >= "'.$tanggal_dari.'" and tanggal_dari <= "'.$tanggal_sampai.'") and id_unit like "%'.$seri.'%"' )->result_array();
      $pendapatan_bis[$seri] = $query[0]['total'];
                        // $total = $total + $pendapatan_bis

    }
    // echo '<pre>';
    // print_r($pendapatan_bis);
    // // $pendapatan[$seri][]
    // die;
    $data['data_rekap_pemasukan'] = $pendapatan_bis;
    $data['data_rekap_pengeluaran'] = $this->M_laporan->get_laporan_rekap_pengeluaran($tanggal_dari,$tanggal_sampai);
    $this->load->view('v_lap_rekap_total',$data);
    }

    function pemakaian_sparepart(){
      $input = array();
      parse_str($_POST['data'], $input);
//
//       print_r($_POST);
//
// die;

    $tanggal_dari = $input['tanggal_dari'];

    $tanggal_dari = DateTime::createFromFormat('d/m/Y',  $tanggal_dari)->format('Y-m-d');
    $tanggal_sampai = $input['tanggal_sampai'];
    $tanggal_sampai = DateTime::createFromFormat('d/m/Y', $tanggal_sampai)->format('Y-m-d');

    $unit = '';
    $sparepart = '';
    if($this->input->post('id_unit')){
    foreach ($this->input->post('id_unit')  as $key => $value) {
      $unit .= $value.",";
      }
    }
    if($this->input->post('id_sparepart')){
    foreach ($this->input->post('id_sparepart')  as $key => $value) {
      $sparepart .= $value.",";
      }
    }


    $unit = rtrim($unit,',');
    $sparepart = rtrim($sparepart,',');
    $data['data'] = $this->M_laporan->get_laporan_pemakaian_sparepart($tanggal_dari,$tanggal_sampai,$unit,$sparepart);

    $this->load->view('v_lap_pemakaian_sparepart',$data);
    }


}
?>
