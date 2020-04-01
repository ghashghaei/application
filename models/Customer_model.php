<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model
{
     public function get_data(){
      $q=$this->db->get('adsl_users')->result();
      $data=array();
      foreach ($q as $item){
          $data[]=array(
              'id'=>$item->id,
              'tel_number'=>$item->tel_number,
              'password'=>$item->password,
              'name'=>$item->name,
              'family'=>$item->family,
              'active'=>$item->active,
          );
      }
         return $data;
	 }

    public function save($data){
         $ins=array(
             'tel_number' => $data['tel_number'],
             'name' => $data['name'],
             'family' => $data['family'],
         );

       $q=$this->db->insert('adsl_users',$ins);
       return $q;
    }
    public function get_user_data($data){
     $id=$data['id'];
     $q=$this->db->get_where('adsl_users',array('id'=>$id))->result()[0];
     return $q;
    }
    public function update_data($data){
         $id=$data['id'];
         $update=array(
             'tel_number' => $data['tel_number'],
             'name' => $data['name'],
             'family' => $data['family'],
         );
         $this->db->where('id',$id);
         $res=$this->db->update('adsl_users',$update);
         return $res;
    }
    public function delete_data($data){
     $id=$data['id'];
     $res=$this->db->delete('adsl_users',array('id'=>$id));
     return $res;
    }
}
