<?php
/**
 * Created by PhpStorm.
 * User: LesuisseJens
 * Date: 17/05/2017
 * Time: 0:33
 */
class Pages extends CI_Controller{
    public function index()
    {
        if($this->session->userdata('logged_in')){
            //Get the logged in users id
            $user_id = $this->session->userdata('user_id');
            //Get all lists from the model
            $data['events'] = $this->Event_model->get_all_events($user_id);
        }
        $data['main_content'] = 'home';
        $this->load->view('templates/layout', $data);
    }
}