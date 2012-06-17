<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Register extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('grocery_CRUD');
 }

 function index()
 {
//   if($this->session->userdata('logged_in'))
//   {
//     $session_data = $this->session->userdata('logged_in');
//     $data['username'] = $session_data['username'];
//     $this->load->view('home_view', $data);
//   }
//   else
//   {
//     //If no session, redirect to login page
//     redirect('login', 'refresh');
//   }
   // $this->lang->load('form_validation','chinese');
    try{
			/* This is only for the autocompletion */
            
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
            $crud->set_language("chinese");
			$crud->set_table('dbt_user');
            $crud->unset_back_to_list();
            $crud->columns('UserID','UserEmail','cName');
            $crud->display_as('UserEmail','邮箱')
                 ->display_as('UserPassword','设置密码')
                  ->display_as('UserPassword2','确认密码')
                 ->display_as('cName','企业名称')
				 ->display_as('cMobilephone','联系手机')
				 ->display_as('UserID','用户编号');
//               ->display_as('eContractCellphone','手机');
//            $crud->add_action('详细', '', 'demo/action_more','ui-icon-plus');   
//            $crud->add_action('提交', '', 'demo/action_more','ui-icon-image');      
            $crud->unset_add_fields('uRole');
            
            
            
            $crud->required_fields('UserEmail','UserPassword','UserPassword2','cName','cMobilephone');
            $crud->change_field_type('UserPassword','password');
            $crud->change_field_type('UserPassword2','password');
            
            $crud->unset_edit();
            $crud->unset_delete();
            
            $crud->set_rules('UserEmail','邮箱','valid_email|required');
            $crud->set_rules('cMobilephone','手机号码','exact_length[11]|required');
            $crud->set_rules('UserPassword','密码','matches[UserPassword2]|required');
            
            $crud->callback_column('list_actions',array($this,'_callback_actions'));
            $this->lang->load('form_validation','chinese');
            
            
     //       $crud->unset_add_fields('cStatus');
           // $crud->unset_add_fields('cSubmitTime');
           // $crud->unset_add_fields('cReplyTime');
           // $crud->unset_add_fields('cAssignto');
            //$crud->set_table('wp_terms');
			//$crud->set_subject('Office');
//			$crud->required_fields('city');
//			$crud->columns('city','country','phone','addressLine1','postalCode');
			$crud->callback_before_insert(array($this,'_callback_register_check'));
			$output = $crud->render();
	        $this->_register_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
 }

function _callback_register_check($postArray)
{
  //$this->form_validation->set_message('check_database', '不正确的用户名或密码');
  return "actions here changed";
}

function _callback_actions($value, $row)
{
  //return "<a href='".site_url('admin/sub_webpages/'.$row->id)."'>$value</a>"
    return "actions here changed";
}


function _register_output($output = null)
{
       
        $this->load->view('register_view',$output);	
}

 function add()
 {
    
   
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>
