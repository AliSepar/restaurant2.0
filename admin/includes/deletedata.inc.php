<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

require_once "dbh.inc.php";

    if(isset($_GET['message_id'])){

        try{
                
            $message_id= $_GET['message_id'];

            $query="DELETE FROM messages where id=:id";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":id", $message_id);
            $stmt->execute();

            $pdo = null;
            $stmt = null;
            header("Location: ../manage.php?delete_message=success");
            die();
        }catch(PDOException $e) {
            die("DELETE Messages Query failed: " . $e->getMessage());
        }

    }else{
        header("Location:../manage.php");
    }


    //changing the status of reservation
    if(isset($_GET["statusChangeId"])){
        $res_id=$_GET['statusChangeId'];

        try{
            $query = 'UPDATE reservation SET  status = :newstatus where res_id= :id';
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":newstatus", 1);
            $stmt->bindParam(":id", $res_id);
            $stmt->execute();
            
            $pdo = null;
            $stmt = null;

            header("Location: ../manage.php?statusChange=success");
            die();
        }catch(PDOException $e) {
            die("Status Query failed: " . $e->getMessage());
        }
    }else{
        header("Location:../manage.php?errorStatus");
    }


}else{
    header("Location:../manage.php");
}
