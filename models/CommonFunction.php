<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommonFunction extends CI_Model
{
    public function check_Ajax(){
        if(!$this->input->is_ajax_request()){
            redirect(base_url(),'refresh');
        }
    }
}
