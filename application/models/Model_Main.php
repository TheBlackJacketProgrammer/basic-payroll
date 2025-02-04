<?php

class Model_Main extends CI_Model
{
    // Login Authentication
    public function auth_login($data)
    {
        $query = $this->db->query("SELECT * FROM tbl_sys_users WHERE username = '$data[username]' AND password = '$data[password]'");
		return $query->result();
    }
}
