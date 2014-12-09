<?php 
class Users_model extends CI_Model {
   
   function __construct() {
      parent::__construct();
   }
   
   function create_user($user_info) {
      $query = "INSERT INTO users(first_name, last_name, bio, url) VALUES(?,?,?,?)";
      if($this->db->query($query, $user_info)) {
         // Success
         return mysql_insert_id(); 
      } else {
         // Failed
         return 0;
      } 
   }
   
   function delete_imba_info($user_id) {
      $query = "DELETE FROM users WHERE user_id = ".$user_id;
      return $this->db->query($query);
   }
   
   function get_details($user_id) {
      $query = "SELECT * FROM users WHERE user_id = ?";
      $result = $this->db->query($query, $user_id);
      if($result->num_rows() > 0) {
         return $result->result();
      } else {
         return 0;
      }
   }
   
}
?>