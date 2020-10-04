<?php
$sql = "SELECT * FROM upload_teacher" ;
$result = mysqli_query($con, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

   if (isset($_GET['file_id'])) {
      $id = $_GET['file_id'];
  
      // fetch file to download from database
      $sql = "SELECT * FROM upload_teacher WHERE id=$id";
      $result = mysqli_query($con, $sql);
  
      $file = mysqli_fetch_assoc($result);
      $filepath = '../uploads/' . $file['filename'];
  
      if (file_exists($filepath)) {
          header('Content-Description: File Transfer');
          header('Content-Type: application/octet-stream');
          header('Content-Disposition: attachment; filename=' . basename($filepath));
          header('Expires: 0');
          header('Cache-Control: must-revalidate');
          header('Pragma: public');
          header('Content-Length: ' . filesize('../uploads/' . $file['filename']));
          readfile('../uploads/' . $file['filename']);
  
          // Now update downloads count
          $newCount = $file['downloads'] + 1;
          $updateQuery = "UPDATE upload_teacher SET downloads=$newCount WHERE id=$id";
          mysqli_query($con, $updateQuery);
          exit;
         
      }
      
  
  }
  ?>
  