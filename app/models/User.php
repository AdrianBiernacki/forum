<?php

class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function isUser($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email and pass= :password');
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        return $this->db->single();
    }

    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function createUser($email, $name, $password) {
        $this->db->query('INSERT INTO users (id, name_user, email, pass, created_at) VALUES (NULL, :name_user , :email, :pass, CURRENT_TIMESTAMP)');
        $this->db->bind(':name_user', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':pass', $password);
        $this->db->execute();
    }
    public function updatePassword($email, $password){
        $this->db->query('UPDATE `users` SET `pass` = :pass WHERE `users`.`email` = :email');
        $this->db->bind(':pass', $password);
        $this->db->bind(':email', $email);
        $this->db->execute();
    }
}