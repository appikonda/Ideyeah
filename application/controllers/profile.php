<?php 
class Profile extends CI_Controller {
   
   function __construct() {
      parent::__construct();
   }
   
   function index() {
      if(!$this->session->userdata('logged_in')) {
         $this->load->library('form_validation');
         $data['msg'] = "You cannot access profile page directly";
         $this->load->view('login_view', $data);
      } else {
         // Session is set
         $this->load->model('users_model');
         $this->load->model('ideas_model');
         $this->load->model('comments_model');
         $data['contribution'] = $this->comments_model->display_my_comments(); 
         $data['ideas'] = $this->ideas_model->get_ideas();
         $data['user_info'] = $this->users_model->get_details($this->session->userdata('user_id'));
         $this->load->view('profile_view', $data);
         
      }
      
   }
   
   
   function post_idea() {
      $this->load->library('form_validation');
      $this->load->view('postidea_view');
   }
   
   function idea_stream() {
      $this->load->model('ideas_model');
      $data['all_ideas'] = $this->ideas_model->get_all_ideas();
      $this->load->view('ideastream_view', $data);
   }
   
   function validate_idea() {
      $this->load->library('form_validation');
      if($this->input->post('postIdea')) {
         $this->form_validation->set_rules('idea_title', 'Idea Title', 'trim|required');
         $this->form_validation->set_rules('idea_content', 'Idea Content', 'trim|required');
         
       if ($this->form_validation->run() == FALSE) {
         // Go back to post idea page and display the errors
         $this->load->view('postidea_view');
       } else {
          // Go ahead and insert into database
          $this->load->model('ideas_model');
          $idea_info = array(
             $this->session->userdata('user_id'),
             $this->input->post('idea_title'),
             $this->input->post('idea_content')
          );
          
          if($this->ideas_model->insert_idea($idea_info)) {
             // Successfully inserted the idea
             $this->index();
          } else {
             // failed to insert
             $data['msg'] = "Idea insertion failed.";
             $this->load->view('postidea_view', $data);
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