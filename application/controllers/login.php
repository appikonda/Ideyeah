<?php 
class Login extends CI_Controller {
      
   function __construct() {
      parent::__construct();
   }
   
   function index() {
      $this->load->library('form_validation');
      $this->load->view('login_view');    
   }
   
   function validate() {
      $this->load->library('form_validation');
      $this->load->model('login_info_model');
      $this->load->model('users_model');
      if($this->input->post('login')) {
         $this->form_validation->set_rules('username', 'Username', 'trim|required');
         $this->form_validation->set_rules('password', 'Password', 'trim|required');
         
      if ($this->form_validation->run() == FALSE) {
         // Go back to login page and display the errors
         $this->load->view('login_view');
      } else {
         // Verify DB with username and password
         $credentials = array(
            $this->input->post('username'),
            md5($this->input->post('password'))     
         );
         
         if($this->login_info_model->validate_user($credentials)) {
            // returned 1 => success...
            // lolli cheyandi iga
            // set session and redirect to profile yo!
            $user_id = $this->login_info_model->get_details($this->input->post('username'));
            $session_vars = array(
               'user_id' => $user_id,
               'username' => $this->input->post('username'),
               'logged_in' => true 
            );
            // Setting session vars
            $this->session->set_userdata($session_vars);
            // Goto profile page babay!
            redirect(base_url().'profile');
            
         } else {
            // dude, you entered invalid details.. jeffa!
            $data['msg'] = 'Invalid username/password combination';
            $this->load->view('login_view', $data);
         }
      }
         
      }  
   }
   
   function logout() {
      $this->load->library('form_validation');
      $this->session->sess_destroy();
      redirect(base_url().'login');
   }
   
}
?>