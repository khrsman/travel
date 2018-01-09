<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_invoice');
    }

    // view
    function index(){
    $data['page'] = 'v_invoice';
    $this->load->view('v_main',$data);
    }

    function data(){
    $this->load->view('v_invoice_data');
    }

    function editor(){
    $this->load->view('v_invoice_editor');
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

      $data = $this->M_invoice->get_data($search,$from_page,$per_page); // ambil data
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
      $data = $this->M_invoice->get($id);
      echo json_encode($data);
    }

    // tambah data
    function add(){
        $data = array();
        parse_str($_POST['data'], $data);
        // jika fieldnya auto increment
        if (isset($data['id_invoice'])) {
          $data['id_invoice'] = NULL;
        };
        $insert = $this->M_invoice->insert($data);
        if (!$insert) {
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();
          }
    }

    // fungsi update
    function update(){
      $data = array();
      parse_str($_POST['data'], $data);
      $id = $data['id_invoice'];
      $update = $this->M_invoice->update_by_id($data,$id);
    }

    // fungsi hapus
    function delete(){
      $id = $this->input->post('id');
      $delete = $this->M_invoice->delete_by_id($id);
    }

    function create_invoice_file(){     
    
      $id = $this->input->get('id');
      $query = $this->db->select('id_sumber')->where('id_booking',$id)->get('booking')->result_array();   
      $sumber = $query[0]['id_sumber'];

      switch ($sumber) {
        case '1':
        $file_surat = base_url('file_invoice/template/invoice_arundina_bca.rtf');
          break;
          case '2':
          $file_surat = base_url('file_invoice/template/invoice_arundina_bca.rtf');
          break;
          case '3':
          $file_surat = base_url('file_invoice/template/invoice_arundina_bca.rtf');
          break;
          case '4':
          $file_surat = base_url('file_invoice/template/invoice_arundina_bca.rtf');
          break;
        
        default:
          # code...
          break;
      }
        
            $process = fopen($file_surat,'r');
            $content = stream_get_contents($process);
                              
            //Data Invoce
            $array_replace = array(
              "[nama_customer]" => "ddd",
              "[alamat_customer]" => 'input_baru'            
            );              
            
            $new_content = str_replace(array_keys($array_replace), array_values($array_replace), $content);                        
            $path_innvoice = realpath(APPPATH.'../file_invoice/generated')."/";          
            $nama_surat = 'invoice_test';            
            $rtf_file = $path_innvoice.$nama_surat.".rtf";
            $pdf_file = $path_innvoice.$nama_surat.".pdf";
           
            $handle = fopen($rtf_file,'w+');
            fwrite($handle,$new_content);
            fclose($handle);
           
            $output_dir = realpath(APPPATH.'../file_invoice/generated/');                        
            $x = exec("libreoffice --headless --convert-to pdf $rtf_file --outdir $output_dir");
            // echo $pdf_file;
            $pdf_web_file = base_url('file_invoice/generated')."/".$nama_surat.".pdf";

            $file_email = array('link' => $pdf_web_file,
                                'base' => $output_dir."/".$nama_surat.".pdf",
                                'name'=> $nama_surat.".pdf");
            echo json_encode($file_email);                      
             
        }
      




}
?>
