<?php
    $servername = "localhost";
    $username ="root";
    $password ="";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ama_online_grade_completion",$username,$password);
    }catch(PDOException $e){
        echo $sql ."No connection detected.".$e->getMessage();
    }

    
?>