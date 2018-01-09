<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_data($search,$from_page,$per_page){
      $where = " where id_dashboard like '%".$search."%' or no_kk like '%".$search."%' or nik like '%".$search."%' or status_kk like '%".$search."%' or nama like '%".$search."%' or tempat_lahir like '%".$search."%' or tanggal_lahir like '%".$search."%' or jenis_kelamin like '%".$search."%' or golongan_darah like '%".$search."%' or agama like '%".$search."%' or status_perkawinan like '%".$search."%' or kedashboardnegaraan like '%".$search."%' or pekerjaan like '%".$search."%' or alamat like '%".$search."%' or rt like '%".$search."%' or rw like '%".$search."%' or desa_kelurahan like '%".$search."%' or telepon like '%".$search."%' or kode_pos like '%".$search."%' or nama_ibu like '%".$search."%' or nama_ayah like '%".$search."%' or nik_ibu like '%".$search."%' or nik_ayah like '%".$search."%' ";
      $where = ($search == '') ? '' : $where;
      $query = $this->db->query("SELECT id_dashboard,no_kk,nik,status_kk,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,golongan_darah,agama,status_perkawinan,kedashboardnegaraan,pekerjaan,alamat,rt,rw,desa_kelurahan,telepon,kode_pos,nama_ibu,nama_ayah,nik_ibu,nik_ayah FROM dashboard ".$where." LIMIT ".$from_page.",".$per_page);

      return array('total'=> $query->num_rows(),
                   'data' => $query->result_array());
    }

    public function get($id){
        $this->db->where('id_dashboard', $id);
        $this->db->limit(1);
        $query = $this->db->get('dashboard');
        return $query->result_array();
    }


    public function insert($data){
        $query = $this->db->insert('dashboard',$data);
        return $query;
    }

    public function update_by_id($data, $id){
        $this->db->where('id_dashboard',$id);
        $query = $this->db->update('dashboard',$data);
    }

    public function delete_by_id($id){
        $this->db->where('id_dashboard',$id);
        $query = $this->db->delete('dashboard');
    }


}
