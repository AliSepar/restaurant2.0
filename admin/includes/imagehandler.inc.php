<?php
require_once "dbh.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image_input']) && $_FILES['image_input']['error'] === UPLOAD_ERR_OK) {
        $filename = basename($_FILES['image_input']['name']);
        $targetDir = 'images/'; 
        $targetFilePath = $targetDir . $filename;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){
          if(move_uploaded_file($_FILES['image_input']['tmp_name'], "../../".$targetFilePath)){
            try {
  
              $query = "INSERT INTO images (image_path) VALUES (:image_path);";
  
              $stmt = $pdo->prepare($query);
  
              $stmt->bindParam(":image_path", $targetFilePath);
              $stmt->execute();
              $pdo = null;
              $stmt = null;
              header("Location:../manage.php?ImageSubmit=success");
              die();
          } catch (PDOException $e) {
              die('Query failed: ' . $e->getMessage());
          }
          }else{
            header("Location:../manage.php?ImageSubmit=patherror");
            
          }
        }
    } else {
        header("Location:../manage.php?ImageSubmit=error");
    }
  }