
 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Cb_options {
   public function __construct()
       {
               // Assign the CodeIgniter super-object
               $this->CI =& get_instance();
       }

         public function vendor()
         {
           $header = '<select class="form-control input_validation select2" name="id_vendor" id="id_vendor">
             <option value="" selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';
           $data = $this->CI->db->get('vendor')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_vendor'].'">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_content = $header.$select_item.$footer;
           echo $cb_content;
         }

         public function sumber()
         {
           $header = '<select class="form-control input_validation select2" name="id_sumber" id="id_sumber">
             <option value="" selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';
           $data = $this->CI->db->get('sumber')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_sumber'].'">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_content = $header.$select_item.$footer;
           echo $cb_content;
         }

         public function customer()
         {
           $header = '<select class="form-control input_validation select2" name="id_customer" id="id_customer">
             <option value="" selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';
           $data = $this->CI->db->get('customer')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_customer'].'">'.$value['nama']." || ".$value['email'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_content = $header.$select_item.$footer;
           echo $cb_content;
         }

         public function booking()
         {
           $header = '<select class="form-control input_validation select2" name="id_booking" id="id_booking">
             <option value="" selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';
           $data = $this->CI->db->select('kode,(select nama from customer where id_customer = booking.id_customer) nama, tujuan, id_booking')->get('booking')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_booking'].'">'.$value['kode']." || ".$value['nama']." || ".$value['tujuan'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_content = $header.$select_item.$footer;
           echo $cb_content;
         }

         public function unit()
         {

           $header = '<select multiple class="form-control select_unit " name="id_unit[]" id="id_unit">';
           $select_item = '';
           $footer = '</select>';
           $data = $this->CI->db->get('unit')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_unit'].'" class="disabledunit">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_content = $header.$select_item.$footer;
           echo $cb_content;
         }

         public function unit_tanggal($date)
         {

           $header = '<select multiple class="form-control select_unit " name="id_unit[]" id="unit_tanggal">';
           $select_item = '';
           $footer = '</select>';
           $data = $this->CI->db->get('unit')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_unit'].'" class="disabledunit">'.$value['nama'].$date.'</option>'  ;
           }
           $footer = '</select>';
           $cb_content = $header.$select_item.$footer;
           echo $cb_content;
         }

         public function kategori_pengeluaran()
         {

           $header = '<select class="form-control " name="id_kategori_pengeluaran" id="id_kategori_pengeluaran">
           <option value="" selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';
           $data = $this->CI->db->get('ref_kategori_pengeluaran')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_kategori_pengeluaran'].'" >'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_content = $header.$select_item.$footer;
           echo $cb_content;
         }
         public function jenis_pembayaran()
         {

           $header = '<select class="form-control " name="id_jenis_pembayaran" id="id_jenis_pembayaran">
           <option value="" selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';
           $data = $this->CI->db->get('ref_jenis_pembayaran')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_jenis_pembayaran'].'" >'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_content = $header.$select_item.$footer;
           echo $cb_content;
         }
         

         public function penanggung_jawab()
         {
           $header = '<select class="form-control input_validation select2" name="id_penanggung_jawab" id="id_penanggung_jawab">
             <option value="" selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';
           $data = $this->CI->db->get('penanggung_jawab')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_penanggung_jawab'].'">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_content = $header.$select_item.$footer;
           echo $cb_content;
         }

         public function status()
         {
           $header = '<select class="form-control input_validation" name="id_status" id="id_status">
             <option value="" selected="" disabled>--- PILIH ---</option>';
           $select_item = '';
           $footer = '</select>';
           $data = $this->CI->db->where('id_status <>', '0')->get('ref_status')->result_array();
           foreach ($data as $key => $value) {
             $select_item .= '<option value="'.$value['id_status'].'">'.$value['nama'].'</option>'  ;
           }
           $footer = '</select>';
           $cb_content = $header.$select_item.$footer;
           echo $cb_content;
         }


         public function bulan()
         {
           $bulan = '<select class="form-control" name="bulan" id="bulan">
             <option selected="">--- PILIH ---</option>
             <option value="1">1 - Januari</option>
             <option value="2">2 - Februari</option>
             <option value="3">3 - Maret</option>
             <option value="4">4 - April</option>
             <option value="5">5 - Mei</option>
             <option value="6">6 - Juni</option>
             <option value="7">7 - Juli</option>
             <option value="8">8 - Agustus</option>
             <option value="9">9 - September</option>
             <option value="10">10 - Oktober</option>
             <option value="11">11 - November</option>
             <option value="12">12 - Desember</option>
             </select>
             ';

           echo $bulan;
         }
         public function tahun()
         {
           $header = '<select class="form-control" name="tahun" id="tahun">';
             $select_item = '';
             for ($i=-1; $i <= 5 ; $i++) {
               $year = date('Y') - $i;
              $select_item .= '<option value="'.$year.'">'.$year.'</option>';
             }
            $footer = '</select>';
           $cb_posyandu = $header.$select_item.$footer;
           echo $cb_posyandu;
         }
 }
