<?php
    class Validation extends User {
        private $result;

        public function password($password){
            $this->result = (strlen($password) > 6) ? "" :  'Password must be logner than 6 character'; 
            return $this->result;
        }
        public function con_password($password, $password_is_correct){
            $this->result = ($password_is_correct == $password) ? "" : 'Password is incorrect';
            return $this->result;
        }

        public function password_is_correct($email,$password){
            $this->result = $this->findUserByEmail($email) ? ($this->findUserByEmail($email)->pass == $password ? "" : "Password is incorrect") : '';
            return $this->result;
        }

        public function user_exists($email){
            $this->result = ($this->findUserByEmail($email)) ? "User already exists" : "";
            return $this->result;
        }

        public function user_not_exists($email){
            $this->result = !($this->findUserByEmail($email)) ? 'User does not exists' : "";
            return $this->result;
        }

        public function email($email){
            $this->result = (filter_var($email, FILTER_VALIDATE_EMAIL)) ? "" : "Email is incorrect"; 
            return $this->result;
        }

        public function first_name($name){
            $this->result = (preg_match('/[A-Z a-z]+/', $name)) ? "" : 'Enter correct name';
            return $this->result;
        }

        public function log_in_validation($_email, $_password) {
            $email = $this->user_not_exists($_email);
            $password = $this->password_is_correct($_email, $_password);
            $this->result = [$email, $password];
            return $this->result;
        }
        
    }