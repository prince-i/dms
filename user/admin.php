<?php



include "../php/conn.php";
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
    session_destroy();
    header('location:../index.php');
}

$user_data = $_SESSION['username'];

function randStrGen($len){
    $result = "";
    $chars = "abcdefghijklmnopqrstuvwxyz$?!0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
	    $randItem = array_rand($charArray);
	    $result .= "".$charArray[$randItem];
    }
    return $result;
}
// Usage example
$randstr = randStrGen(8);


$sql = "SELECT count(*) FROM `upload_teacher`"; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); 
$count = $number_of_rows;

$sql2 = "SELECT count(*) FROM `user` WHERE `usertype` <=2"; 
$result2 = $conn->prepare($sql2); 
$result2->execute(); 
$number_of_rows2 = $result2->fetchColumn(); 
$count2 = $number_of_rows2;

$sql3 = "SELECT count(*) FROM `course`"; 
$result3 = $conn->prepare($sql3); 
$result3->execute(); 
$number_of_rows3 = $result3->fetchColumn(); 
$count3 = $number_of_rows3;


$sql4 = "SELECT count(*) FROM `documents`"; 
$result4 = $conn->prepare($sql4); 
$result4->execute(); 
$number_of_rows4 = $result4->fetchColumn(); 
$count4 = $number_of_rows4;
?>
<?php
if(isset($_POST['logout'])){
	session_destroy();
	header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../php/header.php";?>
    <title>Admin</title>
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
        <li><a href="#logout" class="modal-trigger"><?php echo $name;?></a></li>
         
       
</li>


      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab col s6"><a href="#test1">Documents
        <?php if($count > 0){?>
                <span class="new badge red darken-4" data-badge-caption=""><?php echo $count; ?></span>
                <?php } ?>
        </a>
    </li>
        <li class="tab col s6iu"><a href="#test2">Users
        <?php if($count2 > 0){?>
                <span class="new badge red darken-4" data-badge-caption=""><?php echo $count2; ?></span>
                <?php } ?>
        </a>
    </li>
       
      </ul>
    </div>


  </nav>

  <ul class="sidenav" id="mobile-demo">
     <li><a href="#logout" class="modal-trigger"><?php echo $name;?></a></li>
     
  </ul>



<!--tabscontent-->
    <div id="test1"><?php include 'admin/admintab1.php';?></div>
    <div id="test2"><?php include 'admin/admintab2.php';?></div>



</div>
</body>

<?php include "../php/footer.php"; ?>

</html>

     

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
