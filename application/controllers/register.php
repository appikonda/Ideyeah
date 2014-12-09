<?php 
class Register extends CI_Controller {
   
   function __construct() {
      parent::__construct();
   }
   
   function index() {
      $this->load->library('form_validation');
      $this->load->view('register_view');
   }
   
   function validate() {
      if($this->input->post('register')) {
         // User Clicked Register
         $this->load->library('form_validation');
         $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
         $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
         $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]');
         $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
         $this->form_validation->set_rules('password2', 'Confirm', 'trim|required|min_length[6]|matches[password]');
         
         if ($this->form_validation->run() == FALSE) {
            // Go back to register page and display the errors
            $this->load->view('register_view');
         } else {
            // Insert into database
            $this->load->model('users_model');
            $this->load->model('login_info_model');
            $data['exists'] = $this->login_info_model->check_username($this->input->post('username'));
            
            if(!$data['exists']) {
               // Username already exists
               $this->load->view('register_view', $data);
            } else {
               // Safe to insert into database      
                $user_info = array(
                $this->input->post('first_name'), 
                $this->input->post('last_name'), 
                $this->input->post('bio'), 
                $this->input->post('url')
                );
                
                $user_id = $this->users_model->create_user($user_info);
                if($user_id) {
                   $credentials = array($user_id, $this->input->post('username'), md5($this->input->post('password')), 1);
                   $this->login_info_model->create_user($credentials);
                   // Yay! Goto login page :P
                   $data['msg'] = 'Registration successful. Go ahead and login';
                   $this->load->view('login_view', $data);
                } else {
                   if($this->users_model->delete_imba_info($user_id)) {
                      // Deletion of imba user info successful
                      $data['msg'] = "We are sorry. Your account couldn't be created. Please try again.";
                      $this->load->view('register_view', $data);
                   }
                }
                
            }
            
         }
         
         
      } else {
         // Naughty fellow :D no registration huh?
         $this->index();
      }
   }
   
}

?>