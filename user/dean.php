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

$sql = "SELECT count(*) FROM `table_grade` WHERE statuss='dean'"; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); 
$count = $number_of_rows;



$sql2 = "SELECT count(*) FROM `table_grade` WHERE statuss='done'"; 
$result2 = $conn->prepare($sql2); 
$result2->execute(); 
$number_of_rows2 = $result2->fetchColumn(); 
$count2 = $number_of_rows2;


$sql3 = "SELECT count(*) FROM upload_teacher" ;
$result3 = $conn->prepare($sql3); 
$result3->execute(); 
$number_of_rows3 = $result3->fetchColumn(); 
$count3 = $number_of_rows3;
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../php/header.php";?>
    <title>Dean</title>
    <style>
      body::-webkit-scrollbar{
                width:0.5rem;

            }
            body::-webkit-scrollbar-track {
                background-color: ;
            }
           body::-webkit-scrollbar-thumb{
                background-color: gray;
                 border-radius:8px;
            }

            ul::-webkit-scrollbar{
                height:0.50rem;
                width:0.40rem;
            }
            ul::-webkit-scrollbar-track {
                background-color: ;
            }
           ul::-webkit-scrollbar-thumb{
                background-color: gray;
                border-radius:8px;
            }
    </style>
</head>

<body style="font-family: 'Montserrat', sans-serif;font-weight: normal;">

<nav class="nav-extended #263238 blue-grey darken-4">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">AMAICSys</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        
        <li><a href="#logout" class="modal-trigger waves-effect ">&#128104;<?php echo $name;?></a></li>
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#test1">Approval
        
        <?php if($count > 0){?>
                <span class="new badge red darken-4" data-badge-caption=""><?php echo $count; ?></span>
                <?php } ?>


        </a></li>
        <li class="tab"><a href="#test2">Approved
        
        <?php if($count2 > 0){?>
                <span class="new badge red darken-4" data-badge-caption=""><?php echo $count2; ?></span>
                <?php } ?>


        </a></li>
        <li class="tab"><a href="#test3">Documents
        
        
        <?php if($count3 > 0){?>
                <span class="new badge red darken-4" data-badge-caption=""><?php echo $count3; ?></span>
                <?php } ?>


        </a></li>

         <li class="tab">
          <a href="#test4">Subjects



        </a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
     <li><a href="#logout" class="modal-trigger waves-effect ">&#128104;<?php echo $name;?></a></li>
  </ul>

   
    <div id="test3"style="margin:2%;"><?php include 'dean/deantab3.php';?></div>
    <div id="test2"style="margin:2%;"><?php include 'dean/deantab2.php';?></div>
    <div id="test1" style="margin:2%;"><?php include 'dean/deantab1.php';?></div>
    <div id="test4" style="margin:2%;"><?php include 'dean/deantab4.php';?></div>
    

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

</body>
 
</html>
<?php include "../php/footer.php"; ?>
