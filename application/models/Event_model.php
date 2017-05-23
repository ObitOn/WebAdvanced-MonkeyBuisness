<?php
/**
 * Created by PhpStorm.
 * User: LesuisseJens
 * Date: 23/05/2017
 * Time: 20:51
 */
class Event_model extends CI_Model{

    public function get_all_events($user_id){
        $this->db->where('event_user_id',$user_id);
        $this->db->order_by('create_date', 'asc');
        $query = $this->db->get('events');
        return $query->result();
    }

    public function get_event($id){
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if($query->num_rows() != 1){
            return FALSE;
        }
        return $query->row();
    }


    public function create_event($data){
        $insert = $this->db->insert('events', $data);
        return $insert;
    }

    public function edit_event($event_id,$data){
        $this->db->where('id', $event_id);
        $this->db->update('events', $data);
        return TRUE;
    }

    public function get_event_data($event_id){
        $this->db->where('id',$event_id);
        $query = $this->db->get('events');
        return $query->row();
    }

    public function delete_event($event_id){
        $this->db->where('id',$event_id);
        $this->db->delete('events');
        return;
    }



}