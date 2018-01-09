<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_data($search,$from_page,$per_page){
      $where = " where id_customer like '%".$search."%' or nama like '%".$search."%' or telepon like '%".$search."%' or alamat like '%".$search."%' or email like '%".$search."%' ";
      $where = ($search == '') ? '' : $where;
      $query = $this->db->query("SELECT id_customer,nama,telepon,alamat,email FROM customer $where LIMIT $from_page,$per_page");

      #tambahkan nomor
      $result = $query->result_array();
      $nomor = $from_page;
      foreach ($result as $key => $value) {
        $nomor++;
        $result[$key] = array('No' => $nomor) + $result[$key];
      }

      $total_data = $this->db->query("select count(*) total from customer $where")->result_array()[0]['total'];
      return array('total'=> $total_data,
                   'data' => $result);
    }

    public function get($id){
        $this->db->where('id_customer', $id);
        $this->db->limit(1);
        $query = $this->db->get('customer');
        return $query->result_array();
    }


    public function insert($data){
        $query = $this->db->insert('customer',$data);
        return $query;
    }

    public function update_by_id($data, $id){
        $this->db->where('id_customer',$id);
        $query = $this->db->update('customer',$data);
    }

    public function delete_by_id($id){
        $this->db->where('id_customer',$id);
        $query = $this->db->delete('customer');
    }


}
