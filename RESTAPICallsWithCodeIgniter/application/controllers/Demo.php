<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'/libraries/REST_Controller.php');

class Demo extends REST_Controller
{
    //constructor
    public function __construct() {
       parent::__construct();
       $this->load->model('User_model');
    }    
    
    /**
     * show data with this method
     * @return Response
     */
    public function user_get(){
        $userData = $this->User_model->read();
        $this->response($userData); 
    }

    /**
     * show data with this method
     * @return Response
     */
    public function user_put(){
        $id = $this->uri->segment(3);
        $data = array('name' => $this->input->get('name'),
           'password' => $this->input->get('password'),
           'type' => $this->input->get('type')
           );
        $userData = $this->User_model->update($id,$data);
        $this->response($userData);
    
    }

    /**
     * show data with this method
     * @return Response
     */
    public function user_post(){
        $data = array('name' => $this->input->post('name'),
           'password' => $this->input->post('password'),
           'type' => $this->input->post('type')
           );
        $userData = $this->User_model->insert($data);
        $this->response($userData); 
    }

    /**
     * show data with this method
     * @return Response
     */
    public function user_delete(){
        $id = $this->uri->segment(3);
        $userData = $this->User_model->delete($id);
        $this->response($userData); 
    }
}