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
        $data['main_content'] = 'home';
        $this->load->view('templates/layout', $data);
    }
}