<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	// buat variabel global
	var $key_name = 'KEY-API';
	var $key_value = 'RESTAPI';
	var $key_bearer = 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NzI3Njc4NzB9.sR9o91Cm73tjZKvq5caahstYdq8SC9gXaVTxsavVXYA';

	public function index()
	{
		$this->client->http_header($this->key_bearer);

		$data["tampil"] = json_decode($this->client->simple_get(APIOBAT, [$this->key_name => $this->key_value]));

		if ($data["tampil"]->result == 0) {
			echo $data["tampil"]->error;
		} else {
			$this->load->view('index', $data);
		}

	}

	function TambahObat()
	{
		$this->load->view('en_obat');
	}

	function setSave()
	{
		$this->client->http_header($this->key_bearer);

		//baca nilai dari fetch
		$data = array(
			"kode" => $this->input->post("kodenya"),
			"nama" => $this->input->post("namanya"),
		    "jenis" => $this->input->post("jenisnya"),
		    "harga" => $this->input->post("harganya"),
			"stok" => $this->input->post("stoknya"),
			"token" => $this->input->post("tokennya"),
			$this->key_name => $this->key_value
		);
		
		$save = json_decode($this->client->simple_post(APIOBAT,$data));

		if ($save->result == 0) {
			echo json_encode(array("statusnya" => $save->error));
		} else {
			echo json_encode(array("statusnya" => $save->status));
		}
		
	}

	function setDelete()
	{
		$this->client->http_header($this->key_bearer);

		//buat variable
		$json = file_get_contents("php://input");
		$hasil = json_decode($json);

		$delete = json_decode($this->client->simple_delete(APIOBAT,array("kode" => $hasil->kodenya, $this->key_name => $this->key_value)));
		
		if ($delete->result == 0) {
			echo json_encode(array("statusnya" => $delete->error));
		} else {
			echo json_encode(array("statusnya" => $delete->status));
		}
		
	}


//fungsi untuk update data
function updateObat()
{
	$this->client->http_header($this->key_bearer);
		//ambil nilai kode
		$token = $this->uri->segment(3);
		$tampil = json_decode($this->client->simple_get(APIOBAT, array("kode" => $token, $this->key_name => $this->key_value)));

		if ($tampil->result == 0) {
			echo $tampil->error;
		} else {
		foreach($tampil -> obat as $result)
		{
			//echo $result->nama_mhs."<br>";
			$data = array(
				"kode" => $result->kode_obat,
				"nama" => $result->nama_obat,
				"jenis" => $result->jenis_obat,
				"harga" => $result->harga_obat,
				"stok" => $result->stok_obat,
				"token" => $token,
		);
	}
	$this->load->view('up_obat', $data);
	}	
}



//buat fungsi untuk simpan data mahasiswa
function setUpdate()
{
	$this->client->http_header($this->key_bearer);
	//baca nilai dari fetch
	$data = array(
		"kode" => $this->input->post("kodenya"),
		"nama" => $this->input->post("namanya"),
		"jenis" => $this->input->post("jenisnya"),
		"harga" => $this->input->post("harganya"),
		"stok" => $this->input->post("stoknya"),
		"token" => $this->input->post("tokennya"),
		$this->key_name => $this->key_value
	);
	
	$update = json_decode($this->client->simple_put(APIOBAT,$data));
	// kirim hasil ke "up_obat"
	if ($update->result == 0) {
		echo json_encode(array("statusnya" => $update->error));
	} else {
		echo json_encode(array("statusnya" => $update->status));
	}
	
}
	
}
