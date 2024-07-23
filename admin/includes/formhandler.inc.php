<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST['first-name'];
    $lastname = $_POST['last-name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

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
        header("Location: ../../pages/contact.html?submit=success");
        die();
    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
    }
} else {
    header("Location:../../index.html");
}
