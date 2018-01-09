<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_booking');
    }

    // view
    function index(){
    $data['page'] = 'v_booking';
    $this->load->view('v_main',$data);
    }

    function data(){
    $this->load->view('v_booking_data');
    }
    function input_harga(){
      $this->load->view('v_input_harga');
      }

    function editor(){
    $this->load->view('v_booking_editor');
    }

    public function page()
    {
      #--------------------------------------------------------------------------------------------------->
      #------------------------------------- Konfigurasi  ------------------------------------------------>
      #--------------------------------------------------------------------------------------------------->
      $per_page = 10; // jumlah data per halaman
      $from_page = $this->input->get('from') ?  $this->input->get('from'): 0; //data dimulai dari ...
      $search = $this->input->get("query") ? $this->input->get("query") : ''; // query pencarian

      #--------------------------------------------------------------------------------------------------->
      #------------------------------------- Ambil data  ------------------------------------------------->
      #--------------------------------------------------------------------------------------------------->

      $data = $this->M_booking->get_data($search,$from_page,$per_page); // ambil data
      $data_table = $data['data']; // data
      $total_rows = $data['total']; // jumlah data
      $total_page = $total_rows/$per_page; //jumlah halaman

      #--------------------------------------------------------------------------------------------------->
      #-------------------------------- Pagination button ------------------------------------------------>
      #--------------------------------------------------------------------------------------------------->
        $link = array();
        $from = 0;
        $count = 0;
        $awal_page = $from_page/$per_page >= 0 ? $from_page/$per_page : 1;
        $awal_page = ($awal_page - 5) > 0? $awal_page-5: 0;

        // looping untuk halaman
        for ($i=$awal_page; $i < $total_page; $i++) {
            if ($count >= 10 || $i >= $total_page) {
                break;
            }
            $from = $i * $per_page;
            $link[$i] = array("page" => $i+1, "from" => $from );
            $count++;
        }
        $first = array("page" => "<<", "from" => 0 );
        $last = array("page" => ">>", "from" => (ceil($total_page)-1) * $per_page );
        $next =   (ceil($total_page)-1) == 0? array("page" => ">", "from" => 0 ): array("page" => ">", "from" => $from_page+$per_page );
        $prev =   array("page" => "<", "from" => $from_page-$per_page );

        if(($awal_page > 2)){
        $link = array( 0 => $first) + array( 1 => $prev) + $link;
        }
        $link = $link + array( "next" => $next) + array( "last" => $last);

        #--------------------------------------------------------------------------------------------------->
        #------------------------------------- Return JSON  ------------------------------------------------>
        #--------------------------------------------------------------------------------------------------->
        $data['value'] = $data_table;
        $data['page'] = $link;

         echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function get_for_edit(){
      $id = $this->input->get('id');
      $data = $this->M_booking->get($id);
      $data_detail = $this->M_booking->get_detail_tanggal($id);

      $input = array();
      foreach ($data_detail as $key => $value) {
        $date = DateTime::createFromFormat('Y-m-d', $value['tanggal'])->format('d-m-Y');
         $input[$key]['select'] = $this->select_unit_for_edit($value['tanggal'],$date,$id);
         $input[$key]['date'] = $date;
      }


      echo json_encode(array('data_booking' => $data, 'input' => $input ));
    }

    // tambah data
    function add(){
        $data = array();           
        parse_str($_POST['data'], $data);
    
        if (isset($data['id_bookingg'])) {
          unset($data['id_bookingg']);         
        };
        $data['tanggal_input'] = DateTime::createFromFormat('d/m/Y', $data['tanggal_input'])->format('Y-m-d');

        $tanggal_unit = $data['tanggal_unit'];        
        unset($data['tanggal_unit']);
       
        $insert = $this->M_booking->insert($data,$tanggal_unit);
        if (!$insert) {
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();
          }
    }

    // fungsi update
    // fungsi update
    function update(){
     
      $data = array();
      parse_str($_POST['data'], $data); 
      $id = array_key_exists('id_bookingg',$data) ? $data['id_bookingg']:$data['id_booking'];
      $data['tanggal_input'] = DateTime::createFromFormat('d/m/Y', $data['tanggal_input'])->format('Y-m-d');
      $tanggal_unit = $data['tanggal_unit'];        
      unset($data['tanggal_unit']);
      unset($data['id_bookingg']);
      unset($data['id_booking']);
      unset($data['id_bookinererg']);
  
      $update = $this->M_booking->update_by_id($data,$id,$tanggal_unit);
    }

    function update_harga(){
      
       $data = array();
       parse_str($_POST['data'], $data); 
       $id = $data['id_booking']; 
   
       $update = $this->M_booking->update_harga($data,$id);
     }

    // fungsi hapus
    function delete(){
      $id = $this->input->post('id');
      $delete = $this->M_booking->delete_by_id($id);
    }

    function jadwal(){
      $data['page'] = 'v_jadwal';
      $this->load->view('v_main',$data);
    }

    function jadwal_table(){
      // print_r($this->input->post());
      // die;
      $data['bulan'] = $this->input->post('bulan');
      $data['tahun'] = $this->input->post('tahun');
      $this->load->view('v_jadwal_table',$data);
    }

  function select_unit(){
    $date = $this->input->get('date');
    $header = '<select multiple class="form-control tanggal_unit " name="tanggal_unit[]['.$date.']" id="tanggal_unit">';
    $select_item = '';
    $footer = '</select>';
    $data = $this->db->get('unit')->result_array();
    foreach ($data as $key => $value) {
      $select_item .= '<option value="'.$value['id_unit'].'" class="disabledunit">'.$value['nama'].'</option>'  ;
    } 
    $footer = '</select>';
    $cb_content = $header.$select_item.$footer;
    echo $cb_content;
  }

  function select_unit_for_edit($date,$unit){

    $selected_val = array();      
    
    $header = '<select multiple class="form-control tanggal_unit" name="tanggal_unit[]['.$date.']" id="tanggal_unit">';
    $select_item = '';
    $footer = '</select>';
    $data = $this->db->get('unit')->result_array();
    foreach ($data as $key => $value) {
      $selected = '';
      if (in_array($value['id_unit'], $unit)) {
        $selected = " selected ";
    }
      $select_item .= '<option value="'.$value['id_unit'].'" '.$selected.' class="disabledunit">'.$value['nama'].'</option>'  ;
    }
    $footer = '</select>';
    $cb_content = $header.$select_item.$footer;
    return $cb_content;
  }

  function booking_by_jadwal(){
   
    $data = $this->input->post();

    // print_r($data);
    // die;
    $tanggal = $input = array();       
    $tanggal_unit = array();

          foreach ($data['data'] as $key => $value) {             
            $date =  $value['tanggal']."-".$value['bulan']."-".$value['tahun'];
            $id_unit = $value['id_unit'];           
            $tanggal_unit[$date][] = $id_unit;             
          }
          foreach ($tanggal_unit as $key => $value) {                
            $input[$key]['select'] = $this->select_unit_for_edit($date,$value);            
            $input[$key]['id_date'] = $key;        
          } 
         
          // $this->load->view('v_booking_editor_by_jadwal', array('data' => $input));     
          
          $data['page'] = 'v_booking_editor_by_jadwal';
          $data['data'] = $input;
          $this->load->view('v_main',$data);

  }  

  function detail_harga(){
    $id = $this->input->get('id');
    $data = $this->M_booking->get_detail_harga($id);
    echo json_encode($data);
  }
}
?>
