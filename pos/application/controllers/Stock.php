<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model(['item_m','supplier_m','stock_m','gudang_m']);
	}
    // stock in
    public function stock_in_data(Type $var = null)
    {
        $data['row'] = $this->stock_m->get_stock_in()->result();
        $this->template->load('template','transactions/stock_in/stock_in_data', $data);
      
    }
    
    public function stock_in_add()
    {
        $item = $this->item_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        // $gudang = $this->gudang_m->get()->result();
		$data = ['item' => $item, 'supplier' => $supplier];
        $this->template->load('template','transactions/stock_in/stock_in_form', $data);
    }

    public function stock_in_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_m->update_stock_out($data);
        $this->stock_m->del($stock_id);

        if($this->db->affected_rows() > 0 ){
            echo "<script> alert('Data Stock-in berhasil dihapus!'); </script>";
        }
        echo "<script> window.location='".site_url('stock/in')."'; </script>";
    }

    public function process()
    {
        if (isset($_POST['in_add'])) {
            $post=$this->input->post(null,TRUE);
            $this->stock_m->add_stock_in($post);
            $this->item_m->update_stock_in($post);
            if($this->db->affected_rows() > 0 ){
                echo "<script> alert('Data Stock-In berhasil disimpan!'); </script>";
            }
            echo "<script> window.location='".site_url('stock/in')."'; </script>";
        
        }else if (isset($_POST['out_add'])) {
            $post=$this->input->post(null,TRUE);
            $row_item = $this->item_m->get($this->input->post('item_id'))->row();
            if ($row_item->stock < $this->input->post('qty')) {
                echo "<script> alert('Jumlah melebihi stock yang ada!'); </script>";
                echo "<script> window.location='".site_url('stock/out/add')."'; </script>";
            }else {
                $this->stock_m->add_stock_out($post);
                $this->item_m->update_stock_out($post);
                if($this->db->affected_rows() > 0 ){
                    echo "<script> alert('Data Stock-Out berhasil disimpan!'); </script>";
                }
                echo "<script> window.location='".site_url('stock/out')."'; </script>";
            }
        
        }
        
    }
    

    // STOCK OUT
    public function stock_out_data(Type $var = null)
    {
        $data['row'] = $this->stock_m->get_stock_out()->result();
        $this->template->load('template','transactions/stock_out/stock_out_data', $data);
    }
    public function stock_out_add()
    {
        $item = $this->item_m->get()->result();
		$data = ['item' => $item];
        $this->template->load('template','transactions/stock_out/stock_out_form', $data);
    }
    public function stock_out_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_m->update_stock_in($data);
        $this->stock_m->del($stock_id);

        if($this->db->affected_rows() > 0 ){
            echo "<script> alert('Data Stock-out berhasil dihapus!'); </script>";
        }
        echo "<script> window.location='".site_url('stock/out')."'; </script>";
    }
}