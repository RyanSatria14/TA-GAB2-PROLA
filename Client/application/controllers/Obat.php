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
			"token" => $this->input->post("tokennya"),
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

		//kirim hasil ke vw obat
		echo json_encode(array("statusnya" => $delete->status));
	}


//fungsi untuk update data
function updateObat()
{
	
		//$segmen = $this->uri->total_segments();
		//ambil nilai npm
		$token = $this->uri->segment(3);
		$tampil = json_decode($this->client->simple_get(APIOBAT, array("kode" => $token)));

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



//buat fungsi untuk simpan data mahasiswa
function setUpdate()
{
	//baca nilai dari fetch
	$data = array(
		"kode" => $this->input->post("kodenya"),
		"nama" => $this->input->post("namanya"),
		"jenis" => $this->input->post("jenisnya"),
		"harga" => $this->input->post("harganya"),
		"stok" => $this->input->post("stoknya"),
		"token" => $this->input->post("tokennya"),
	);
	
	$update = json_decode($this->client->simple_put(APIOBAT,$data));

	echo json_encode(array("statusnya" => $update->status));
}
	
}
