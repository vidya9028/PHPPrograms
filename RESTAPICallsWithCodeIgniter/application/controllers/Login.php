<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('id'))
        {
            redirect('private_area');
        }
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->model('BackEnd/Login_model');
        
    }

    function index()
    {
        $this->load->view('FrontEnd/login');
    } 

    function validation()
    {
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'required');
        if($this->form_validation->run())
        {
            $result = $this->Login_model->can_login($this->input->post('user_email'), $this->input->post('user_password'));
            if($result == '')
            {
                redirect('private_area');
            }
            else
            {
                $this->session->set_flashdata('message',$result);
                redirect('login');
            }
        }
        else
        {
            $this->index();
        }
    }

    function forgot_password(){
        
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
        if($this->form_validation->run()){
            $verification_key = md5(rand());
            $data = $this->input->post('user_email');
            $result = $this->Login_model->verify_email($verification_key,$data);
            if($result){
                
                $subject = "Reset Password Link";
                $message = "Hi ".$this->input->post('user_name')." This is Reset password mail from Codeigniter Login Register system.Reset your password by click this href='".base_url()."login/reset_password/".$verification_key."' link.";
                $config['protocol']     = 'smtp';
                $config['smtp_host']    = 'ssl://smtp.gmail.com';
                $config['smtp_port']    = '465';
                $config['smtp_timeout'] = '7';
                $config['smtp_user']    = 'vidyasagar9028@gmail.com';
                $config['smtp_pass']    = 'abhi9028';
                $config['charset']      = 'utf-8';
                $config['newline']      = "\r\n";
                $config['mailtype']     = 'text'; 
                $config['validation']   = TRUE; 
                
                $this->email->initialize($config);
               
                $this->email->from('vidyasagar9028@gmail.com');
                $this->email->to($this->input->post('user_email'));
                $this->email->subject($subject);
                $this->email->message($message);
   
                if($this->email->send())
                {
                    $this->session->set_flashdata('message','A mail has been sent to you to reset the Password.');
                    redirect('login');
                }
            }
            else{
                $this->session->set_flashdata('message','Email Address Does not Exists!');
                redirect('login/forgot_password');
            }
            }
            $this->load->view('FrontEnd/forgot_password');
    }

    function reset_password(){
        if($this->uri->segment(3)){
            $this->session->set_userdata('verification_key',$this->uri->segment(3));
            
            $this->reset($this->session->userdata('verification_key'));
        }else{
            $verificationkey = $this->session->userdata('verification_key');
            $this->reset($verificationkey);
            
        }
    }
    public function reset($verificationkey){
        
        $this->form_validation->set_rules('user_password','New Password','required');
        $this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[user_password]');
        if($this->form_validation->run()){
            $encryptedPassword = base64_encode($this->input->post('user_password'));
            if(($this->Login_model->reset_password($verificationkey,$encryptedPassword)) > 0){
                $this->session->set_flashdata('message','Your password has been changed Successfully!');
                redirect('login');
            }else{
                $this->session->set_flashdata('message','Invalid link...!');
            }
        }
        $this->load->view('FrontEnd/reset_password');
    }
    
}
?>