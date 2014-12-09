<?php 
class Ideas_model extends CI_Model {
   function __construct() {
      parent::__construct();
   }
   
   function insert_idea($idea_info) {
      $query = "INSERT INTO ideas(user_id, idea_title, idea_content) VALUES(?,?,?)";
      return $this->db->query($query, $idea_info);
   }
   
   function get_ideas() {
      $query = "SELECT * FROM ideas WHERE user_id = ?";
      $query = $this->db->query($query, $this->session->userdata('user_id'));
      if($query->num_rows() > 0) {
         foreach($query->result() as $row) {
            $data[] = $row;
         }
         return $data;
      }
   }
   
   function get_all_ideas() {
      $query = "SELECT * FROM ideas";
      $query = $this->db->query($query);
      if($query->num_rows() > 0) {
         foreach($query->result() as $row) {
            $data[] = $row;
         }
         return $data;
      }
   }
   
   function get_particular_idea($id) {
      $query = "SELECT * FROM ideas WHERE idea_id = ?";
      $query = $this->db->query($query, $id);
      if($query->num_rows() > 0) {
         return $query->row();
      }
   }
   
}
?>