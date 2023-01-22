<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_barang_mentah extends CI_Controller {

	function __construct()
	{
		parent::__construct();   
		$this->load->model('Permintaan_barang_mentah_model');
        $this->load->model('Barang_model');
    }

	public function index()
	{
		$this->load->library('pagination');

        $config['base_url'] = site_url('Permintaan_barang_mentah/index');
        $config['total_rows'] = $this->db->count_all('permintaan_barang_mentah');
        $config['per_page'] = 10;
        $config['num_links'] = 3;
        
        // styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //config
        $this->pagination->initialize($config);

        $limit=$config['per_page'];
        $start=$this->uri->segment(3)?$this->uri->segment(3):0;

        $data['i']=$start+1;
		
        $data['barang_mentah']=$this->Permintaan_barang_mentah_model->join($limit,$start);
		$this->load->view('permintaan_barang_mentah/permintaan_barang_list',$data);
	}

	public function add()
	{
		if($this->input->post('submit')){
            $this->Permintaan_barang_mentah_model->create();
			if($this->db->affected_rows() > 0) { 
                $this->session->set_flashdata('msg','<p style="color:green">Permintaan Barang Berhasil!</p>');
            } else {
                $this->session->set_flashdata('msg','<p style="color:red">Permintaan Barang Gagal!</p>');
            }
            redirect('permintaan_barang_mentah');
        }
        $data['barang']=$this->Barang_model->read_all();
		$this->load->view('permintaan_barang_mentah/permintaan_barang_form',$data);
	}

	public function edit($id)
    {
        if($this->input->post('submit')){
            $this->Permintaan_barang_mentah_model->update($id);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('msg','<p style="color:blue;">Data Update Succesfully!</p>');
            } else {
                $this->session->set_flashdata('msg','<p style="color:red;">Data Update Failed!</p>');
            }
            redirect('permintaan_barang_mentah');
        }
        $data['barang']=$this->Barang_model->read_all();
        $data['barang_mentah']=$this->Permintaan_barang_mentah_model->read_by($id);
        $this->load->view('permintaan_barang_mentah/status',$data);
    }

    public function delete($id)
    {
        $this->Permintaan_barang_mentah_model->delete($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('msg','<p style="color:blue;">Data Delete Succesfully!</p>');
        } else {
            $this->session->set_flashdata('msg','<p style="color:red;">Data Delete Failed!</p>');
        }
        redirect('permintaan_barang_mentah');
    }

	public function search()
	{
		$data['keyword'] = $this->input->post('keyword');

        $this->load->library('pagination');

        $config['base_url'] = site_url('permintaan_barang_mentah/index');

		$this->db->like('id_permintaan_barang', $data['keyword']);
		$this->db->or_like('stok_terkirim',$data['keyword']);
		$this->db->or_like('status',$data['keyword']);
		$this->db->from('permintaan_barang_mentah');

        $config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 5;

        $config['num_links'] = 4;
        
        // styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //config
        $this->pagination->initialize($config);

        $limit=$config['per_page'];
        $start=$this->uri->segment(3);

        $data['i']=$start+1;

		if ($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword',$data['keyword']);
			$data['barang_mentah'] = $this->Permintaan_barang_mentah_model->join($limit,$start,$data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
			$data['barang_mentah'] = $this->Permintaan_barang_mentah_model->join($limit,$start,$data['keyword']);
		}
		
		$this->load->view('permintaan_barang_mentah/permintaan_barang_list',$data);
	}
}
