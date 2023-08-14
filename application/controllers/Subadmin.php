<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        }

        public function index()
        {
            if ($this->session->userdata('uid')) {
                redirect('dashboard');
            }
            $this->load->view('header');
            $this->load->view('subadmin_login');
            $this->load->view('footer');
        }



        public function subadmin_login()
    {

        
        $this->load->library('form_validation');

        if(($this->input->post('select_admin')) && ($this->input->post('password')) && ($this->input->post('email'))){

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('select_admin', 'required');
        $this->form_validation->set_rules('password', 'required');
        
        if($this->form_validation->run() === FALSE){

            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
        }

        else{
        $email = $this->input->post('email');
        $select_admin = $this->input->post('select_admin');
        $email_query = $this->db->get_where('subadmin_users', array('email' => $email, 'master_user_id'=> $select_admin));
        $password = $this->input->post('password');

        if($email_query->num_rows() >0){

            $sub_user = $email_query->result();

           
            if($sub_user[0]->password === md5($password)) //[0] because we are using array object for the response
            {
                    $this->session->set_userdata('subadmin_user_id', $sub_user[0]->subadmin_user_id);
                    $this->session->set_userdata('user_email', $sub_user[0]->email);
                    $this->session->set_userdata('username', $sub_user[0]->username);
                    $this->session->set_userdata('subadmin_logged_in', true);
                    $response = array(
                        'status' => 'successfully',
                        'message' => 'success'
                    );
            }
            else{
                $response = array(
                    'status' => 'error',
                    'message' => 'Invalid password'
                );
            }
        }
            else
            {
                // Invalid email case
                $response = array(
                    'status' => 'error',
                    'message' => 'Email not found in the database.'
                );
            }
        }
    }
        else{
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        //$this->form_validation->set_rules('password', 'Password', 'required');
        //$this->form_validation->set_rules('select_admin', 'Select Admin', 'required');
        $this->form_validation->set_message('valid_email', 'Please enter a valid email address.');

        if ($this->form_validation->run() === FALSE) {
            // Check if the provided email exists in the subadmin_users table
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
        } else {
            // Form validation passed, check if the email exists in subadmin_users table
            $email = $this->input->post('email');
            $email_query = $this->db->get_where('subadmin_users', array('email' => $email));


            if ($email_query->num_rows() > 0) {
                // Email exists in subadmin_users table, fetch data from users table
                    // Email exists in subadmin_users table
                    $user = $email_query->row();
                    // Query data from users table for the dropdown menu
                    $this->db->select('users.username, subadmin_users.master_user_id')->from('users')->join('subadmin_users', 'users.id = subadmin_users.master_user_id')->where('subadmin_users.email', $email);
                            
                    // Get the first row as the result
                    $dropdown_data = $this->db->get()->result();
                    
                    $response = array(
                        'status' => 'success',
                        'data' => $dropdown_data
                    );

                } 
                else {
                    // Email does not exist in subadmin_users table
                    $response = array(
                        'status' => 'error',
                        'message' => 'Email not found in the database.'
                    );
                }
                //print_r($this->input->post());
                //    die;

                
        }
        }
        
        

        // Send the response as JSON
        echo json_encode($response);
    }
    }





