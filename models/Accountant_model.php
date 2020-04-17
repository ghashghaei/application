<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountant_model extends CI_Model
{
     public function get_data(){
      $q=$this->db->get('my_users')->result();
      $data=array();
      foreach ($q as $item){
          $data[]=array(
              'id'=>$item->id,
              'username'=>$item->username,
              'password'=>$item->password,
              'name'=>$item->name,
              'family'=>$item->family,
              'tell'=>$item->tell,
          );
      }
         return $data;
	 }

    public function save($data){
         $res=array(
             'tell' => $data['tell'],
             'name' => $data['name'],
             'family' => $data['family'],
             'username'=>$data['username'],
             'password'=>$data['password'],
         );

       $q=$this->db->insert('my_users',$res);
       return $q;
    }
    public function check_login($data){
      
        $username=$data['username'];
        $password=$data['password'];
        $q=$this->db->get_where('my_users',array('username'=>$username,'password'=>$password));

        $tedad=$q->num_rows();
        if($tedad==1){
          $login_result=$q->result()[0]->id;
        }else{
          $login_result=false;
        }
           return $login_result;

   }
    public function get_user_info(){
        $id=$this->session->userdata['test_session']['id'];
        $q=$this->db->get_where('my_users',array('id'=>$id))->result()[0];
        return $q;
   }
   public function save_payment($data){
    $res=array(
        'money_val' => $data['money_val'],
        'money_date' => $data['money_date'],
        'user_id' => $data['user_id'],
        
      );

     $q=$this->db->insert('money_log',$res);
     return $q;
    }
    public function get_data_accountant(){
        $id=$this->session->userdata['test_session']['id'];
        $q=$this->db->get_where('money_log',array('user_id'=>$id))->result();
        return $q;
 }
}
