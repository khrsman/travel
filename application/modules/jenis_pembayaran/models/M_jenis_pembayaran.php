<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis_pembayaran extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_data($search,$from_page,$per_page){
      $where = " where id_jenis_pembayaran like '%".$search."%' or nama like '%".$search."%' ";
      $where = ($search == '') ? '' : $where;
      $query = $this->db->query("SELECT id_jenis_pembayaran,nama FROM ref_jenis_pembayaran $where LIMIT $from_page,$per_page");

      #tambahkan nomor
      $result = $query->result_array();
      $nomor = $from_page;
      foreach ($result as $key => $value) {
        $nomor++;
        $result[$key] = array('No' => $nomor) + $result[$key];
      }

      $total_data = $this->db->query("select count(*) total from ref_jenis_pembayaran $where")->result_array()[0]['total'];
      return array('total'=> $total_data,
                   'data' => $result);
    }

    public function get($id){
        $this->db->where('id_jenis_pembayaran', $id);
        $this->db->limit(1);
        $query = $this->db->get('ref_jenis_pembayaran');
        return $query->result_array();
    }


    public function insert($data){
        $query = $this->db->insert('ref_jenis_pembayaran',$data);
        return $query;
    }

    public function update_by_id($data, $id){
        $this->db->where('id_jenis_pembayaran',$id);
        $query = $this->db->update('ref_jenis_pembayaran',$data);
    }

    public function delete_by_id($id){
        $this->db->where('id_jenis_pembayaran',$id);
        $query = $this->db->delete('ref_jenis_pembayaran');
    }


}
