<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AdminVerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('admin','',TRUE);
 }

 function index()
 {
     $this->lang->load('form_validation','chinese');
     $this->load->library('form_validation');
     $this->form_validation->set_rules('username', '用户名', 'required');
     $this->form_validation->set_rules('password', '密码', 'trim|required|xss_clean|callback_check_database');
     if($this->form_validation->run() == FALSE)
     {
        $this->load->view('adminlogin_view');
     }
    else
    {    
        //Go to private area
        
        if($this->session->userdata('logged_in'))
        {
          $session_data = $this->session->userdata('logged_in');
          $data['username'] = $session_data['username'];
          $data['role'] = $session_data['role'];
        
          switch($data['role'])
          {
            
            case 'consultant':
                redirect('consBasic', 'refresh');
                break;
            case 'admin':    
                break;
            default:
                redirect('homeBasic', 'refresh');
          }
        }
        else
        {
           redirect('adminLogin', 'refresh');
        }
    }
}

 function check_database($password)
  {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('username');
    
    //query the database
    $result = $this->admin->login($username, $password);
    
    if($result)
    {
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
          'id' => $row->UserID,
          'username' => $row->UserEmail,
          'role'=>$row->uRole
        );
        $this->session->set_userdata('logged_in', $sess_array);
      }
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', '不正确的用户名或密码');
      return false;
    }
  }





}