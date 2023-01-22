<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengiriman_model');
    }

	public function index()
	{
		$this->load->library('pagination');

        $config['base_url'] = site_url('Pengiriman/index');
        $config['total_rows'] = $this->db->count_all('pengiriman');
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

		$data['pengiriman'] = $this->Pengiriman_model->read($limit,$start);
		$this->load->view('pengiriman/pengiriman_list',$data);
	}

	public function add()
	{
		if($this->input->post('submit')){
            $this->Pengiriman_model->create();
			if($this->db->affected_rows() > 0) { 
                $this->session->set_flashdata('msg','<p style="color:green">Pengiriman Barang Berhasil!</p>');
            } else {
                $this->session->set_flashdata('msg','<p style="color:red">Pengiriman Barang Gagal!</p>');
            }
            redirect('pengiriman');
        }

		$this->load->view('pengiriman/pengiriman_form');
	}

	public function search()
	{
		$data['keyword'] = $this->input->post('keyword');

        $this->load->library('pagination');

        $config['base_url'] = site_url('pengiriman/index');

		$this->db->like('id_pengiriman', $data['keyword']);
		$this->db->or_like('id_permintaan_barang',$data['keyword']);
		$this->db->or_like('stok_terkirim',$data['keyword']);
		$this->db->or_like('satuan_stok',$data['keyword']);
		$this->db->from('pengiriman');

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
			$data['pengiriman'] = $this->Pengiriman_model->read($limit,$start,$data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
			$data['pengiriman'] = $this->Pengiriman_model->read($limit,$start,$data['keyword']);
		}
		
		$this->load->view('pengiriman/pengiriman_list',$data);
	}
}


