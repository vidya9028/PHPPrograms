<?php
class Hello extends CI_Controller{
    public function index(){
        echo "First Program With CodeIgniter!";
    }
    public function about(){
        $this->load->view("About");
    }
}
?>