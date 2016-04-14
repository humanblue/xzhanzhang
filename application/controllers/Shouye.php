<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shouye extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->model('Model_Member','member');
//        $query = $this->member->insert_member(array('nickname' => '李杰', 'mobile' => 13800138000, 'password' => 123,
//                'salt' => '123', 'sex' => 1));
        $data['info'] = $this->member->get_member_byids(array(1,2,3));
		$this->load->view('member/login', $data);
	}
}
