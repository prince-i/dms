<?php
include "../../php/conn.php";





if(isset($_POST['add_subject'])){

  $school_year = $_POST['school_year'];
  $subject_code = $_POST['subject_code'];
  $class_number = $_POST['class_number'];
  $description = $_POST['description'];
  $units = $_POST['units'];
  $trimester = $_POST['trimester'];


  
$sql4 = "SELECT * FROM course WHERE subject_code = '$subject_code' and 
class_number = '$class_number' and description = '$description' and units ='$units'"; 
$result4 = $conn->prepare($sql4); 
$result4->execute(); 
$number_of_rows4 = $result4->fetchColumn(); 
$count4 = $number_of_rows4;

      if($count4 > 0){
        $message = 'Subject are Already Existed';
        echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('$message');
            window.location.replace(\"http:../dean.php#test4\");
        </SCRIPT>";
      
      }else{

      $sql2 = 'INSERT INTO course(subject_code,class_number,description,units,school_year,trimester)
      VALUES(:subject_code, :class_number, :description, :units, :school_year, :trimester)';
      $statement = $conn->prepare($sql2);
      if ($statement->execute([':subject_code' => $subject_code, ':class_number' => $class_number,
       ':description' => $description, ':units' => $units, ':school_year' => $school_year, ':trimester' => $trimester])) 
      {
      $message = 'Subject Added';

      echo "<SCRIPT type='text/javascript'> //not showing me this
          alert('$message');
          window.location.replace(\"http:../dean.php#test4\");
      </SCRIPT>";
    }
}
}


if(isset($_POST['update_subject'])){
  $id = $_GET['id'];
  $school_year = $_POST['school_year'];
  $subject_code = $_POST['subject_code'];
  $class_number = $_POST['class_number'];
  $description = $_POST['description'];
  $units = $_POST['units'];
  $trimester = $_POST['trimester'];


  
$sql5 = "UPDATE course SET subject_code = '$subject_code' ,
 class_number='$class_number',
 trimester='$trimester',
description='$description',
units='$units',
school_year='$school_year'
 WHERE id = '$id'"; 

$conn->query($sql5);
 if($conn->query($sql5)){
  $message = 'Updated!';
  echo "<SCRIPT type='text/javascript'> //not showing me this
      alert('$message');
      window.location.replace(\"http:../dean.php#test4\");
  </SCRIPT>";
 }

}

?>