<?php
use google\appengine\api\mail\Message;

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $subject = $_POST['subject'];

    $firstname = $_POST['first-name'];
    $lastname = $_POST['last-name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // function confirmEmail($name, $lastname, $email, $date, $time, $people){

    //     $email_subject ="Reservation Confirmation for Mr/Ms:".$name." ".$lastname."";
    //     $email_header="Dear Mr/Ms ".$name." ".$lastname." \n\n";
    //     $email_message="We thank you for your reservation to our restourant \n Reservation Details:\n Full name:".$name." ".$lastname." \n Email: ".$email." \n Date:".$date." \n Time:".$time."\n People: ".$people." People \n\n
    //     We will be waiting for you arivil. \nRegards\nRestoran Restorant"; 
        
    //     if (mail($email, $email_header, $email_message, $email_header)) {
    //         return  $result='EmailSend';
    //     } else {
    //         return  $result='EmailNotSend';
    //     }
    // }


    if($subject != 2){
        
        $date = date("Y/m/d");


            try {
                require_once "dbh.inc.php";

                $query = "INSERT INTO messages (first_name, last_name, email, date, m_type, message) VALUES 
                (:firstname, :lastname, :email, :date, :m_type, :message);";

                $stmt = $pdo->prepare($query);

                $stmt->bindParam(":firstname", $firstname);
                $stmt->bindParam(":lastname", $lastname);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":date", $date);
                $stmt->bindParam(":m_type", $subject);
                $stmt->bindParam(":message", $message);
                $stmt->execute();
                $pdo = null;
                $stmt = null;
                header("Location: ../../pages/contact.php?submit=success");
                die();
            } catch (PDOException $e) {
                die('Query failed: ' . $e->getMessage());
            }
        }else{

        $date = $_POST['date'];
        $time = $_POST['time'];
        $people =$_POST['people'];
        $status=0;

        try {
            require_once "dbh.inc.php";

            $query = "INSERT INTO reservation (first_name, last_name, email, date,time,people, message, status) VALUES 
            (:firstname, :lastname, :email, :date, :time, :people , :message, :status);";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":firstname", $firstname);
            $stmt->bindParam(":lastname", $lastname);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":date", $date);
            $stmt->bindParam(":time",$time );
            $stmt->bindParam(":people", $people);
            $stmt->bindParam(":message", $message);
            $stmt->bindParam(":status", $status);
            $stmt->execute();
            $pdo = null;
            $stmt = null;
            // $result='';
            // confirmEmail($firstname,$lastname,$email,$date,$time,$people);
            header("Location: ../../index.html?reservation=done");
            die();
        } catch (PDOException $e) {
            die('Reservation Query failed: ' . $e->getMessage());
        }

        }
} else {
    header("Location:../../index.html");
}
