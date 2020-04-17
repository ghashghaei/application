<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountant extends CI_Controller {
   public function __construct()
   {
       parent::__construct();
       $this->load->model('Accountant_model');
       $this->load->model('CommonFunction');
   }

   public function get_data(){
       $this->CommonFunction->check_Ajax();
       $this->form_validation->set_rules('username','username','required|trim|xss_clean');
       $this->form_validation->set_rules('password','password','required|trim|xss_clean');
       $this->form_validation->set_rules('name','name','required|trim|xss_clean');
       $this->form_validation->set_rules('family','family','required|trim|xss_clean');
       $this->form_validation->set_rules('tell','tell','required|trim|xss_clean');
       if( $this->form_validation->run()==TRUE){

           $res = $this->Accountant_model->save(array(
               'username' => $this->input->post('username') ,
               'password' => $this->input->post('password') ,
               'name' => $this->input->post('name') ,
               'family' => $this->input->post('family'),
               'tell' => $this->input->post('tell') ,
           ));

           if($res){
               $res_ajx=array('ResId'=>1,'Msg'=>'function is successfull');
           }
           else{
               $res_ajx=array('ResId'=>0,'Msg'=>'function is not successfull');
           }
       }
        else{
           $res_ajx=array('ResId'=>0,'Msg'=>'compelet the form');
       }
    

       echo json_encode ($res_ajx);
   }

   public function index(){
       $data=array();
       $data['title']='HomePage';
       $this->parser->parse('header.php',$data);
       $this->parser->parse('Login_view.php',$data);
       $this->parser->parse('footer.php',$data);  
   }

  public function register(){
    $data=array();
    $data['title']='Register';
    $this->parser->parse('header.php',$data);
    $this->parser->parse('Register_view.php',$data);
    $this->parser->parse('footer.php',$data); 
  }
  public function check_register(){
      $this->CommonFunction->check_Ajax();
    $this->session->set_userdata('test_session',array());
    $res_ajx=array('ResId'=>1);
    echo json_encode ($res_ajx);
   }
   public function check_login(){
       $this->CommonFunction->check_Ajax();
    $login_detail=array(
       'username'=>$this->input->post('username'),
        'password'=>$this->input->post('password'),
    );
     $result=$this->Accountant_model->check_login($login_detail);

    if($result){
        $res_ajx=array('ResId'=>1);
        $this->session->set_userdata('test_session',array('id'=>$result));
    }else{
     $res_ajx=array('ResId'=>0);
    }
    echo json_encode($res_ajx);
    


 }
 public function panel(){
     $this->CommonFunction->check_Ajax();
     if(isset($this->session->userdata['test_session'])){
         $id=$this->session->userdata['test_session']['id'];
         $userinfo=$this->Accountant_model->get_user_info();
         $content1=$userinfo->name;
         $content2=$userinfo->family;
         $title='Welcome  ';
         $content=$title.$content1.' '.$content2.'!';
         $res_ajx=array('ResId'=>1,'content'=>$content);
         echo json_encode($res_ajx);
        
     }else{
        redirect(base_url(),'refresh');
     }
 }
 public function panel_page(){
     $data=array();
     $data['title']='';
     $this->parser->parse('header.php',$data);
     $this->parser->parse('Panel_view.php',$data);
     $this->parser->parse('footer.php',$data);
 }
 public function login(){
       
}
public function get_payment_data(){
    $this->CommonFunction->check_Ajax();
    $id=$this->session->userdata['test_session']['id'];
    $this->form_validation->set_rules('money_val','money_val','required|trim|xss_clean');
    $this->form_validation->set_rules('money_date','money_date','required|trim|xss_clean');
    
    if( $this->form_validation->run()==TRUE){

        $res = $this->Accountant_model->save_payment(array(
            'money_val' => $this->input->post('money_val') ,
            'money_date' => $this->input->post('money_date') ,
            'user_id'=>$id,
        ));

        if($res){
            $res_ajx=array('ResId'=>1,'Msg'=>'function is successfull');
        }
        else{
            $res_ajx=array('ResId'=>0,'Msg'=>'function is not successfull');
        }
    }
     else{
        $res_ajx=array('ResId'=>0,'Msg'=>'compelet the form');
    }
    echo json_encode ($res_ajx);
}
   public function payment(){
    $data=array();
    $data['title']='';
    $this->parser->parse('header.php',$data);
    $this->parser->parse('Payment_view.php',$data);
    $this->parser->parse('footer.php',$data);
   }
  public function payment_page(){
        $this->CommonFunction->check_Ajax();
        $id=$this->session->userdata['test_session']['id'];
        $res_ajx=array('ResId'=>1);
        echo json_encode ($res_ajx);
   }
   public function get_data_accountant(){
    $this->CommonFunction->check_Ajax();
    $id=$this->session->userdata['test_session']['id'];
    $my_data=$this->Accountant_model->get_data_accountant();
    $content='';
    $i=0;
        foreach ($my_data as $item) {
            $user_id = $item->user_id;
            $money_val = $item->money_val;
            $money_date = $item->money_date;
            $i++;
            $content .= "
         <tr align='center'>
             <td>$i</td>
             <td>$money_val</td>
             <td> $money_date</td>
             <td>
             
         </tr>
        ";
    }
    $res_ajx=array('ResId'=>1,'content'=>$content);
    echo json_encode($res_ajx);
  }
  public function report(){
    $data=array();
    $data['title']='';
    $this->parser->parse('header.php',$data);
    $this->parser->parse('Accountant_report_view.php',$data);
    $this->parser->parse('footer.php',$data);
   }
   public function report_accountant(){
       $this->CommonFunction->check_Ajax();
       $id=$this->session->userdata['test_session']['id'];
       $res_ajx=array('ResId'=>1);
       echo json_encode ($res_ajx);
   }
    public function sexit(){
        session_destroy();
        redirect(base_url(),'refresh');
    }
    public function exit_page(){
        $this->CommonFunction->check_Ajax();
        $res_ajx=array('ResId'=>1);
        $data=array();
        $data['title']='';
        $this->parser->parse('header.php',$data);
        $this->parser->parse('Exit_view.php',$data);
        $this->parser->parse('footer.php',$data);
    }
    public function exit_panel(){
        $this->CommonFunction->check_Ajax();
        $id=$this->session->userdata['test_session']['id'];
        $res_ajx=array('ResId'=>1);
        echo json_encode ($res_ajx);
    }
}
