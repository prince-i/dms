<?php
    include "conn.php";
    session_start();
    if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password = md5($password);


        if(empty($username) || empty($password)){
            header('location:index.php');
            
        }else {
            $sql = "SELECT * from user where username ='$username' and pass = '$password'";
            $query = $conn->prepare($sql);
            $query->execute();
            $result = $query->fetchALL();
            foreach($result as $row){
                $usertype = $row['usertype'];
                
            }
                if($query->rowCount() > 0){
                    if($usertype == 1){
                        $_SESSION['username'] = $username;
                        header('location:user/student.php');
                    }
                    elseif($usertype == 2){
                        $_SESSION['username'] =$username;
                        header('location:user/teacher.php');
                    }
                    elseif($usertype == 3){
                        $_SESSION['username'] =$username;
                        header('location:user/dean.php');
                    }elseif($usertype == 4){
                        $_SESSION['username'] =$username;
                        header('location:user/registrar.php');
                    }elseif($usertype == 5){
                        $_SESSION['username'] =$username;
                        header('location:user/admin.php');

                    }else {
                        header('location:index.php');
                    }
                }else {
                    echo "<script type='text/javascript'>alert('Username or Password not match');</script>";
                }
        }
    }
?>