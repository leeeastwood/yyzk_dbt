<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AdminLogin extends CI_Controller {

	public function index()
	{
		$this->load->helper(array('form', 'url'));
        $this->load->view('adminlogin_view');
	}
}