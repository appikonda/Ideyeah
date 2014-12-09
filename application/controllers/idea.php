<?php 
class Idea extends CI_Controller {
   function __construct() {
      parent::__construct();
   }
   
   function index($id = 'none') {
      
   if(!$this->session->userdata('logged_in')) {
         $this->load->library('form_validation');
         $data['msg'] = "You cannot access profile page directly";
         $this->load->view('login_view', $data);
      } else {
         // Session is set
         if($id == 'none') {
            $data['msg'] = 'Idea ID missing.';
            $this->load->view('idea_view', $data);
         } else {
            // Some idea_id is passed
            $this->load->model('ideas_model');
            $data['idea_info'] = $this->ideas_model->get_particular_idea($id);
            $this->load->model('users_model');
            $data['user_info'] = $this->users_model->get_details($data['idea_info']->user_id);
            $this->load->model('comments_model');
            $data['comment_info'] = $this->comments_model->display_comments($id);
            $this->load->view('idea_view', $data);
         }
         
      }
   }
   
   function validate_comment($idea_id) {
      $this->load->library('form_validation');
      if($this->input->post('postComment')) {
         $this->form_validation->set_rules('comment_content', 'Comment Content', 'trim|required');
         
       if ($this->form_validation->run() == FALSE) {
         // Go back to post idea page and display the errors
         $this->load->view('idea_view');
       } else {
          // Go ahead and insert into database
          $this->load->model('comments_model');
          $comment_info = array(
             $idea_id,
             $this->session->userdata('user_id'),
             $this->input->post('comment_content')
          );
          
          if($this->comments_model->insert_comment($comment_info)) {
             // Successfully inserted the comment
             $this->index($idea_id);
          } else {
             // failed to insert
             $data['msg'] = "Idea insertion failed.";
             $this->load->view('idea_view', $data);
          }
          
       }
         
      } 
   }
   
}
?>