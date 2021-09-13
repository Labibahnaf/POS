<?php defined('BASEPATH') OR exit('No direct script access allowed');

class customer_m extends CI_Model {
    public function get($id = null)
    {
        $this->db->from('customer');
        if($id != null){
            $this->db->where('customer_id', $id);

        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
	{
		$params = [
			'nama'   => $post['customer_name'],
            'gender' => $post['gender'],
			'hp'     => $post['hp'],
			'alamat' => $post['alamat'],
			
		];
		$this->db->insert('customer', $params);
	}

    public function edit($post)
	{
		$params = [
			'nama'   => $post['customer_name'],
            'gender' => $post['gender'],
			'hp'     => $post['hp'],
			'alamat' => $post['alamat'],
			'updated' => date('Y-m-d H:i:s')
			
		];
		$this->db->where('customer_id', $post['id']);
        $this->db->update('customer',$params);
	}

    public function del($id)
	{
		$this->db->where('customer_id', $id);
        $this->db->delete('customer');
	}
}