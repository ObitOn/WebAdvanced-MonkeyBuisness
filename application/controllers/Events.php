<?php
/**
 * Created by PhpStorm.
 * User: LesuisseJens
 * Date: 23/05/2017
 * Time: 20:45
 */
class Events extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            //Set error
            $this->session->set_flashdata('need_login', 'Sorry, you need to be logged in to view that area');
            redirect('pages/index');
        }
    }

    public function index(){
        //Get the logged in users id
        $user_id = $this->session->userdata('user_id');
        //Get all lists from the model
        $data['events'] = $this->Event_model->get_all_events($user_id);

        //Load view and layout
        $data['main_content'] = 'events/index';
        $this->load->view('templates/layout',$data);
    }

    public function show($id){
        //Get all lists from the model
        $data['event'] = $this->Event_model->get_event($id);
        //Load view and layout
        $data['main_content'] = 'events/show';
        $this->load->view('templates/layout',$data);
    }


    public function add(){
        $this->form_validation->set_rules('event_name','Event Name','trim|required');
        $this->form_validation->set_rules('event_body','Event Body','trim');

        if($this->form_validation->run() == FALSE){
            //Load view and layout
            $data['main_content'] = 'events/add_list';
            $this->load->view('templates/layout',$data);
        } else {
            //Validation has ran and passed
            //Post values to array
            $data = array(
                'event_name'    => $this->input->post('event_name'),
                'event_body'    => $this->input->post('event_body'),
                'event_user_id' => $this->session->userdata('user_id')
            );
            if($this->Event_model->create_event($data)){
                $this->session->set_flashdata('event_created', 'Your event has been created');
                //Redirect to index page with error above
                redirect('events/index');
            }
        }
    }


    public function quickadd(){
        $this->form_validation->set_rules('list_name','List Name','trim|required|xss_clean');
        if($this->form_validation->run() == FALSE){
            //Load view and layout
            $data['main_content'] = 'home';
            $this->load->view('layouts/main',$data);
        } else {
            $data['list_name'] = $this->input->post('list_name');
            //Load view and layout
            $data['main_content'] = 'lists/add_list';
            $this->load->view('layouts/main',$data);
        }
    }


    public function edit($event_id){
        $this->form_validation->set_rules('event_name','Event Name','trim|required');
        $this->form_validation->set_rules('event_body','Event Body','trim');

        if($this->form_validation->run() == FALSE){
            //Get the current list info
            $data['this_event'] = $this->Event_model->get_event_data($event_id);
            //Load view and layout
            $data['main_content'] = 'events/edit_event';
            $this->load->view('templates/layout',$data);
        } else {
            //Validation has ran and passed
            //Post values to array
            $data = array(
                'event_name'    => $this->input->post('event_name'),
                'event_body'    => $this->input->post('event_body'),
                'event_user_id' => $this->session->userdata('user_id')
            );
            if($this->Event_model->edit_event($event_id,$data)){
                $this->session->set_flashdata('event_updated', 'Your event has been updated');
                //Redirect to index page with error above
                redirect('events/index');
            }
        }
    }


    public function delete($event_id){
        //Delete list
        $this->Event_model->delete_event($event_id);
        //Create Message
        $this->session->set_flashdata('event_deleted', 'Your event has been deleted');
        //Redirect to list index
        redirect('events/index');
    }
}