<?php
/**
 * Created by PhpStorm.
 * User: LesuisseJens
 * Date: 17/05/2017
 * Time: 0:34
 */
class Users extends CI_Controller{

    public function register(){
        if($this->session->userdata('logged_in')){
            redirect('templates/layout');
        }
        $this->form_validation->set_rules('FirstName','First Name','trim|required|xss_clean');
        $this->form_validation->set_rules('LastName','Last Name','trim|required|xss_clean');
        $this->form_validation->set_rules('E-Mail','Email','trim|required|valid_email|xss_clean');

        $this->form_validation->set_rules('UserName','Username','trim|required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('Password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('Password2','Confirm Password','trim|required|matches[password]|xss_clean');

        if($this->form_validation->run() == FALSE){
            //Load view and layout
            $data['main_content'] = 'pages/register';
            $this->load->view('templates/layout',$data);
            //Validation has ran and passed
        } else {
            if($this->User_model->create_member()){
                $this->session->set_flashdata('registered', 'You are now registered, please log in');
                //Redirect to index page with error above
                redirect('templates/layout');
            }
        }
    }

    public function login(){
        $this->form_validation->set_rules('UserName','Username','trim|required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('Password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');

        if($this->form_validation->run() == FALSE){
            //Set error
            $this->session->set_flashdata('login_failed', 'Sorry, the login info that you entered is invalid');
            redirect('pages/home');
        } else {
            //Get from post
            $username = $this->input->post('UserName');
            $password = $this->input->post('Password');

            //Get user id from model
            $user_id = $this->User_model->login_user($username,$password);

            //Validate user
            if($user_id){
                //Create array of user data
                $user_data = array(
                    'user_id'   => $user_id,
                    'username'  => $username,
                    'logged_in' => true
                );
                //Set session userdata
                $this->session->set_userdata($user_data);

                redirect('templates/layout');
            } else {
                //Set error
                $this->session->set_flashdata('login_failed', 'Sorry, the login info that you entered is invalid');
                redirect('templates/layout');
            }
        }
    }

    public function logout(){
        //Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();

        //Set message
        $this->session->set_flashdata('logged_out', 'You have been logged out');
        redirect('templates/layout');
    }

}