<?php
    class Topics extends Controller {
        public $data;

        public function __construct(){
            $this->topicModel = $this->model('Topic');
            $this->userModel = $this->model('User');
        }

        public function index(){
            $this->show();
        }

        public function show() {
            $this->data = $this->topicModel->getTopics();
            return $this->view('topic/topics', $this->data);
        }

        public function createTopic() {
            if(!$_SESSION['email']){
                flash('is_not_logged', 'You must login to create new topic', "alert alert-danger");
                redirect('topic/topics');

            }
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                    if(strlen($_POST['topic']) < 4){
                        $this->data['topic_err'] = "Topic must have atleast 4 character";
                        return $this->view('topic/createTopic', $this->data);
                    }
                    if($this->topicModel->topic_exists($_POST['topic']) > 1){
                        $this->data['topic_err'] = "This topic already exists";
                        return $this->view('topic/createTopic', $this->data);
                    } 

                $this->topicModel->createTopic(htmlentities($_POST['topic']), $_SESSION['id']);
                unset($_POST['topic']);
                return redirect('topics/show');
            }
            return $this->view('topic/createtopic');
        }

        public function deleteTopic(){
            $this->topicModel->deleteTopic(array_keys($_POST)[0]);
            redirect('topics/show');
        }
    }