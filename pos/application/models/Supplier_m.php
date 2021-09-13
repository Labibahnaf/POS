<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {
    public function get($id = null)
    {
        $this->db->from('supplier');
        if($id != null){
            $this->db->where('supplier_id', $id);

        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
	{
		$params = [
			'nama'   => $post['supplier_name'],
			'hp'     => $post['hp'],
			'alamat' => $post['alamat'],
			'des'    => empty($post['des']) ? null : $post['des'],
			
		];
		$this->db->insert('supplier', $params);
	}

    public function edit($post)
	{
		$params = [
			'nama'   => $post['supplier_name'],
			'hp'     => $post['hp'],
			'alamat' => $post['alamat'],
			'des'    => empty($post['des']) ? null : $post['des'],
            'updated' => date('Y-m-d H:i:s')
			
		];
		$this->db->where('supplier_id', $post['id']);
        $this->db->update('supplier',$params);
	}

    public function del($id)
	{
		$this->db->where('supplier_id', $id);
        $this->db->delete('supplier');
	}
}