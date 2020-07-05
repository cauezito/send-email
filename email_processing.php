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
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;                              
        $mail->Username = 'test0101web@gmail.com';                
        $mail->Password = '***';                          
        $mail->SMTPSecure = 'tls';                          
        $mail->Port = 587;                                   

        //Recipients
        $mail->setFrom('test0101web@gmail.com', 'Cauê');
        $mail->addAddress($message->__get('to'), ' ');               
        $mail->addReplyTo('nokylevs@gmail.com', 'Cauê');

     /*   //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');        
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    
    */
        //Content
        $mail->isHTML(true);                                
        $mail->Subject = $message->__get('subject');
        $mail->Body    = $message->__get('message');

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
?>

