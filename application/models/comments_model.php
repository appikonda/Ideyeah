<?php 
class Comments_model extends CI_Model {
   
   function __construct() {
      parent::__construct();
   }
   
   function insert_comment($comment_info) {
      $query = "INSERT INTO comments(idea_id, user_id, comment_content) VALUES(?,?,?)";
      return $this->db->query($query, $comment_info);
   }
   
   function display_comments($idea_id) {
      $query = "SELECT * FROM comments c, users u WHERE c.idea_id=? AND c.user_id = u.user_id";
      $query = $this->db->query($query, $idea_id);
      if($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
            $data[] = $row;
         }
         return $data;
      }
   }
   
   function display_my_comments() {
      $vals = array($this->session->userdata('user_id'), $this->session->userdata('user_id'));
      $query = "SELECT * FROM comments c, ideas i WHERE c.user_id = ? AND c.idea_id = i.idea_id";
      $query = $this->db->query($query, $this->session->userdata('user_id'));
      if($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
            $data[] = $row;
         }
         return $data;
      }
   }
   
}
?>