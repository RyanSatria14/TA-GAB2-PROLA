<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."libraries/Server.php";
class supplier extends Server {
	
	public function __construct()
	{
			parent::__construct();
			
			$this->load->model("Models_supplier","model",TRUE);
	}

	
	function service_get(){
		if ($this->token_login() == 0) {
            return $this->response(array("result" => 0, "error" => "Kode Signature Tidak Sesuai !"), 200);
        }
		else{
			$this->load->model("Models_supplier","mdl",TRUE);
		
			$hasil = $this->mdl->get_data();
		
			$this->response(array("supplier" => $hasil),200);
		}
		
	}


	function service_put(){
		if ($this->token_login() == 0) {
            return $this->response(array("result" => 0, "error" => "Kode Signature Tidak Sesuai !"), 200);
        }
		else{
			$data = array(
				"kode" => $this->put("kode"),
				"nama" => $this->put("nama"),
				"no_hp" => $this->put("no_hp"),
				"alamat" => $this->put("alamat"),
				"kota" => $this->put("kota"),
				"token" => base64_encode($this->put("token")),
			);
	
			$hasil = $this->model->update_data($data["kode"],$data["nama"],$data["no_hp"],$data["alamat"],$data["kota"],$data["token"]);
			
			
			if($hasil == 0){
				$this->response(array("status"=>"Data supplier Berhasil Diubah"),200);
			}
			
			else{
				$this->response(array("status"=>"Data supplier Gagal Diubah!"),200);
			}
		}
	}

	
	function service_post(){
		if ($this->token_login() == 0) {
            return $this->response(array("result" => 0, "error" => "Kode Signature Tidak Sesuai !"), 200);
        }
		else{$data = array(
			"kode" => $this->post("kode"),
				"nama" => $this->post("nama"),
				"no_hp" => $this->post("no_hp"),
				"alamat" => $this->post("alamat"),
				"kota" => $this->post("kota"),
				"token" => base64_encode($this->post("token")),
		);
		
		$hasil = $this->model->update_data($data["kode"],$data["nama"],$data["no_hp"],$data["alamat"],$data["kota"],$data["token"]);
	
		if($hasil == 0){
			$this->response(array("status"=>"Data supplier Berhasil Disimpan"),200);
		}
		
		else{
			$this->response(array("status"=>"Data supplier Gagal Disimpan!"),200);
		}

		}
	}
	
	
	function service_delete(){
		if ($this->token_login() == 0) {
            return $this->response(array("result" => 0, "error" => "Kode Signature Tidak Sesuai !"), 200);
        }
		else{$token = $this->delete("kode");

			$hasil = $this->model->delete_data($token);
	
			if($hasil == 1)
			{
	
				$this->response(array("status"=>"Data supplier berhasil dihapus"),200);
			}
			else
			{
				$this->response(array("status" => "Data supplier gagal dihapus !"), 200);
			}

		}
	}  
	
}