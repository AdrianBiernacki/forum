<?php 

    class Posts extends Controller {


        public function __construct(){
            $this->postModel = $this->model('Post');
            if(!isset($_SESSION['id'])){
                flash('is_not_logged', 'You must login!', "alert alert-danger");
                redirect('topic/show');
            }
        }

        public function index() {
            return $this->show($title_id);
        }

        public function show($title_id) {

            // $data = $this->postModel-> getPosts($title_id);
   
            //  die(print_r($this->postModel->who_is_owner($title_id)));
             $data = $this->postModel->who_is_owner($title_id);
            return $this->view('post/posts', $data);
        }
        public function addPost($topic_id) {
            $title = htmlentities($_POST['title']);
            $content = htmlentities($_POST['content']);
            $user_id = $_SESSION['id'];
            if(isset($_POST['add'])){
                $this->postModel->addPost($topic_id, $user_id, $title, $content);
            }
            redirect('posts/show/'.$topic_id);
        }
        public function postEdit($post_id, $topic_id){
            if(!isset($_POST['title'])){
                redirect('topic/show');
            }
            $title = htmlentities($_POST['title']);
            $content = htmlentities($_POST['content']);
            if(isset($_POST['save'])){
               $this->postModel->postEdit($post_id, $title, $content);     
               redirect('posts/show/'.$topic_id);
            }
        }

        public function postDelete($id, $topic_id){
            if(isset($_POST['remove'])){
                $this->postModel->deletePost($id);
                redirect('posts/show/'.$topic_id);
            }else {
                redirect('topic/show');
            }
        }

    }