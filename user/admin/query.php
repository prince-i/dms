<?php
include "../../php/conn.php";
if(isset($_POST['add_user'])){

    $lname = $_POST['last_name'];
    $fname = $_POST['first_name'];
    $mname = $_POST['middle_name'];
    $pass = $_POST['password'];
    $pass = md5($pass);
    $username = $_POST['username'];
    $fullname  = $fname. " " .$mname." " .$lname;
    $usertype = $_POST['usertype'];

    
    $sql7 ="SELECT * from user where username='$username'";
    $statement7 = $conn->prepare($sql7);
    $statement7->execute();
    $result = $statement7->fetchALL();
        if($statement7->rowCount() == 1){
          $message = 'Username has been taken';
               echo "<SCRIPT type='text/javascript'> //not showing me this
                   alert('$message');
                   window.location.replace(\"http:../admin.php#test2\");
               </SCRIPT>";
        }else{

    $sql8 = 'INSERT INTO user(fullname,usertype,username,pass) VALUES(:fullname, :usertype, :username, :pass)';
    $statement8 = $conn->prepare($sql8);
    if ($statement8->execute([':fullname' => $fullname, ':usertype' => $usertype, ':username' => $username, ':pass' => $pass])) {
      $message = 'User Added';

      echo "<SCRIPT type='text/javascript'> //not showing me this
          alert('$message');
          window.location.replace(\"http:../admin.php#test2\");
      </SCRIPT>";
  }



}

}


if(isset($_POST['update_user'])){
  $id = $_GET['id'];
  $fname = $_POST['first_name'];
  $pass = $_POST['password'];
  $pass = md5($pass);
  $username = $_POST['username'];
  $usertype = $_POST['usertype'];

$sql6 ="UPDATE `user` SET `fullname`='$fname',
`usertype`='$usertype',`username`='$username',`pass`='$pass' WHERE id = '$id'";
  
  $conn->query($sql6);
 if($conn->query($sql6)){
  $message = 'Updated!';
  echo "<SCRIPT type='text/javascript'> //not showing me this
      alert('$message');
      window.location.replace(\"http:../admin.php#test2\");
  </SCRIPT>";
 }

}
?>