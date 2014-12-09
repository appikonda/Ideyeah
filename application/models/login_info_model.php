<?php 
class Login_info_model extends CI_Model {
   
   function __construct() {
      parent::__construct();
   }
   
   function check_username($username) {
      $query = "SELECT username FROM login_info WHERE username = '".$username."'";
      $existence = $this->db->query($query);
      if($existence->num_rows() > 0) {
         return 0;
      } else {
         return 1;
      }
   }
   
   function create_user($credentials) {
      $query = "INSERT INTO login_info VALUES(?,?,?,?)";
      if($this->db->query($query, $credentials)) {
         return 1;
      } else {
         return 0;
      }     
   }
   
   function validate_user($credentials) {
      $query = "SELECT username, password FROM login_info WHERE username = ? and password = ?";
      $valid = $this->db->query($query, $credentials);
      
      if($valid->num_rows() > 0 ) {
         // Valid
         return 1;
      } else {
         return 0;
      }
   }
   
   function get_details($username) {
      $query = "SELECT user_id FROM login_info WHERE username = ?";
      $query = $this->db->query($query, $username);
      $row = $query->row();
      return $row->user_id;
   }
   
   
}
?>