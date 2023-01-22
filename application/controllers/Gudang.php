<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_model');
		$this->load->model('Gudang_model');
	}

	public function index($id)
	{
		// $data['barang']=$this->Barang_model->read_by($id);
		$data['gudang']=$this->Gudang_model->read();
		$this->load->view('gudang/gudang_list', $data);
	}

	// public function add()
	// {
	// 	if($this->input->post('submit')){
    //         $this->Barang_model->create();
	// 		if($this->db->affected_rows() > 0) { 
    //             $this->session->set_flashdata('msg','<p style="color:green">Barang Berhasil Ditambah!</p>');
    //         } else {
    //             $this->session->set_flashdata('msg','<p style="color:red">Barang Gagal Ditambah!</p>');
    //         }
    //         redirect('gudang');
    //     }
		
	// 	$this->load->view('barang/barang_form');
	// }
}
