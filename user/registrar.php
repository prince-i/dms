<?php
include "../php/conn.php";
include '../php/logout.php';
session_start();
if(isset($_SESSION['username'])){
    $username  = $_SESSION['username'];
    $user_data = "SELECT *from user where username = '$username'";
    $stmt = $conn->prepare($user_data);
    $stmt->execute();
    $result = $stmt->fetchALL();
    foreach($result as $data){
     $name = $data['fullname']; 
    }
    
  
}else {
  header('location:../index.php');
}


$user_data = $_SESSION['username'];


$sql = "SELECT count(*) FROM `upload_teacher` WHERE  `doc_type` = 'recom_letter'"; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); 
$count = $number_of_rows;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../php/header.php";?>
    <title>registrar</title>
</head>



<body style="font-family: 'Montserrat', sans-serif;font-weight: normal;">

<nav class="nav-extended #263238 blue-grey darken-4">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">AMAICSys</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li>
        <a class="waves-effect transparent modal-trigger" href="#logout">
        <?php echo $name;?></a></li>
       
</li>


      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        
        <li class="tab"><a href="#tab1">My Documents
        <?php if($count > 0){?>
                <span class="new badge red darken-4" data-badge-caption=""><?php echo $count; ?></span>
                <?php } ?>
        </a></li>
      </ul>
    </div>


  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a class="modal-trigger" href="#logout"><?php echo $name;?></a></li>
   
</li>
  </ul>

    <div id="tab1"style="margin:2%;"><?php include 'registrar/regtab1.php';?></div>
                    
</body>



    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

    <div class="modal bottom-sheet" id="logout">
        <div class="modal-footer">
            <a  class="modal-close btn blue-grey darken-4" style="border-radius:60px;"><i class="material-icons">close</i></a>
        </div>
        <div class="modal-content center">
            <h4>Confirm logout</h4>
            <form action ="" method="POST">
                <input class="btn red darken-4" type="submit" name="logout" value="Logout"/>
            </form>
        </div>
    </div>


<?php include "../php/footer.php"; ?>

</html>



