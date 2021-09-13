<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}

	public function proccess(){
		// echo "proses";
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			$this->load->model('user_m');
			$query = $this->user_m->login($post);

			if($query->num_rows() > 0){
				// echo "login berhasil";
				$row = $query->row();

				// echo $row->username;
				$params = array(
					'userid' => $row->user_id,
					'level' => $row->level
				);
				$this->session->set_userdata($params);
				echo "<script>
					alert('Login berhasil');
					window.location='".site_url('dashboard')."'
				</script>";
			}else{
				echo "<script>
					alert('Login gagal');
					window.location='".site_url('auth/login')."'
				</script>";
			}
		}
	}
	
	public function logout(Type $var = null)
	{
		$params = array('userid','level');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}
