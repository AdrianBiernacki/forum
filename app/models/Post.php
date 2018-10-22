<?php

    class Post {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPosts($title_id){
            $this->db->query('SELECT * FROM posts where topic_id = :title_id');
            $this->db->bind(':title_id', $title_id);
            return $this->db->resultSet();
        }

        public function addPost($topic_id, $user_id, $title, $content) {
            $this->db->query('INSERT INTO posts (id, topic_id, user_id, title, body, created_at) VALUES (NULL, :topic_id, :user_id, :title, :content, CURRENT_TIMESTAMP)');
            $this->db->bind(':topic_id', $topic_id);
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':title', $title);
            $this->db->bind(':content', $content);
            $this->db->execute();
        }

        public function postEdit($topic_id, $title, $body){
            $this->db->query('UPDATE posts SET title = :title, body = :body WHERE posts.id = :topic_id');
            $this->db->bind(':title', $title);
            $this->db->bind(':body', $body);
            $this->db->bind(':topic_id', $topic_id);
            $this->db->execute();
        }

        public function deletePost($id){
            $this->db->query('DELETE FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->execute();
        }
        public function who_is_owner($topic_id){
            $this->db->query('SELECT posts.id, posts.topic_id, posts.title, posts.body, posts.created_at, users.name_user, posts.user_id FROM posts INNER JOIN users ON users.id = posts.user_id WHERE posts.topic_id = :topic_id');
            $this->db->bind(':topic_id', $topic_id);
            return $this->db->resultSet();
        }
    }