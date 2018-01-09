<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_data($search,$from_page,$per_page){
      $where = " where id_pembayaran like '%".$search."%' or kode like '%".$search."%' or jumlah like '%".$search."%' or tanggal like '%".$search."%' or di_status like '%".$search."%' or sisa like '%".$search."%' ";
      $where = ($search == '') ? '' : $where;
      $query = $this->db->query("SELECT id_pembayaran,
DATE_FORMAT(tanggal, '%d/%m/%Y') tanggal,
     kode 'Kode Booking',
      (select nama from ref_status where id_status = pembayaran.id_status) Status,
      jumlah,sisa 
      FROM pembayaran 
      left join booking using(id_booking)
      $where LIMIT $from_page,$per_page");

      #tambahkan nomor
      $result = $query->result_array();
      $nomor = $from_page;
      foreach ($result as $key => $value) {
        $nomor++;
        $result[$key] = array('No' => $nomor) + $result[$key];
      }

      $total_data = $this->db->query("select count(*) total from pembayaran $where")->result_array()[0]['total'];
      return array('total'=> $total_data,
                   'data' => $result);
    }

    public function get($id){
        $this->db->where('id_pembayaran', $id);
        $this->db->limit(1);
        $query = $this->db->get('pembayaran');
        return $query->result_array();
    }

    public function insert($data){
        $this->db->trans_start();
        $data_status = array('id_status' => $data['id_status']);;
        $this->db->where('id_booking',$data['id_booking'])->update('booking',$data_status);       
     
        $query = $this->db->insert('pembayaran',$data);
        $this->db->trans_complete();
        return $query;
    }

    public function update_by_id($data, $id){
        $this->db->where('id_pembayaran',$id);
        $query = $this->db->update('pembayaran',$data);
    }

    public function delete_by_id($id){
        $this->db->where('id_pembayaran',$id);
        $query = $this->db->delete('pembayaran');
    }

    

}
