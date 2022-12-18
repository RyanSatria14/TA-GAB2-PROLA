<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	public function index()
	{
		$data["tampil"] = json_decode($this->client->simple_get(APIOBAT));
		
		//foreach($data["tampil"] -> mahasiswa as $result)
		//{
		//	echo $result->npm_mhs."<br>";
		//}
		$this->load->view('vw_obat', $data);
	}

	function TambahObat()
	{
		$this->load->view('en_obat');
	}

	function setSave()
	{
		//baca nilai dari fetch
		$data = array(
			"kode" => $this->input->post("kodenya"),
			"nama" => $this->input->post("namanya"),
		    "jenis" => $this->input->post("jenisnya"),
		    "harga" => $this->input->post("harganya"),
			"stok" => $this->input->post("stoknya"),
			"token" => $this->input->post("kodenya"),
		);
		
		$save = json_decode($this->client->simple_post(APIOBAT,$data));

		echo json_encode(array("statusnya" => $save->status));
	}

	function setDelete()
	{
		//buat variable
		$json = file_get_contents("php://input");
		$hasil = json_decode($json);

		$delete = json_decode($this->client->simple_delete(APIOBAT,array("kode" => $hasil->kodenya)));


		//isi nilai err
		//$err = 0;

		//kirim hasil ke vw mahasiswa
		echo json_encode(array("statusnya" => $delete->status));
	}
	
}
