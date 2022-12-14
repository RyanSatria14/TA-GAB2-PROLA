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

	
}
