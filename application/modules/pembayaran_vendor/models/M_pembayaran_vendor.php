<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran_vendor extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_data($search,$from_page,$per_page){
      $where = " where id_pembayaran_vendor like '%".$search."%' or id_booking like '%".$search."%' or jumlah like '%".$search."%' or tanggal like '%".$search."%' or id_status like '%".$search."%' or sisa like '%".$search."%' ";
      $where = ($search == '') ? '' : $where;
      $query = $this->db->query("SELECT id_pembayaran_vendor,
DATE_FORMAT(tanggal, '%d/%m/%Y') tanggal,
     kode 'Kode Booking',
      (select nama from ref_status where id_status = pembayaran_vendor.id_status) Status,
      jumlah,sisa
      FROM pembayaran_vendor
      left join booking using(id_booking)
      $where LIMIT $from_page,$per_page");

      #tambahkan nomor
      $result = $query->result_array();
      $nomor = $from_page;
      foreach ($result as $key => $value) {
        $nomor++;
        $result[$key] = array('No' => $nomor) + $result[$key];
      }

      $total_data = $this->db->query("select count(*) total from pembayaran_vendor $where")->result_array()[0]['total'];
      return array('total'=> $total_data,
                   'data' => $result);
    }

    public function get($id){
        $this->db->where('id_pembayaran_vendor', $id);
        $this->db->limit(1);
        $query = $this->db->get('pembayaran_vendor');
        return $query->result_array();
    }


    public function insert($data){
        $query = $this->db->insert('pembayaran_vendor',$data);
        return $query;
    }

    public function update_by_id($data, $id){
        $this->db->where('id_pembayaran_vendor',$id);
        $query = $this->db->update('pembayaran_vendor',$data);
    }

    public function delete_by_id($id){
        $this->db->where('id_pembayaran_vendor',$id);
        $query = $this->db->delete('pembayaran_vendor');
    }


}
