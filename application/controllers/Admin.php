<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        //cannot place dashboard link in this otherwise admin constructor accessed first will not allow others to be accessed
    }

    public function index()
    {
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }
        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('footer');
    }


    public function login()
    {
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[15]');
        $this->form_validation->set_message('valid_email', 'Please enter a valid email address.');
        $this->form_validation->set_message('min_length', 'Password must be at least 5 characters long.');
        $this->form_validation->set_message('max_length', 'Password cannot exceed 15 characters.');
        //$this->form_validation->set_rules('terms', 'Terms and Conditions', 'required',
    //array('required' => 'You must agree to the Terms and Conditions.'));


    
        if ($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin');
        }
        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
    
            // Check if the provided email exists in the database
            $email_query = $this->db->get_where('users', array('email' => $email));
    
            if ($email_query->num_rows() > 0)
            {
                // Provided email exists, tb check the password
                $user = $email_query->row();
    
                if ($user->password === md5($password))
                {
                    // Successful login, store user data in session
                    $this->session->set_userdata('user_id', $user->id);
                    $this->session->set_userdata('user_email', $user->email);
                    $this->session->set_userdata('username', $user->username);
                    redirect('dashboard');
                }
                else
                {
                    // Invalid password case
                    $this->session->set_flashdata('error', 'Invalid password');
                    redirect('admin');
                }
            }
            else
            {
                // Invalid email case
                $this->session->set_flashdata('error', 'Invalid email');
                redirect('admin');
            }
        }
    }
    

    public function logout(){
        session_destroy();
        redirect('admin');
    }
}    



