<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_invoice extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_data($search,$from_page,$per_page){
      $where = " where id_invoice like '%".$search."%' or id_booking like '%".$search."%' or tanggal like '%".$search."%' ";
      $where = ($search == '') ? '' : $where;
      $query = $this->db->query("SELECT id_invoice,id_booking,tanggal FROM invoice $where LIMIT $from_page,$per_page");

      #tambahkan nomor
      $result = $query->result_array();
      $nomor = $from_page;
      foreach ($result as $key => $value) {
        $nomor++;
        $result[$key] = array('No' => $nomor) + $result[$key];
      }

      $total_data = $this->db->query("select count(*) total from invoice $where")->result_array()[0]['total'];
      return array('total'=> $total_data,
                   'data' => $result);
    }

    public function get($id){
        $this->db->where('id_invoice', $id);
        $this->db->limit(1);
        $query = $this->db->get('invoice');
        return $query->result_array();
    }


    public function insert($data){
        $query = $this->db->insert('invoice',$data);
        return $query;
    }

    public function update_by_id($data, $id){
        $this->db->where('id_invoice',$id);
        $query = $this->db->update('invoice',$data);
    }

    public function delete_by_id($id){
        $this->db->where('id_invoice',$id);
        $query = $this->db->delete('invoice');
    }

    public function get_detail_invoice($id){
         $this->db->select("
          kode kode_booking,
          (select nama from sumber where id_sumber = bk.id_sumber) detail_web,
          (select nama from customer where id_customer = bk.id_customer) nama_cust,
          (select alamat from customer where id_customer = bk.id_customer) alamat_cust,
          tanggal_input tanggal,
          (select nama from penanggung_jawab where id_penanggung_jawab = bk.id_penanggung_jawab) admin,
          (select no_telepon from penanggung_jawab where id_penanggung_jawab = bk.id_penanggung_jawab) telp_admin
         ")->where('id_booking',$id);
          $data_booking =  $this->db->get('booking bk')->result_array()[0];

         $this->db->select("(select nama from unit where id_unit = bk.id_unit) unit, '1' jml_unit, DATE_FORMAT(tanggal,'%d %M %Y') tanggal_unit, tujuan, harga harga_unit, (select sum(harga) from detail_booking where id_booking = bk.id_booking) total_harga
           ")->where('id_booking',$id);
           $data_unit =  $this->db->get('detail_booking bk')->result_array();

           $data_invoice = array('data_invoice' => $data_booking, 'detail_unit' => $data_unit);

        return $data_invoice;
      }


}
