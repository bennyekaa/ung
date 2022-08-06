<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->model('admin_model');
		date_default_timezone_set("Asia/Jakarta");
		error_reporting(0);
		// if ($this->session->userdata('level') != 'admin' ){
		// 	redirect('log');
		// }
	}
	public function index()
	{
		$data['page'] = 'dashboard';
		$data['berkas'] = $this->admin_model->get_data('berkas')->result();
		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/beranda');
		$this->load->view('layout/foot');
	}
	//gambar
	public function gambar()
	{
		$data['page'] = 'master';
		$data['berkas'] = $this->admin_model->get_data('berkas')->result();
		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/berkas', $data);
		$this->load->view('layout/foot');
	}

	public function upload_berkas()
	{
		$dariDB = $this->admin_model->cekkode('berkas', 'kode_berkas');
		$nourut = substr($dariDB, 3, 4); //GMB0001
		$kodeskrg = $nourut + 1;
		$data = array('kode_berkas' => $kodeskrg);
		// var_dump($data['kode_berkas']);die();
		$data['page'] = 'master';
		// $data['isian'] = $this->Admin_model->check_isi_press_test($id)->result();
		// var_dump($data['isian']);die();
		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/upload_berkas', $data);
		$this->load->view('layout/foot');
	}

	public function aksi_upload()
	{
		$config['upload_path']          = FCPATH . 'dist/upload/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		// $config['max_size']             = 10000;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('berkas')) {
			// echo "kosong";die();
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('GAGAL', $error);
			redirect('admin/gambar');
		} else {
			// echo "ada";die();
			$image_data = $this->upload->data();
			$imgdata = file_get_contents($image_data['full_path']);
			// var_dump($_FILES['berkas']['tmp_name']);
			// die();
			// $imgdata = file_get_contents($_FILES['berkas']['tmp_name']);
			$file_encode = base64_encode($imgdata);
			$keterangan = $this->input->post('keterangan');
			$kodeberkas = $this->input->post('kode_berkas');
			$tipeberkas = $this->upload->data('file_type');
			$ukuranberkas = $this->upload->data('file_size');
			$berkas = $file_encode;
			$namaberkas =  $this->upload->data('file_name');
			$data = array(
				'kode_berkas'	=> $kodeberkas,
				'nama_berkas' 	=> $namaberkas,
				'berkas' 		=> $berkas,
				'tipe_berkas' 	=> $tipeberkas,
				'ukuran_berkas' => $ukuranberkas,
				'keterangan' 	=> $keterangan
			);
			$this->db->insert('berkas', $data);
			unlink($image_data['full_path']);

			redirect('admin/gambar');
		}
		// var_dump($this->input->post());
		// exit;
	}

	public function next_berkas($id)
	{
		$dariDB = $this->admin_model->cekkode('detail_berkas', 'kode_detail_berkas');
		$nourut = substr($dariDB, 2, 4); //DT0001
		$kodeskrg = $nourut + 1;
		$kodeberkas = $id;
		$data = array(
			'kode_detail_berkas' => $kodeskrg,
			'kode_berkas' => $kodeberkas,
			'page' => 'master'
		);
		// var_dump($data['kode_berkas']);die();
		// $data['page'] = 'master';
		// $data['isian'] = $this->Admin_model->check_isi_press_test($id)->result();
		// var_dump($data['isian']);die();
		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/upload_berkas_next', $data);
		$this->load->view('layout/foot');
	}

	// public function tampil_berkas($id)
	// {

	// 	$data['page'] = 'master';
	// 	$data['berkas'] = $this->admin_model->load_berkas($id)->result();
	// 	// var_dump($data['isian']);die();
	// 	$this->load->view('v_admin/head');
	// 	$this->load->view('v_admin/nav', $data);
	// 	$this->load->view('v_admin/tampil_berkas', $data);
	// 	$this->load->view('v_admin/foot');
	// }

	// 

}
