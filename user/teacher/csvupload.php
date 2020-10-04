<?php
   if(isset($_POST['but_import'])){
      $class_number = $_POST['class_number'];
      $subject_code = $_POST['subject_code'];
   
      $dates = date('m-d-y');
      $target_dir = "../uploads/";
      $filename = $_FILES['importfile']['name'];
      $file = $_FILES['importfile']['tmp_name'];
      $size = $_FILES['importfile']['size'];
      $doc_type = 'grade_sheet';
      $temp = explode(".", $filename);
      $newfilename = $dates."-".$subject_code ."-".$class_number.'.' . end($temp);
      //move_uploaded_file($_FILES["importfile"]["tmp_name"], "../uploads/" . $newfilename);
  
      $target_file = $target_dir . basename($_FILES["importfile"]["name"]);
   
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   
      $uploadOk = 1;
      if($imageFileType != "csv" ) {
         echo "<script type='text/javascript'>alert('invalid file, CSV file format only');</script>";
        $uploadOk = 0;
      }
   
      if (file_exists($target_file)) {
         echo "<script type='text/javascript'>alert('Sorry, file already exists.');</script>";
         $uploadOk = 0;
     }

      if ($uploadOk != 0) {
         
      $teacher = $_POST['teacher'];
         if (move_uploaded_file($_FILES["importfile"]["tmp_name"],  $target_dir . $newfilename)) {
            $sql = "INSERT INTO upload_teacher (filename, size, downloads,teacher,doc_type) VALUES ('$newfilename', '$size', 0,'$teacher','$doc_type')";
            if (mysqli_query($con, $sql)) {
               $message = 'File uploaded successfully';

               echo "<SCRIPT type='text/javascript'> //not showing me this
                   alert('$message');
                   window.location.replace(\"http:teacher.php#tab2\");
               </SCRIPT>";
              }
           // Checking file exists or not
           $target_file = $target_dir . $newfilename;
           $fileexists = 0;
           if (file_exists($target_file)) {
              $fileexists = 1;
              
           }
           if ($fileexists == 1 ) {
            //echo "1";
              // Reading file
              $file = fopen($target_file,"r");
              $i = 0;
   
              $importData_arr = array();
                          
              while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($data);
   
                for ($c=0; $c < $num; $c++) {
                   $importData_arr[$i][] = $data[$c];
                   //echo "2";
                }
                $i++;
              }
              fclose($file);
   
              $skip = 0;
              // insert import data
              foreach($importData_arr as $data){
                 if($skip > 3){
                    $usn = $data[0];
                    $fullname = $data[1];
                    $p_q = $data[2];
                    $p_cs = $data[3];
                    $p_pe = $data[4];
                    $p_ol = $data[5];
                    $pg = $data[6];

                    $m_q = $data[7];
                    $m_cs = $data[8];
                    $m_me = $data[9];
                    $m_ol = $data[10];
                    $mg = $data[11];
                    
                    $f_q = $data[12];
                    $f_cs = $data[13];
                    
                    $f_fe = $data[14];
                    $f_ol = $data[15];
                    $fg = $data[16];
                    $lec = $data[17];
                    $lab = $data[18];
                    
                    $ave = $data[19];
                    $grade = $data[20];
                    $sheet = "";
                    
                     if ($lec == null && $lab == null && $p_ol == null && $m_ol == null && $f_ol == null){
                        $sheet = "f2f";
                     }else if($lec == null && $lab == null){
                        $sheet = "f2fol";
                     }else if ($p_ol == null && $m_ol == null && $f_ol == null) {
                        $sheet = "f2fleclab";
                     } else {
                        $sheet = "f2folleclab";
                     }
                     
   
                    $teacher =  $_POST['teacher'];
                    $class_number = $_POST['class_number'];
                    $subject_code = $_POST['subject_code'];
                    $status = "teacher";

                  //    // Checking duplicate entry
                  //   $sql = "select count(*) as allcount from table_grade where usn='" . $usn . "' and fullname='" . $fullname . "' and  pg='" . $pg . "' and mg='" . $mg . "' ";
                  //   $retrieve_data = mysqli_query($con,$sql);
                  //   $row = mysqli_fetch_array($retrieve_data);
                  //   $count = $row['allcount'];
                    
                  //   if($count == 0){
                  //      // Insert record

                  
                  
                       $insert_query = "insert into table_grade(usn,fullname,p_q,p_cs,
                       p_pe,p_ol,pg,m_q,m_cs,m_me,m_ol,
                       mg,f_q,f_cs,f_fe,f_ol,fg,lec,lab,ave,grade,sheet,teacher,class_number,subject_code,statuss) 
                       values('".$usn."','".$fullname."','".$p_q."','".$p_cs."'
                       ,'".$p_pe."','".$p_ol."','".$pg."','".$m_q."','".$m_cs."','".$m_me."','".$m_ol."'
                       ,'".$mg."','".$f_q."','".$f_cs."','".$f_fe."','".$f_ol."','".$fg."','".$lec."','".$lab."',
                       '".$ave."','".$grade."','".$sheet."','".$teacher."','".$class_number."',
                       '".$subject_code."','".$status."')";
                       mysqli_query($con,$insert_query);


                       
                       $insert_query2 = "insert into old_grades(usn,fullname,p_q,p_cs,p_pe,p_ol,
                       pg,m_q,m_cs,m_me,m_ol,
                       mg,f_q,f_cs,f_fe,f_ol,fg,lec,lab,ave,grade,sheet,teacher,statuss) 
                       values('".$usn."','".$fullname."','".$p_q."','".$p_cs."'
                       ,'".$p_pe."','".$p_ol."','".$pg."','".$m_q."','".$m_cs."','".$m_me."','".$m_ol."'
                       ,'".$mg."','".$f_q."','".$f_cs."','".$f_fe."','".$f_ol."','".$fg."','".$lec."','".$lab."',
                       '".$ave."','".$grade."','".$sheet."','".$teacher."','".$status."')";
                       mysqli_query($con,$insert_query2);
                  //   }
                 }
                 $skip++;
              }
            
            }
   
         } 
          
         
      }
   }

   $sql = "SELECT * FROM upload_teacher" ;
   $result = mysqli_query($con, $sql);
   
   
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
    