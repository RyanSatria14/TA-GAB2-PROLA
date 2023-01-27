<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Models_user extends CI_Model {

    function get_data(){
        $this->db->select("id AS id_admin,
        username AS username,
        password AS password_admin,
        nama AS nama_admin,
        no_hp AS no_hp_admin");
        $this->db->from('tb_user');

        $this->db->order_by('username','asc');
        $query = $this->db->get()->result();
        return $query;
    }

    function delete_data($token){
        $this->db->select("username");
        $this->db->from("tb_user");
        $this->db->where("username = '$token'");
        $query = $this->db->get()->result();
        if(count($query) == 1){
            $this->db->where("username = '$token'");
            $this->db->delete("tb_user");
            $hasil = 1;
        }
        else{
            $hasil = 0;
        }
        return $hasil;
    }

    function save_data($username,$password,$nama,$no_hp,$token){
         $this->db->select("username");
         $this->db->from("tb_user");
         $this->db->where("TO_BASE64(username) = '$token'");
         $query = $this->db->get()->result();
         if(count($query) == 0){
            $data = array(
                "username" => $username,
                "password" => $password,
                "nama" => $nama,
                "no_hp" => $no_hp,
            );
            $this->db->insert("tb_user",$data);
            $hasil = 0;
         }
         else{
            $hasil = 1;
         }
         return $hasil;
    }

    function update_data($username,$password,$nama,$no_hp,$token){
         $this->db->select("username");
         $this->db->from("tb_user");
         $this->db->where("TO_BASE64(username) != '$token' AND username = '$username'");
         $query = $this->db->get()->result();
         if(count($query) == 0){
            $data = array(
                "username" => $username,
                "password" => $password,
                "nama" => $nama,
                "no_hp" => $no_hp,
            );

            $this->db->where("TO_BASE64(username) != '$token'");
            $this->db->update("tb_user",$data);
            $hasil = 0;
         }
         else{
            $hasil = 1;
         }

         return $hasil;
    }
    
}
