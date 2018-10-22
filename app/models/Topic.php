<?php 
    class Topic {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }
        
        public function getTopics() {
            $this->db->query('SELECT * FROM topic');
            return $this->db->resultSet();
        }

        public function createTopic($title, $user_id){
            $this->db->query('INSERT INTO topic (topic_id, user_id, title, created_at) VALUES (NULL, :user_id, :title, CURRENT_TIMESTAMP)');
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':title', $title);
            $this->db->execute();
        }

        public function topic_exists($topic){
            $this->db->query('SELECT * FROM topic WHERE title = :topic');
            $this->db->bind(':topic', $topic);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function topic_exists_id($id){
            $this->db->query('SELECT * FROM topic WHERE topic_id = :id');
            $this->db->bind(':id', $id);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function deleteTopic($id){
            $this->db->query('DELETE FROM topic WHERE topic_id = :id');
            $this->db->bind(':id', $id);
            $this->db->execute();
        }


    }


