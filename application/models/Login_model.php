<?php
class Login_model extends CI_model
{
    public function isvalidate($email, $password)
    {
        $checkArray = array();
        // Fetch the user record with the given email and MD5 hashed password ka method
        $query = $this->db->query("SELECT * FROM users WHERE email = ? AND password = MD5(?)", array($email, $password));
        if ($query->num_rows() > 0)
        {
            $user = $query->result();
            // Password and email match, print user data
            
            return $user;
        }
        // Email or password didn't match, return false
        return $checkArray;
    }
}