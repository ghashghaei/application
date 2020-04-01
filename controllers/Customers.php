<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
   public function __construct()
   {
       parent::__construct();
       $this->load->model('Customer_model');
   }

   public function index(){
       $delete_id = $this->uri->segment(3);
       if($delete_id!=''){
           $res=$this->Customer_model->delete_data(array('id'=>$delete_id));
       }
       $data=array();
       $content='';
       $data['title']='Home Page';
       $data['message']='';


       if(isset($_POST['save'])){

           $this->form_validation->set_rules('tel','tel','required|trim|xss_clean');
           $this->form_validation->set_rules('name','name','required|trim|xss_clean');
           $this->form_validation->set_rules('family','family','required|trim|xss_clean');
           if( $this->form_validation->run()==TRUE){

               $res = $this->Customer_model->save(array(
                   'tel_number' => $this->input->post('tel') ,
                   'name' => $this->input->post('name') ,
                   'family' => $this->input->post('family')
               ));

               if($res){
                   $data['message']='saved successfully!';
               }
               else{
                   $data['message']='failed!';
               }
           }else{
               $data['message']='please complete form !';
           }



       }


       $my_data=$this->Customer_model->get_data();
       foreach ($my_data as $item){
           $id=$item['id'];
           $tel_number=$item['tel_number'];
           $name=$item['name'];
           $family=$item['family'];
           $edit=base_url('index.php/Customers/Edit/'.$id);
           $delete=base_url('index/'.$id);
           $content .="
            <tr align='center'>
                <td>$id</td>
                <td>$tel_number</td>
                <td>$name $family</td>
                <td><a href='$edit'>Edit</a><a href='$delete'>|| Delete</a></td>
            </tr>
           ";
           $data['content']=$content;
       }
       $this->parser->parse('header.php',$data);
       $this->parser->parse('customers_view.php',$data);
       $this->parser->parse('footer.php',$data);
   }

   public function Edit(){
    $id = $this->uri->segment(3);
    $data=array();
    $data['title']='Edit';
    $data['message']='';
       if(isset($_POST['update'])){
           $update=array(
               'id' => $this->input->post('id'),
               'tel_number' => $this->input->post('tel') ,
               'name' => $this->input->post('name') ,
               'family' => $this->input->post('family')
           );
           $res=$this->Customer_model->update_data($update);
           if($res){
            $data['message']='okay';
           }else{
            $data['message']='nokay !';
           }
       }

    $user_data=$this->Customer_model->get_user_data(array('id'=>$id));
       $data['id']=$user_data->id;
       $data['tel']=$user_data->tel_number;
       $data['name']=$user_data->name;
       $data['family']=$user_data->family;



       $this->parser->parse('header.php',$data);
       $this->parser->parse('Edit_view.php',$data);
       $this->parser->parse('footer.php',$data);
   }
}
