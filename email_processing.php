<?php
    require "./libraries/PHPMailer/Exception.php";
    require "./libraries/PHPMailer/OAuth.php";
    require "./libraries/PHPMailer/PHPMailer.php";
    require "./libraries/PHPMailer/POP3.php";
    require "./libraries/PHPMailer/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


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

    if(!$message->msgIsValid()){
        echo 'invalid';
        die();
    } 

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                
        $mail->isSMTP();                                     
        $mail->Host = 'smtp1.example.com;smtp2.example.com'; 
        $mail->SMTPAuth = true;                              
        $mail->Username = 'user@example.com';                
        $mail->Password = 'secret';                          
        $mail->SMTPSecure = 'tls';                          
        $mail->Port = 587;                                   

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('joe@example.net', 'Joe User');    
        $mail->addAddress('ellen@example.com');              
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');        
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

        //Content
        $mail->isHTML(true);                                
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
?>

