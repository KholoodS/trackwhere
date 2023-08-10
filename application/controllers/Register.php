<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        
        
    }
    public function index()
    {
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }
        $this->load->view('header');
        $this->load->view('register');
        $this->load->view('footer');
    }
    public function signin()
    {
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[15]');
       // $this->form_validation->set_rules('terms', 'privacy policy & terms', 'required',array('required' => 'You must agree to the %s.'));


    
        if ($this->form_validation->run() === FALSE) {
            // Form validation failed, set flash data with errors
            $this->session->set_flashdata('error', validation_errors());
        } else {
            // Form validation successful, proceed with data insertion
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
    
            // Check if the email already exists in the database
            $query = $this->db->get_where('users', array('email' => $email));
    
            if ($query->num_rows() > 0) {
                $this->session->set_flashdata('error', 'User with this email already exists.');
            } else {
                // Hash the password securely using password_hash
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
                $data = array(
                    'username' => $username,
                    'email' => $email,
                    'password' => $hashed_password
                );
    
                $this->db->insert('users', $data);
    
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data inserted successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Failed to insert data.');
                }
            }
        }
        redirect('register');
    }
}    