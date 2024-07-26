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
    }
    // else{
    //     header("Location:../manage.php?DeleteMessageError");
    // }


    //changing the status of reservation
    if(isset($_GET['statusChangeId'])){
            
        $res_id=$_GET['statusChangeId'];

        try{
            $query = 'UPDATE reservation SET  status = :newstatus where res_id= :id';
            $stmt = $pdo->prepare($query);

            $newStatus=1;
            $stmt->bindParam(":newstatus", $newStatus);
            $stmt->bindParam(":id", $res_id);
            $stmt->execute();
            
            $pdo = null;
            $stmt = null;

            header("Location: ../manage.php?statusChange=success");
            die();
        }catch(PDOException $e) {
            die("Status Query failed: " . $e->getMessage());
        }
    }
    // else{
    //     header("Location:../manage.php?errorStatus");
    // }
    
    //reservation delete
    if(isset($_GET['reservation_delete'])){
            $res_id = $_GET['reservation_delete'];

            try{
                $query="DELETE FROM reservation where res_id=:res_id";
                $stmt = $pdo->prepare($query);

                $stmt->bindParam(":res_id", $res_id);
                $stmt->execute();

                $pdo = null;
                $stmt = null;
                header("Location: ../manage.php?delete_reservation=success");
                die();
            }catch(PDOException $e) {
                die("DELETE reservation Query failed: " . $e->getMessage());
            }
    }
    // else{
    //     header("Location:../manage.php?reservationDeleteError");
    // }


//deleting images
if(isset($_GET['image_id'])){

    $image_id = $_GET['image_id'] ?? null;
    
    if ($image_id === null) {
        header("Location:../manage.php?error=invalid_id");
        exit;
    }
    
    try {
        // Fetch the image details from the database
        $getquery = "SELECT * FROM images WHERE image_id = :image_id";
        $stmt = $pdo->prepare($getquery);
        $stmt->bindParam(":image_id", $image_id, PDO::PARAM_INT);
        $stmt->execute();
        $image = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($image) {
            $file = '../../' . $image['image_path'];
    
            if (file_exists($file)) {
                // Delete the file from the filesystem
                if (unlink($file)) {
                    // Delete the database record
                    $query = "DELETE FROM images WHERE image_id = :image_id";
                    $delete = $pdo->prepare($query);
                    $delete->bindParam(":image_id", $image_id, PDO::PARAM_INT);
                    $delete->execute();
    
                    // Redirect on success
                    header("Location:../manage.php?ImageDelete=success");
                    exit;
                } else {
                    header("Location:../manage.php?ImageDelete=filedeleteerror");
                    exit;
                }
            } else {
                header("Location:../manage.php?ImageDelete=nofile");
                exit;
            }
        } else {
            header("Location:../manage.php?ImageDelete=notfound");
            exit;
        }
    } catch (PDOException $e) {
        // Log error instead of displaying it directly
        error_log("DELETE image Query failed: " . $e->getMessage());
        header("Location:../manage.php?error=database");
        exit;
    }
    


    }else{
        header("Location:../manage.php?ImageDelete=error");
    }

}else{
    header("Location:../manage.php");
}
