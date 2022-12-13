<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Models_obat extends CI_Model {
    
    function get_data(){
        
        $this->db->select("id AS id_obat,
        kode AS kode_obat,
        nama AS nama_obat,
        jenis AS jenis_obat,
        harga AS harga_obat,
        stok AS stok_obat");
        $this->db->from('tb_obat');

        $this->db->order_by('kode','asc');
        $query = $this->db->get()->result();
        return $query;
    }

    function delete_data($token){
        $this->db->select("kode");
        $this->db->from("tb_obat");
        $this->db->where("kode = '$token'");
        $query = $this->db->get()->result();
        if(count($query) == 1){
            $this->db->where("kode = '$token'");
            $this->db->delete("tb_obat");
            $hasil = 1;
        }
        else{
            $hasil = 0;
        }
        return $hasil;
    }

    function save_data($kode,$nama,$jenis,$harga,$stok,$token){
         $this->db->select("kode");
         $this->db->from("tb_obat");
         $this->db->where("TO_BASE64(kode) = '$token'");
         $query = $this->db->get()->result();
         if(count($query) == 0){
            $data = array(
                "kode" => $kode,
                "nama" => $nama,
                "jenis" => $jenis,
                "harga" => $harga,
                "stok" => $stok,
            );
            $this->db->insert("tb_obat",$data);
            $hasil = 0;
         }
         else{
            $hasil = 1;
         }
         return $hasil;
    }

    function update_data($kode,$nama,$jenis,$harga,$stok,$token){
         $this->db->select("kode");
         $this->db->from("tb_obat");
         $this->db->where("TO_BASE64(kode) != '$token' AND kode = '$kode'");
         $query = $this->db->get()->result();
         if(count($query) == 0){
            $data = array(
                "kode" => $kode,
                "nama" => $nama,
                "jenis" => $jenis,
                "harga" => $harga,
                "stok" => $stok,
            );

            $this->db->where("TO_BASE64(kode) != '$token'");
            $this->db->update("tb_obat",$data);
            $hasil = 0;
         }
         else{
            $hasil = 1;
         }

         return $hasil;
    }
    
}
