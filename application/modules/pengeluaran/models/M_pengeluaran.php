<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengeluaran extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_data($search,$from_page,$per_page){
      $where = " where id_pengeluaran like '%".$search."%' or id_kategori_pengeluaran like '%".$search."%' or keterangan like '%".$search."%' or jumlah like '%".$search."%' or tanggal like '%".$search."%' ";
      $where = ($search == '') ? '' : $where;
      $query = $this->db->query("SELECT id_pengeluaran,
      DATE_FORMAT(tanggal,'%d/%m/%Y') tanggal, keterangan,
      (select nama from ref_kategori_pengeluaran where id_kategori_pengeluaran = pengeluaran.id_kategori_pengeluaran) kategori,
      (select nama from ref_jenis_pembayaran where id_jenis_pembayaran = pengeluaran.id_jenis_pembayaran) 'Jenis Pembayaran',
      jumlah
       FROM pengeluaran $where LIMIT $from_page,$per_page");

      #tambahkan nomor
      $result = $query->result_array();
      $nomor = $from_page;
      foreach ($result as $key => $value) {
        $nomor++;
        $result[$key] = array('No' => $nomor) + $result[$key];
      }

      $total_data = $this->db->query("select count(*) total from pengeluaran $where")->result_array()[0]['total'];
      return array('total'=> $total_data,
                   'data' => $result);
    }

    public function get($id){
        $this->db->where('id_pengeluaran', $id);
        $this->db->limit(1);
        $query = $this->db->get('pengeluaran');
        return $query->result_array();
    }


    public function insert($data){
        $query = $this->db->insert('pengeluaran',$data);
        return $query;
    }

    public function update_by_id($data, $id){
        $this->db->where('id_pengeluaran',$id);
        $query = $this->db->update('pengeluaran',$data);
    }

    public function delete_by_id($id){
        $this->db->where('id_pengeluaran',$id);
        $query = $this->db->delete('pengeluaran');
    }


}
