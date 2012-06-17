<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class ConsBasic extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('grocery_CRUD');
   $this->load->model('consultation','',TRUE);
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
  {
      //$outputArray = get_object_vars($output); 
       // print_r($outputArray);
       $files = array(
                   'css_files'  => null,
                   'js_files'   => null,
               );
        // var_dump($files);
        $this->load->view('cons_headleft',$files);	
        $this->load->view('cons_basic_view');	
        $this->load->view('home_footer');	
     
  }
  else
  {
//     //If no session, redirect to login page
     redirect('login', 'refresh');
  }

    
 }


 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('login', 'refresh');
 }



}
?>
