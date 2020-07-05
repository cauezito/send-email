<?php

    class Message{
        private $to;
        private $subject;
        private $message;

        public function __get($attr){
            return $this->$attr;
        }

        public function __set($attr, $value){
            $this->$attr = $value;
        }

        public function msgIsValid(){
            if(empty($this->to) || empty($this->subject) || empty($this->message)){
                return false;
            }
            return true;
        }
    }

    $message = new Message();
    $message->__set('to', $_POST['to']);
    $message->__set('subject', $_POST['subject']);
    $message->__set('message', $_POST['message']);

    if($message->msgIsValid()){
        echo 'Valid';
    } else {
        echo 'Invalid';
    }
?>

