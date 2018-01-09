<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_booking extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_data($search,$from_page,$per_page){
      $where = " where id_booking like '%".$search."%' or id_customer like '%".$search."%' or id_vendor like '%".$search."%' or tujuan like '%".$search."%' or status like '%".$search."%' or lokasi_jemput like '%".$search."%' or id_penanggung_jawab like '%".$search."%' ";
      $where = ($search == '') ? '' : $where;
      $query = $this->db->query("SELECT id_booking, kode,
        (select nama from customer where id_customer = bk.id_customer) Nama,
        tujuan,        
        (select nama from penanggung_jawab where id_penanggung_jawab = bk.id_penanggung_jawab) Admin,
        (select nama from vendor where id_vendor = bk.id_vendor) Vendor,
        harga_jual Harga,
        (select nama from ref_status where id_status = bk.id_status) 'Status'
         FROM booking bk $where LIMIT $from_page,$per_page");

      #tambahkan nomor
      $result = $query->result_array();
      $nomor = $from_page;
      foreach ($result as $key => $value) {
        $nomor++;
        $result[$key] = array('No' => $nomor) + $result[$key];
      }

      $total_data = $this->db->query("select count(*) total from booking $where")->result_array()[0]['total'];
      return array('total'=> $total_data,
                   'data' => $result);
    }

    public function get($id){
        $this->db->where('id_booking', $id);
        $this->db->limit(1);
        $query = $this->db->get('booking');
        return $query->result_array();
    }

    public function get_detail_tanggal($id){
        $this->db->where('id_booking', $id);      
        $this->db->group_by('tanggal');
        $query = $this->db->get('detail_booking');
        return $query->result_array();
    }

    public function insert($data,$tanggal_unit){
        $detail_booking = array();  
        $id_sumber = $data['id_sumber'];
        $date = DateTime::createFromFormat("Y-m-d", $data['tanggal_input']);
        $format_bulan =  $date->format("my");
      $this->db->trans_start();
      #kode booking
       $max =  $this->db->query("select ifnull(max(no_increment_per_bulan),0)+1 no from booking
        where DATE_FORMAT(tanggal_input,'%m%y') = $format_bulan")->result_array()[0]['no'];
        $kode_web = $this->db->query("select kode from sumber where id_sumber = $id_sumber")->result_array()[0]['kode'];       
        $kode = "$kode_web $format_bulan/$max";      
        $data['kode'] = $kode;
        $data['no_increment_per_bulan'] = $max;

        #mulai masukan data
      $query = $this->db->insert('booking',$data);
      $insert_id = $this->db->insert_id();

      foreach ($tanggal_unit as $key => $value) {
        foreach ($value as $keyy => $valuee) {
          $detail_booking[$key]['id_booking'] = $insert_id;
          $detail_booking[$key]['tanggal'] =  DateTime::createFromFormat('d-m-Y', $keyy)->format('Y-m-d');       
          $detail_booking[$key]['id_unit'] = $valuee;          
        }
      }  
      $query2 = $this->db->insert_batch('detail_booking',$detail_booking);    
      $this->db->trans_complete();


        return $query;
    }

    public function update_by_id($data, $id,$tanggal_unit){
        $detail_booking = array();  
        $this->db->trans_start();
        $this->db->where('id_booking',$id)->update('booking',$data);
      
        $this->db->where('id_booking',$id)->delete('detail_booking');

        foreach ($tanggal_unit as $key => $value) {
            foreach ($value as $keyy => $valuee) {
              $detail_booking[$key]['id_booking'] = $id;
              $detail_booking[$key]['tanggal'] =  DateTime::createFromFormat('d-m-Y', $keyy)->format('Y-m-d');       
              $detail_booking[$key]['id_unit'] = $valuee;          
            }
          }  
          $query2 = $this->db->insert_batch('detail_booking',$detail_booking); 
        $this->db->trans_complete();
    }
    public function update_harga($data, $id){     
        $this->db->trans_start();
        $this->db->where('id_booking',$id)->update('booking',$data); 
        $this->db->trans_complete();
    }

    public function delete_by_id($id){
        $this->db->trans_start();
        $this->db->where('id_booking',$id)->delete('booking');
        $this->db->where('id_booking',$id)->delete('detail_booking');
        $this->db->where('id_booking',$id)->delete('pembayaran');
        $this->db->where('id_booking',$id)->delete('invoice');
        $this->db->trans_complete();
    }


    public function get_detail_booking_unit($id)
    {
        $this->db->where('id_booking', $id)->join('unit', 'id_unit');
        $query = $this->db->get('detail_booking_unit');
        return $query->result_array();
    }
    public function get_detail_harga($id){      
         $this->db->select("
          kode detail_kode,
          (select nama from sumber where id_sumber = bk.id_sumber) detail_web,
          (select nama from customer where id_customer = bk.id_customer) detail_nama,
          (select telepon from customer where id_customer = bk.id_customer) detail_telepon,
          (select nama from ref_status where id_status = bk.id_status) detail_status,
          tujuan detail_tujuan, lokasi_jemput detail_alamat_jemput,        
          (select nama from penanggung_jawab where id_penanggung_jawab = bk.id_penanggung_jawab) detail_admin,
          (select nama from vendor where id_vendor = bk.id_vendor) detail_vendor,
          (select min(tanggal) from detail_booking where id_booking = bk.id_booking) detail_tanggal,
          harga_pokok harga_pokok, harga_jual harga_jual")->where('id_booking',$id);
         
          $query =  $this->db->get('booking bk');
       
        return $query->result_array()[0];
      }


}

