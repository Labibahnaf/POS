<?php defined('BASEPATH') OR exit('No direct script access allowed');

class gudang_m extends CI_Model {
    public function get($id = null)
    {
        $this->db->from('gudang');
        if($id != null){
            $this->db->where('gudang_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
	{
		$params = [
			'nama'   => $post['gudang_name'],
			
		];
		$this->db->insert('gudang', $params);
	}

    public function edit($post)
	{
		$params = [
			'nama'   => $post['gudang_name'],
            'updated' => date('Y-m-d H:i:s')
			
		];
		$this->db->where('gudang_id', $post['id']);
        $this->db->update('gudang',$params);
	}

    public function del($id)
	{
		$this->db->where('gudang_id', $id);
        $this->db->delete('gudang');
	}
}