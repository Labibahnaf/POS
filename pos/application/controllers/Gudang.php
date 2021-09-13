<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model('gudang_m');
	}

	public function index()
	{
		$data['row'] = $this->gudang_m->get();
		$this->template->load('template','gudang/gudang_data', $data);
	}

	public function add()
	{
		$gudang = new stdClass();
		$gudang -> gudang_id = null;
		$gudang -> nama = null;
		$data = array(
			'page' => 'add',
			'row' => $gudang
		);
		$this->template->load('template','gudang/gudang_form', $data);
	}

	public function edit($id)
	{
		$query = $this->gudang_m->get($id);
		if ($query->num_rows() > 0) {
			$gudang = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $gudang
			);
			$this->template->load('template','gudang/gudang_form', $data);
		}else {
			echo "<script> alert('Data tidak ditemukan');";
			echo "window.location='".site_url('gudang')."'; </script>";
		}
	}

	public function process(Type $var = null)
	{
		$post=$this->input->post(null,TRUE);
		if (isset($_POST['add'])) {
			$this->gudang_m->add($post);
		}else if (isset($_POST['edit'])) {
			$this->gudang_m->edit($post);
		}
		if($this->db->affected_rows() > 0 ){
			echo "<script> alert('Data Berhasil disimpan!'); </script>";
		}
		echo "<script> window.location='".site_url('gudang')."'; </script>";
	}

	public function del($id)
	{
		$this->gudang_m->del($id);
		$error = $this->db->error();
		if ($error['code'] != 0) {
			echo "<script> alert('Data tidak dapat dihapus! (data sudah ber relasi)'); </script>";
		}else if($this->db->affected_rows() > 0 ){
			echo "<script> alert('Data Berhasil dihapus!'); </script>";
		}
		echo "<script> window.location='".site_url('gudang')."'; </script>";
	}
}
