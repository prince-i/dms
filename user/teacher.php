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
	header('location:index.php');
}
include_once "../php/config.php";
include "teacher/csvupload.php";

include '../php/logout.php';

$user_data = $_SESSION['username'];

$sql = "SELECT * FROM table_grade
    WHERE teacher='$user_data' and grade='IC' and statuss='teacher'";
    

$sql = "select count(*) as allcount from table_grade where statuss='teacher' and grade='IC' and teacher = '$user_data' ";
$retrieve_data = mysqli_query($con,$sql);
$row = mysqli_fetch_array($retrieve_data);
$count = $row['allcount'];

$sql2 = "select count(*) as allcount from table_grade where statuss='dean' and teacher = '$user_data'";
$retrieve_data2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_array($retrieve_data2);
$count2 = $row2['allcount'];

$sql3 = "select count(*) as allcount from table_grade where statuss='done' and teacher = '$user_data'";
$retrieve_data3 = mysqli_query($con,$sql3);
$row3 = mysqli_fetch_array($retrieve_data3);
$count3 = $row3['allcount'];

$sql4 = "select count(*) as allcount from upload_teacher where teacher='$user_data' ";
$retrieve_data4 = mysqli_query($con,$sql4);
$row4 = mysqli_fetch_array($retrieve_data4);
$count4 = $row4['allcount'];

?>

<!DOCTYPE html>
<html>

<head>
    <?php include "../php/header.php";?>
    <title>Teacher's Portal</title>
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








<nav class="nav-extended blue-grey darken-4">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">AMAICSys</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li>
            <a class="modal-trigger" href="#logout">&#128104;<?php echo $name?></a>
        </li>
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#tab1">Upload csv</a></li>
        <li class="tab"><a href="#tab2">Filtered IC</a></li>
        <li class="tab"><a href="#tab3">Pending</a></li>
        <li class="tab"><a href="#tab4">Approved Grades</a></li>
        <li class="tab"><a href="#tab5">Grade sheet</a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
   <li>
            <a class="modal-trigger" href="#logout">&#128104;<?php echo $_SESSION['username'];?></a>
        </li>
  </ul>

    <div id="tab1" style="margin:2%;"><?php include "teacher/tab1.php";?></div>
    <div id="tab2" style="margin:2%;"><?php include "teacher/tab2.php";?></div>
    <div id="tab3" style="margin:2%;"><?php include "teacher/tab3.php";?></div>
    <div id="tab4" style="margin:2%;"><?php include "teacher/tab4.php";?></div>
    <div id="tab5" style="margin:2%;"><?php include "teacher/tab5.php";?></div>

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