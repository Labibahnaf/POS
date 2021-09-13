<?php
class Fungsi {
    protected $ci;
    public function __construct(Type $var = null) {
        $this->ci =& get_instance();

    }
    public function user_login(Type $var = null)
    {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }
}