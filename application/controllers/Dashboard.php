<!--controllers/Dashboard--> 
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //if (!$this->session->userdata('user_id') || !$this->session->userdata('subadmin_user_id'))  {
          //  redirect('admin');
        //}

        $this->load->library('form_validation');

    }

    public function index()
    {
        
        $user_data['user_id'] = $this->session->userdata('user_id');
        $user_data['user_email'] = $this->session->userdata('user_email');
        
        

        $this->load->view('dashboard/header');
        $this->load->view('dashboard/dashbody', $user_data);
        $this->load->view('dashboard/footer');


    }

    public function create_user()
{
    
    $this->load->view('dashboard/header');
    $this->load->view('dashboard/create_user_form');
    $this->load->view('dashboard/footer');
}

public function newuser()
{

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    $this->form_validation->set_rules('role', 'Role', 'trim|required');

    if ($this->form_validation->run() === TRUE) {
        // Check if the same email exists or not
        $email = $this->input->post('email');
        $query = $this->db->get_where('subadmin_users', array('email' => $email));

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('email', 'User with this email already exists.');
            echo json_encode(array('message' => 'Error in user creation', 'status' => 'error')); 
        } else {
            // Form validation is successful, insert data into the database
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $email,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'usertype' => $this->input->post('role'),
                'master_user_id'=>$this->session->userdata('user_id')
            );

            $this->db->insert('subadmin_users', $data);

            // Send a response back to the frontend (optional)
            echo json_encode(array('message' => 'User created successfully', 'status' => 'success')); 
            
        }
    } 
    else{
        echo json_encode(array('message' => 'Error in user creation', 'status' => 'error')); 

    }
}


public function userlist()
{
    // Fetch admins from users table where usertype is 1 (admin)
    $data['admins'] = $this->db->where('usertype', 1)->get('users')->result();

    // Fetch subadmin users from subadmin_users table with their corresponding admins
    $data['subadmins'] = $this->db->get('subadmin_users')->result();

    // Load the userlist view and pass the data to it
    $this->load->view('userlist', $data);
}



}


