

<?php

$sql = "SELECT * from  `table_grade` where `usn` = '$user_data' and `grade` = 'IC'";

?>
<div class="row">

<?php  
foreach ($conn->query($sql) as $row) {
?>

<?php  
// $subject_code = $row['subject_code']; 
// $class_number = $row['class_number']; 
// $sql2 = "SELECT * from course where subject_code = '$subject_code' and class_number = '$class_number'";
// foreach ($conn->query($sql2) as $row2) {
?>
<div class="col s12 m6 l4">
    <div class="card horizontal">
      <div class="card-image" style="width:10rem;">
        <img src="../img/subj.png">
      </div>
      <div class="card-stacked">
        <div class="card-content">
        <h5><?php echo $row['subject_code'];?></h5>
          <p><?php $timestamp = $row['date_upload'];
$start_date = date($timestamp);

$expires = strtotime('+90 days', strtotime($timestamp));
//$expires = date($expires);

$date_diff=($expires-strtotime($timestamp)) / 86400;

//echo "Start: ".$timestamp."<br>";
echo "Expire: ".date('Y-m-d H:i:s', $expires)."<br>";

echo round($date_diff, 0)." days left";

 ?></p>
        </div>
        <div class="card-action">
          <a class="waves-effect waves-light btn modal-trigger red darken-4" href="#modal1<?php echo $row['id'];?>">Information</a>
        </div>
      </div>
    </div>
  </div>
<?php //} ?>         




<!-- Modal Structure -->
<div id="modal1<?php echo $row['id'];?>" class="modal">

<?php
$subject_code = $row['subject_code'];
$sql2 = "SELECT * FROM `course` WHERE `subject_code` ='$subject_code'";
foreach ($conn->query($sql2) as $row2) {
?>    
    <div class="modal-content">
      <h4>Subject Information</h4>
      <p><?php echo $row2['subject_code'];?></p>
      <p><?php echo $row2['description'];?></p>
      <p><?php echo $row2['trimester'];?></p>
      <p><?php echo $row2['school_year'];?></p>
      <p><?php echo $row['teacher'];?></p>
      
      
    </div>
    <?php } ?>          
    <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn red darken-4">Close</a>
      
    </div>
  </div>
<?php } ?> 

</div>


