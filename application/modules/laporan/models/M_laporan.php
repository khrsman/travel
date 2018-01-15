<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_mutasi($tanggal_dari,$tanggal_sampai){
        // $query = $this->db->query('select
        //  (select nama from kategori_pengeluaran kat where kat.id_kategori_pengeluaran = lap.id_kategori_pengeluaran) kategori,
        // keterangan, jumlah,  DATE_FORMAT(tanggal, "%d/%m/%Y") tanggal  from pengeluaran lap
        // where lap.id_kategori_pengeluaran in('.$kategori.')
        // and tanggal BETWEEN "'.$tanggal_dari.'" and "'.$tanggal_sampai.'"');

        $this->db->select("DATE_FORMAT(tanggal, '%d/%m/%Y') tanggal, cust.nama nama, (select nama from vendor where id_vendor = bk.id_vendor) vendor,
        (select tujuan from detail_booking where id_booking = bk.id_booking) tujuan,
        jumlah");
        $this->db->where('tanggal >=', $tanggal_dari);
        $this->db->where('tanggal <=', $tanggal_sampai);
        $this->db->join('booking bk', 'id_booking');
        $this->db->join('customer cust', 'id_customer');
        $query = $this->db->get('pembayaran');
        return $query->result_array();
    }
    public function get_laporan_rekap_pengeluaran($tanggal_dari,$tanggal_sampai){
        $query = $this->db->query('select (select nama from kategori_pengeluaran kat where kat.id_kategori_pengeluaran = lap.id_kategori_pengeluaran) kategori,
        sum(jumlah) jumlah from pengeluaran lap
        where tanggal BETWEEN "'.$tanggal_dari.'" and "'.$tanggal_sampai.'"
        group by id_kategori_pengeluaran');
        return $query->result_array();
    }
    public function get_laporan_pengeluaran($tanggal_dari,$tanggal_sampai){

        $this->db->select("DATE_FORMAT(tanggal,'%d/%m/%Y') tanggal, keterangan,
        (select nama from ref_kategori_pengeluaran where id_kategori_pengeluaran = pengeluaran.id_kategori_pengeluaran) kategori,
        (select nama from ref_jenis_pembayaran where id_jenis_pembayaran = pengeluaran.id_jenis_pembayaran) jenis_pembayaran,
        jumlah");
        $this->db->where('tanggal >=', $tanggal_dari);
        $this->db->where('tanggal <=', $tanggal_sampai);
        $query = $this->db->get('pengeluaran');
        return $query->result_array();
    }
    public function get_laporan_rekap_pendapatan($tanggal_dari,$tanggal_sampai){
        $query = $this->db->query("select id_booking, id_unit,
        (select seri from unit where dtl_unit.id_unit = id_unit) seri,
        sum(IFNULL((select biaya_total from spj where id_booking = dtl_unit.id_booking and id_unit = dtl_unit.id_unit),0)) kas_jalan,
        sum(harga) total,
        sum((select count(tanggal) tanggal from detail_booking where id_booking = dtl_unit.id_booking and id_unit = dtl_unit.id_unit)) jumlah_hari
        from detail_booking_unit dtl_unit
        where
        (select min(tanggal) tanggal from detail_booking where id_booking = dtl_unit.id_booking) >= '$tanggal_dari' and
        (select min(tanggal) tanggal from detail_booking where id_booking = dtl_unit.id_booking) <= '$tanggal_sampai'
        group by id_unit
        ");
         return $query->result_array();
        //  die($this->db->last_query());

    }
    public function get_laporan_pemakaian_sparepart($tanggal_dari,$tanggal_sampai,$unit,$sparepart){
      $where = '';
      if($unit)
        $where .= " and id_unit in($unit)";
      if ($sparepart)
          $where .= " and id_sparepart in($sparepart)";


        $query = $this->db->query("select tanggal,
        (select seri from unit where id_unit = pemakaian_sparepart.id_unit) unit,
        (select nama from sparepart where id_sparepart = pemakaian_sparepart.id_sparepart) nama_sparepart,
        jumlah
        from pemakaian_sparepart where tanggal BETWEEN '$tanggal_dari' and '$tanggal_sampai' $where");
        // echo $this->db->last_query();
        //  die;
        return $query->result_array();
    }

}
