<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

	public function index()
	{
		$this->load->helper(array('form', 'url'));
        $this->load->view('login_view');
	}
}