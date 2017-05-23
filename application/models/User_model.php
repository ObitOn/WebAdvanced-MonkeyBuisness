<?php
/**
 * Created by PhpStorm.
 * User: LesuisseJens
 * Date: 17/05/2017
 * Time: 0:35
 */
class User_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create_member()
    {
        $enc_password = md5($this->input->post('password'));
        $data = array
        (
            'first_name'    => $this->input->post('first_name'),
            'last_name'     => $this->input->post('last_name'),
            'email'       => $this->input->post('email'),
            'username'     => $this->input->post('username'),
            'password'     => $enc_password
        );
        $insert = $this->db->insert('Client',$data);
        return $insert;

    }

    public function login_user($username,$password)
    {
        $enc_password = md5($password);
        $this->db->where('username', $username);
        $this->db->where('password', $enc_password);

        $result = $this->db->get('Client');
        if($result->num_rows == 1)
        {
            return $result->row(0)->id;
        }else{
            return false;
        }
    }

}