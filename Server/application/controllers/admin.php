<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."libraries/Server.php";
class admin extends Server {
	
	public function __construct()
	{
			parent::__construct();
			
			$this->load->model("Models_admin","model",TRUE);
	}

	
	function service_get(){
		if ($this->token_login() == 0) {
            return $this->response(array("result" => 0, "error" => "Kode Signature Tidak Sesuai !"), 200);
        }
		else{
			$this->load->model("Models_admin","mdl",TRUE);
		
			$hasil = $this->mdl->get_data();
		
			$this->response(array("admin" => $hasil),200);
		}
		
	}


	function service_put(){
		if ($this->token_login() == 0) {
            return $this->response(array("result" => 0, "error" => "Kode Signature Tidak Sesuai !"), 200);
        }
		else{
			$data = array(
				"username" => $this->put("username"),
				"password" => $this->put("password"),
				"nama" => $this->put("nama"),
				"no_hp" => $this->put("no_hp"),
				"token" => base64_encode($this->put("token")),
			);
	
			$hasil = $this->model->update_data($data["username"],$data["password"],$data["nama"],$data["no_hp"],$data["token"]);
			
			
			if($hasil == 0){
				$this->response(array("status"=>"Data admin Berhasil Diubah"),200);
			}
			
			else{
				$this->response(array("status"=>"Data admin Gagal Diubah!"),200);
			}
		}
	}

	
	function service_post(){
		if ($this->token_login() == 0) {
            return $this->response(array("result" => 0, "error" => "Kode Signature Tidak Sesuai !"), 200);
        }
		else{$data = array(
            "username" => $this->post("username"),
            "password" => $this->post("password"),
            "nama" => $this->post("nama"),
            "no_hp" => $this->post("no_hp"),
            "token" => base64_encode($this->put("token")),
        );
		
		$hasil = $this->model->save_data($data["username"],$data["password"],$data["nama"],$data["no_hp"],$data["token"]);
	
		if($hasil == 0){
			$this->response(array("status"=>"Data admin Berhasil Disimpan"),200);
		}
		
		else{
			$this->response(array("status"=>"Data admin Gagal Disimpan!"),200);
		}

		}
	}
	
	
	function service_delete(){
		if ($this->token_login() == 0) {
            return $this->response(array("result" => 0, "error" => "Kode Signature Tidak Sesuai !"), 200);
        }
		else{$token = $this->delete("username");

			$hasil = $this->model->delete_data($token);
	
			if($hasil == 1)
			{
	
				$this->response(array("status"=>"Data admin berhasil dihapus"),200);
			}
			else
			{
				$this->response(array("status" => "Data admin gagal dihapus !"), 200);
			}

		}
	}  
	
}