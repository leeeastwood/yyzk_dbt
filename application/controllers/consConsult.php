<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class ConsConsult extends CI_Controller {

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
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['id'] = $session_data['id'];
  }
  else
  {
//     //If no session, redirect to login page
     redirect('login', 'refresh');
  }

    try{
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
            $crud->set_language("chinese");
			$crud->set_table('dbt_consultation');
            $crud->where('ConsID',$data['id']);
            $crud->columns('cStatus','cSubmitTime','eName','eApplyLoanCount','eContractCellphone');
            $crud->display_as('eName','企业')
                 ->display_as('cStatus','状态')
                 ->display_as('cTimestamp','创建时间')
				 ->display_as('eOwner','法人')
				 ->display_as('eContractPerson','联系人')
                 ->display_as('eNature','企业性质')
                 ->display_as('eLocation','所属区域')
				 ->display_as('eRegCapital','注册资本（万）')
				 ->display_as('eRegAddr','注册地址')
                 ->display_as('eOfficeAddr','办公地址')
				 ->display_as('eContractPhone','联系电话')
                 ->display_as('eContractCellphone','联系手机')
                 ->display_as('eLastYearIncome','上年度营业收入（万）')
                 ->display_as('eEmployeeCount','员工数目（人）')
				 ->display_as('eLoanStatus','公司贷款情况')
				 ->display_as('eLoanCount','已贷款金额（万）')
                 ->display_as('eApplyLoanCount','拟贷金额（万）')
				 ->display_as('eApplyLoanLength','本次贷款期限（年）')
                 ->display_as('eApplyLoanUsage','本次贷款用途')
                 ->display_as('cSubmitTime','提交时间')
                 ->display_as('cReplyTime','回复时间')
                 ->display_as('cAssignto','交办部门')
				 ->display_as('cReplyContent','答复内容');
                  
           // $crud->add_action('提交', '', 'homeConsult/action_submit','ui-icon-image',array($this,'_callback_addaction_submit')); 
            //$crud->add_action('撤回', '', 'homeConsult/action_cancel','ui-icon-image',array($this,'_callback_addaction_cancel'));          
            $crud->unset_fields('cTimestamp','ConsID','cReplyTime','cSubmitTime');
            $crud->unset_add();
          //  $crud->callback_column('list_actions',array($this,'_callback_actions'));
            $crud->callback_canedit(array($this,'_callback_caneditControl'));
     //    
           // $crud->unset_add_fields('cStatus');
           
            $crud->change_field_type('UserID', 'hidden', $data['id']);
           // $crud->unset_add_fields('cSubmitTime');
           // $crud->unset_add_fields('cReplyTime');
           // $crud->unset_add_fields('cAssignto');
            //$crud->set_table('wp_terms');
			//$crud->set_subject('Office');
//			$crud->required_fields('city');
//			$crud->columns('city','country','phone','addressLine1','postalCode');
			
			$output = $crud->render();
	        $this->_consulting_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
 }


function _callback_addaction_submit($prkey, $row)
{
    $result = $this->consultation->checkStatus($prkey);
    if($result)
    {
      
      foreach($result as $row)
      {
        $ct = $row->cStatus;
      }
      switch($ct){
        
        case '办理中': 
            return "op/unset/yes";
        case '尚未提交':
            return base_url('index.php/homeConsult/action_submit')."/".$prkey;
        case '待补充':
            return base_url('index.php/homeConsult/action_submit')."/".$prkey;
        
        default:
            break;
      }
    }
    else
    {
      return “action_submit”;
    } 
}

function _callback_addaction_cancel($prkey, $row)
{
    $result = $this->consultation->checkStatus($prkey);
    if($result)
    {
      
      foreach($result as $row)
      {
        $ct = $row->cStatus;
      }
      switch($ct){
        
        case '办理中': 
            return base_url('index.php/homeConsult/action_cancel')."/".$prkey;
        case '尚未提交':
            return "op/unset/yes";
        case '待补充':
            return base_url('index.php/homeConsult/action_cancel')."/".$prkey;
        
        default:
            break;
      }
    }
    else
    {
      return “action_submit”;
    } 
}

function _callback_actions($value, $row)
{
  //return "<a href='".site_url('admin/sub_webpages/'.$row->id)."'>$value</a>"
    return "actions here changed";
}

function _callback_caneditControl($prkey)
{
  //return "<a href='".site_url('admin/sub_webpages/'.$row->id)."'>$value</a>"
    $result = $this->consultation->checkStatus($prkey);
    if($result)
    {
      
      foreach($result as $row)
      {
        $ct = $row->cStatus;
      }
      if($ct === '尚未提交') return false;
      if($ct === '待补充') return true;
      if($ct === '办理中') return true;
      if($ct === '已办结') return true;
    }
    else
    {
      return true;
    }
}

function _consulting_output($output = null)
{          
      
        $outputArray = get_object_vars($output); 
       // print_r($outputArray);
       $files = array(
                   'css_files'  => $outputArray['css_files'],
                   'js_files'   => $outputArray['js_files'],
               );
        // var_dump($files);
        $this->load->view('cons_headleft',$files);	
       $this->load->view('cons_consult_view',$output);	
        $this->load->view('home_footer');	
}

 function consulting()
 {
	
		//$output = $this->grocery_crud->render();
//		$this->_example_output($output);
 
 }
 
 function action_submit()
 {
	$prkey = $this->uri->segment(3, 0);
    $result = $this->consultation->submit($prkey);
    if($result)
    {
         $data['output'] = '提交成功，请等待咨询办理结果，咨询表已不能继续修改';
         $this->load->view('consultationSubmit_view',$data);	
    }
    else
    {
      return false;
    }
 
 }
 
  function action_cancel()
 {
	$prkey = $this->uri->segment(3, 0);
    $result = $this->consultation->cancel($prkey);
    if($result)
    {
         $data['output'] = '撤回成功，可以进行修改，重新提交';
         $this->load->view('consultationSubmit_view',$data);	
    }
    else
    {
      return false;
    }
 
 }
 


}

?>
