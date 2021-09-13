<?php defined('BASEPATH') OR exit('No direct script access allowed');

class item extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model(['item_m','category_m','unit_m','gudang_m']);
	}

	function get_ajax() {
        $list = $this->item_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->barcode.'<br><a href="'.site_url('item/barcodeqr/'.$item->item_id).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $item->nama;
            $row[] = $item->category_nama;
            $row[] = $item->unit_nama;
            $row[] = $item->gudang_name;
            // $row[] = indo_currency($item->price);
            $row[] = "Rp " . number_format($item->price,2,",",".") ;
            $row[] = $item->stock;
            $row[] = $item->gambar != null ? '<img src="'.base_url('uploads/products/'.$item->gambar).'" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="'.site_url('item/edit/'.$item->item_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                    <a href="'.site_url('item/del/'.$item->item_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->item_m->count_all(),
                    "recordsFiltered" => $this->item_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }



	public function index()
	{
		$data['row'] = $this->item_m->get();
		$this->template->load('template','product/item/item_data', $data);
	}

	public function add()
	{
		$item = new stdClass();
		$item -> item_id = null;
        $item -> barcode = null;
		$item -> nama = null;
        $item -> price = null;

        $item -> category_id = null;
        $item -> gudang_id = null;

        $query_category = $this->category_m->get();
        $query_unit = $this->unit_m->get();
        $query_gudang = $this->gudang_m->get();
        $unit[null] = '- pilih -';
        foreach($query_unit->result() as $unt){
            $unit[$unt->unit_id] = $unt -> nama;
        }

		$data = array(
			'page' => 'add',
			'row' => $item,
            'category' => $query_category,
            'unit' => $unit, 'selectedunit' => null,
            'gudang' => $query_gudang,
		);
		$this->template->load('template','product/item/item_form', $data);
	}

	public function edit($id)
	{
		$query = $this->item_m->get($id);
		if ($query->num_rows() > 0) {
			$item = $query->row();
			$query_category = $this->category_m->get();
			$query_unit = $this->unit_m->get();
			$query_gudang = $this->gudang_m->get();
			$unit[null] = '- pilih -';
			foreach($query_unit->result() as $unt){
            $unit[$unt->unit_id] = $unt -> nama;
        }

		$data = array(
			'page' => 'edit',
			'row' => $item,
            'category' => $query_category,
            'unit' => $unit, 'selectedunit' => $item->unit_id,
			'gudang' => $query_gudang,
		);
		$this->template->load('template','product/item/item_form', $data);
		}else {
			echo "<script> alert('Data tidak ditemukan');";
			echo "window.location='".site_url('item')."'; </script>";
		}
	}

	public function process(Type $var = null)
	{
		
		$config['upload_path']  	= './uploads/products/';
		$config['allowed_types']  	= 'gif|jpg|png|jpeg|JPG|JPEG|PNG';
		$config['max_size']  		= 2048;
		$config['file_name']  		= 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post=$this->input->post(null,TRUE);
		if (isset($_POST['add'])) {
            if ($this->item_m->check_barcode($post['barcode'])->num_rows() > 0) {
                echo "<script> alert('Barcode sudah dipakai terpakai!'); </script>";
            }else {

				if (@$_FILES['gambar']['name'] != null) {
					if ( $this->upload->do_upload('gambar')) {
						$post['gambar'] = $this->upload->data('file_name');
						$this->item_m->add($post);

						if($this->db->affected_rows() > 0 ){
							echo "<script> alert('Data Berhasil disimpan!'); </script>";
						}
						echo "<script> window.location='".site_url('item')."'; </script>";
					}else {
						$error = $this->upload->display_errors();
						echo "<script> alert('Ukuran gambar terlalu besar'); </script>";
						echo "<script> window.location='".site_url('item/add')."'; </script>";
					}
				}else {
					$post['gambar'] = null;
					$this->item_m->add($post);
					if($this->db->affected_rows() > 0 ){
						echo "<script> alert('Data Berhasil disimpan!'); </script>";
					}
					echo "<script> window.location='".site_url('item')."'; </script>";
				}
            }
            echo "<script> window.location='".site_url('item/add')."'; </script>";
		}else if (isset($_POST['edit'])) {
            if ($this->item_m->check_barcode($post['barcode'],$post['id'])->num_rows() > 0) {
                echo "<script> alert('Barcode sudah dipakai terpakaiiii!'); </script>";
				echo "<script> window.location='".site_url('item/edit/'. $post['id'])."'; </script>";
            }else{
				if (@$_FILES['gambar']['name'] != null) {
					if ( $this->upload->do_upload('gambar')) {
						
						$item = $this->item_m->get($post['id']) -> row();
						if ($item->gambar != null) {
							$target_file = './uploads/products/'.$item->gambar;
							unlink($target_file);
						}

						$post['gambar'] = $this->upload->data('file_name');
						$this->item_m->edit($post);

						if($this->db->affected_rows() > 0 ){
							echo "<script> alert('Data Berhasil diedit!'); </script>";
						}
						echo "<script> window.location='".site_url('item')."'; </script>";
					}else {
						$error = $this->upload->display_errors();
						echo "<script> alert('Ukuran gambar terlalu besar'); </script>";
						echo "<script> window.location='".site_url('item/edit/'. $post['id'])."'; </script>";
					}
				}else {
					$post['gambar'] = null;
					$this->item_m->edit($post);
					if($this->db->affected_rows() > 0 ){
						echo "<script> alert('Data Berhasil diedit!'); </script>";
					}
					echo "<script> window.location='".site_url('item')."'; </script>";
				}
            }
		}
	}

	public function del($id)
	{
		$item = $this->item_m->get($id) -> row();
		if ($item->gambar != null) {
			$target_file = './uploads/products/'.$item->gambar;
			unlink($target_file);
		}
		$this->item_m->del($id);
		if($this->db->affected_rows() > 0 ){
			echo "<script> alert('Data Berhasil dihapus!'); </script>";
		}
		echo "<script> window.location='".site_url('item')."'; </script>";
	}

	function barcodeqr($id)
	{
		$data['row'] = $this->item_m->get($id)->row();
		$this->template->load('template','product/item/barcodeqr', $data);
	}
}
