<?php
    class Users extends Controller {
        public $data;
        public function __construct(){
            $this->userModel = $this->model('User');
            $this->validationModel = $this->model('Validation');
            $this->request_post = ($_SERVER['REQUEST_METHOD'] == "POST") ? true : false;
            $this->data = [
                'email' => '',
                'email_err' => '',
                'password' => '',
                'first_name' => '',
                'first_name_err' => '',
                'password_err' => '',
                'con_password' => '',
                'con_password_err' => '',
            ];
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $this->data['email'] = isset($_POST['email']) ? htmlentities($_POST['email']) : '';
                $this->data['password'] = isset($_POST['password']) ? htmlentities($_POST['password']) : '';
                $this->data['con_password'] = isset($_POST['con_password']) ? htmlentities($_POST['con_password']) : '';
                $this->data['first_name'] = isset($_POST['first_name']) ? htmlentities($_POST['first_name']) : "";
            }
        }
        public function index(){
            $this->logIn();
        }
        
        public function logIn() {
            !(isset($_SESSION['email'])) ?: redirect('users/profile');
            if($this->request_post){
                $this->data['email_err'] = $this->validationModel->user_not_exists($this->data['email']);
                $this->data['password_err'] = $this->validationModel->password_is_correct($this->data['email'], md5($this->data['password']));
                if(empty($this->data['email_err']) && empty($this->data['password_err'])) {
                    $_SESSION['name_user'] = $this->userModel->findUserByEmail($this->data['email'])->name_user;
                    $_SESSION['email'] = $this->data['email'];
                    $_SESSION['id'] = $this->userModel->findUserByEmail($this->data['email'])->id;
                    return redirect('topic/topics');
                }

            }
                return $this->view('login', $this->data);   
        }
        public function logout(){
                unset($_POST);
                unset($_SESSION['email']);
                unset($_SESSION['id']);
                redirect('users/login');
        }

        public function profile() {
            if(isset($_SESSION['email'])){
                $data = $this->userModel->findUserByEmail($_SESSION['email']);
                return $this->view('user/profile',$data);
            }else {
                return $this->logIn();
            }
        }

        public function register() {
            if($this->request_post){
                $this->data['email_err'] = $this->validationModel->email($this->data['email']);
                $this->data['email_err'] .= $this->validationModel->user_exists($this->data['email']);

                $this->data['first_name_err'] = $this->validationModel->first_name($this->data['first_name']);

                $this->data['first_name'] = ucwords(strtolower($this->data['first_name']));


                $this->data['password_err'] = $this->validationModel->password($this->data['password']);
                $this->data['con_password_err'] = $this->validationModel->con_password($this->data['password'], $this->data['con_password']);


                if(empty($this->data['email_err']) && empty($this->data['con_password_err']) && empty($this->data['password_err']) ){
                    $this->userModel->createUser($this->data['email'], $this->data['first_name'], md5($this->data['password']));
                    flash('register_success', 'Register success, please login ');
                    redirect('users/login');
                }
            }
            return $this->view('user/register', $this->data);
        }
        
        public function profileUpdate() {
            if(isset($_SESSION['email'])){
                if($this->request_post){
                    $this->data['password_err'] = $this->validationModel->password($this->data['password']);
                    $this->data['con_password_err'] = $this->validationModel->con_password($this->data['password'], $this->data['con_password']);
                    if(empty($this->data['con_password_err']) && empty($this->data['password_err'])){
                        $this->userModel->updatePassword($_SESSION['email'], $this->data['password']);
                        flash('change_password_success', 'Password has been change');
                        unset($_SESSION['email']);
                        unset($_SESSION['id']);
                        redirect('users/login');
                    }
                }
                return $this->view('user/profileUpdate');
            }else {
                redirect('users/login');
            }
            
        }
    }