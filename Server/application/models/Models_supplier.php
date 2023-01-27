<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Models_supplier extends CI_Model {

    function get_data(){
        $this->db->select("id AS id_supplier,
        kode AS kode_supplier,
        nama AS nama_supplier,
        no_hp AS no_hp_supplier,
        alamat AS alamat_supplier,
        kota AS kota_supplier");
        $this->db->from('tb_supplier');

        $this->db->order_by('kode','asc');
        $query = $this->db->get()->result();
        return $query;
    }

    function delete_data($token){
        $this->db->select("kode");
        $this->db->from("tb_supplier");
        $this->db->where("kode = '$token'");
        $query = $this->db->get()->result();
        if(count($query) == 1){
            $this->db->where("kode = '$token'");
            $this->db->delete("tb_supplier");
            $hasil = 1;
        }
        else{
            $hasil = 0;
        }
        return $hasil;
    }

    function save_data($kode,$nama,$no_hp,$alamat,$kota,$token){
         $this->db->select("kode");
         $this->db->from("tb_supplier");
         $this->db->where("TO_BASE64(kode) = '$token'");
         $query = $this->db->get()->result();
         if(count($query) == 0){
            $data = array(
                "kode" => $kode,
                "nama" => $nama,
                "no_hp" => $jenis,
                "alamat" => $alamat,
                "kota" => $kota,
            );
            $this->db->insert("tb_supplier",$data);
            $hasil = 0;
         }
         else{
            $hasil = 1;
         }
         return $hasil;
    }

    function update_data($kode,$nama,$no_hp,$alamat,$kota,$token){
         $this->db->select("kode");
         $this->db->from("tb_supplier");
         $this->db->where("TO_BASE64(kode) != '$token' AND kode = '$kode'");
         $query = $this->db->get()->result();
         if(count($query) == 0){
            $data = array(
                "kode" => $kode,
                "nama" => $nama,
                "no_hp" => $jenis,
                "alamat" => $alamat,
                "kota" => $kota,
            );

            $this->db->where("TO_BASE64(kode) != '$token'");
            $this->db->update("tb_supplier",$data);
            $hasil = 0;
         }
         else{
            $hasil = 1;
         }

         return $hasil;
    }
    
}
