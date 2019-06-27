<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
        $this->load->model('BackEnd/Register_model');
    }

    function index()
    {
        $this->load->view('FrontEnd/register');
    }

    function validation()
    {
        $this->form_validation->set_rules('user_name', 'Name', 'required|trim');
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('user_password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[user_password]');
        if($this->form_validation->run())
        {
            $verification_key = md5(rand());
            $encrypted_password = base64_encode($this->input->post('user_password'));
            $data = array('name'  => $this->input->post('user_name'),
                          'email'  => $this->input->post('user_email'),
                          'password' => $encrypted_password,
                          'verification_key' => $verification_key);

            $id = $this->Register_model->insert($data);
            if($id > 0)
            {
                $subject = "Please verify email for login";
                $message = "Hi ".$this->input->post('user_name')." This is email verification mail from Codeigniter Login Register system. For complete registration process and login into system. First you want to verify you email by click this href='".base_url()."register/verify_email/".$verification_key."' link.Once you click this link your email will be verified and you can login into system.Thanks.";
                $config['protocol']     = 'smtp';
                $config['smtp_host']    = 'ssl://smtp.gmail.com';
                $config['smtp_port']    = '465';
                $config['smtp_timeout'] = '7';
                $config['smtp_user']    = '*****@gmail.com';
                $config['smtp_pass']    = '*****';
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
                    $this->session->set_flashdata('message','Check in your email for email verification mail');
                    redirect('login');
                }
                }
            }
        else
        {
            $this->index();
        }
    }

    function verify_email()
    {
        if($this->uri->segment(3))
    {
        $verification_key = $this->uri->segment(3);
        if($this->Register_model->verify_email($verification_key))
        {
            $data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="'.base_url().'login">here</a></h1>';
        }
        else
        {
            $data['message'] = '<h1 align="center">Invalid Link</h1>';
        }
        $this->load->view('FrontEnd/email_verification', $data);
    }
    }  

}

?>
