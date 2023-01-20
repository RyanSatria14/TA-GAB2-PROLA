<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."libraries/Server.php";
class obat extends Server {
	
	public function __construct()
	{
			parent::__construct();
			
			$this->load->model("Models_obat","model",TRUE);
	}

	
	function service_get(){
		if ($this->token_login() == 0) {
            return $this->response(array("result" => 0, "error" => "Kode Signature Tidak Sesuai !"), 200);
        }
		else{
			$this->load->model("Models_obat","mdl",TRUE);
		
			$hasil = $this->mdl->get_data();
		
			$this->response(array("obat" => $hasil),200);
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
				"jenis" => $this->put("jenis"),
				"harga" => $this->put("harga"),
				"stok" => $this->put("stok"),
				"token" => base64_encode($this->put("token")),
			);
	
			$hasil = $this->model->update_data($data["kode"],$data["nama"],$data["jenis"],$data["harga"],$data["stok"],$data["token"]);
			
			
			if($hasil == 0){
				$this->response(array("status"=>"Data obat Berhasil Diubah"),200);
			}
			
			else{
				$this->response(array("status"=>"Data obat Gagal Diubah!"),200);
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
			"jenis" => $this->post("jenis"),
			"harga" => $this->post("harga"),
            "stok" => $this->post("stok"),
			"token" => base64_encode($this->post("token")),
		);
		
		$hasil = $this->model->save_data($data["kode"],$data["nama"],$data["jenis"],$data["harga"],$data["stok"],$data["token"]);
	
		if($hasil == 0){
			$this->response(array("status"=>"Data obat Berhasil Disimpan"),200);
		}
		
		else{
			$this->response(array("status"=>"Data obat Gagal Disimpan!"),200);
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
	
				$this->response(array("status"=>"Data obat berhasil dihapus"),200);
			}
			else
			{
				$this->response(array("status" => "Data obat gagal dihapus !"), 200);
			}

		}
	}  
	
}