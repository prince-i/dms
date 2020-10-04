<?php 
// include "../../php/conn.php";
// if (isset($_GET['document_id'])) {
//     $id = $_GET['document_id'];
//     $sth = $conn->prepare("SELECT * FROM upload_teacher WHERE id=$id");
//     $sth->execute();
//     $result = $sth->fetchALL();
//     $filepath = '../uploads/' . $result[$id];

//     if (file_exists($filepath)) {
//         header('Content-Description: File Transfer');
//         header('Content-Type: application/octet-stream');
//         header('Content-Disposition: attachment; filename=' . basename($filepath));
//         header('Expires: 0');
//         header('Cache-Control: must-revalidate');
//         header('Pragma: public');
//         header('Content-Length: ' . filesize('../uploads/' . $file['filename']));
//         readfile('../uploads/' . $file['filename']);

//         // Now update downloads count
//         $newCount = $file['downloads'] + 1;
//         $updateQuery = "UPDATE upload_teacher SET downloads=$newCount WHERE id=$id";
//         mysqli_query($con, $updateQuery);
//         exit;
       
//     }
    

// }



// if (isset($_POST['update'])) {
//             //error_reporting(0);
//             $id = $_GET['id'];
//             $grade = $_POST['grade'];
    
//             $sth = $conn->prepare("SELECT * FROM table_grade WHERE id = '$id'");
//             $sth->execute();
//             $result = $sth->fetchALL();
//             foreach($result as $row){
//             $id = $row['id'];
//             $usn = $row['usn'];
//             $fullname = $row['fullname'];
//             $date_upload = $row['date_upload'];
            
//             $class_number = $row['class_number'];
//             $subject_code = $row['subject_code'];
//             }
            
//             $sth2 = $conn->prepare("SELECT * FROM user WHERE usertype = 4 ");
//             $sth2->execute();
//             $result2 = $sth2->fetchALL();
//             foreach($result2 as $row){
//             $registrar = $row['fullname'];
//             }  

            
//             $sth4 = $conn->prepare("SELECT * FROM user WHERE usertype = 3 ");
//             $sth4->execute();
//             $result4 = $sth4->fetchALL();
//             foreach($result4 as $row){
//             $dean = $row['fullname'];
//             }  

//             $sth3 = $conn->prepare("SELECT * FROM course WHERE subject_code = '$subject_code' and class_number = '$class_number' ");
//             $sth3->execute();
//             $result3 = $sth3->fetchALL();
//             foreach($result3 as $row){
//             $subject_description = $row['description'];
//             $trimester = $row['trimester'];
//             $school_year = $row['school_year'];
//             }  
//               }
//              class PDF extends TCPDF{
                 
//                  //Page header
//                  public function Header() {
//                      // Logo
//                      // $image_file = K_PATH_IMAGES.'sis.png';
//                      // $this->Image($image_file, 80, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
//                      // // // Set font
//                      $this->Ln(15);
//                      $this->SetFont('helvetica', 'B', 12);
//                      // Title
//                      $this->Cell(189, 5, 'AMA Computer College Lipa', 0, 1, 'C');
             
//                      $this->SetFont('helvetica', '', 8);
//                      $this->Cell(189,3,'Ayala Highway, Balintawak, Lipa City, Batangas 4217',0,1,'C');
//                      $this->Cell(189,3,'Tel. Nos. 63-43-312-0157  Fax No. 63-43-981-3034',0,1,'C');
//                  }
//              }
//              $pdf = new PDF('p','mm','A4');
             
//              // set document information
//              $pdf->SetCreator(PDF_CREATOR);
//              $pdf->SetAuthor('thegreatallen99.99');
//              $pdf->SetTitle('grade_recommendation');
//              $pdf->SetSubject('');
//              $pdf->SetKeywords('');
             
//              // set default header data
//              $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
             
//              // set header and footer fonts
//              $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//              $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
             
//              // set default monospaced font
//              $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
             
//              // set margins
//              $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//              $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//              $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
             
             
//              // set auto page breaks
//              $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
             
//              $pdf->AddPage();
             
//              $pdf->Ln(25);
             
//              $pdf->SetFont('times','B',10);
//              //$pdf->Cell(189,3,'Report as on :- '.$fromDate,0,1,'C');
//              $pdf->Ln(7);
//              //Set font
//              $pdf->SetFont('times','B',10);
//              $pdf->Cell(130,5,''.$date_upload.' ',0,0);
//              //Set font
//              $pdf->SetFont('times','B',10);
//              $pdf->Cell(59,5,'',0,1);
//              $pdf->Ln(7);
//              $pdf->Cell(130,5,'To: '.$registrar.'',0,0);
//              $pdf->Ln(7);
//              $pdf->Cell(130,5,'Registrar',0,1);
//              $pdf->Ln(7);
//              $pdf->Cell(189,5,'Dear Sir/madam,',0,1);
//              $pdf->Ln(7);
//              $pdf->MultiCell(189,5,'            This is to certify that '.$fullname.' has satisfactorily completed the subject '.$subject_code.'- '.$subject_description.' offered last '.$trimester.' AY '.$school_year.' with a Final grade of '.$grade.'.,',0,1);
//              $pdf->Ln(10);
//              $pdf->Cell(189,5,'Sincerely,',0,1);
//              $pdf->Ln(10);
//              $pdf->Cell(189,5,''.$dean.'',0,1);
//              $pdf->Cell(189,5,'College Dean, AMACC Lipa',0,1);
             
//              $pdf->SetCreator(PDF_CREATOR);
//              $pdf->SetAuthor('thegreatallen99.99');
//              $pdf->SetTitle('grade_recommendation');
//              $pdf->SetSubject('');
//              $pdf->SetKeywords('');
             
//              // set default header data
//              $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
             
//              // set header and footer fonts
//              $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//              $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
             
//              // set default monospaced font
//              $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
             
//              // set margins
//              $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//              $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//              $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
             
             
//              // set auto page breaks
//              $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
             
//              $pdf->AddPage();
             
//              $pdf->Ln(25);
             
//              $pdf->SetFont('times','B',10);
//              //$pdf->Cell(189,3,'Report as on :- '.$fromDate,0,1,'C');
//              $pdf->Ln(7);
//              //Set font
//              $pdf->SetFont('times','B',10);
//              $pdf->Cell(130,5,'March 20, 2019',0,0);
//              //Set font
//              $pdf->SetFont('times','B',10);
//              $pdf->Cell(59,5,'',0,1);
//              $pdf->Ln(7);
//              $pdf->Cell(130,5,'To: '.$fullname.'',0,0);
//              $pdf->Ln(7);
//              $pdf->Cell(130,5,'Registrar',0,1);
//              $pdf->Ln(7);
//              $pdf->Cell(189,5,'Re:  Grade Erratum,',0,1);
//              $pdf->Ln(7);
//              $pdf->MultiCell(189,5,'            This is to request your good office to change the grade of _________________________ enrolled at _____ trimester of A.Y. 201__-201__ subject: ____________________________. From IP to ______.  Presented below the computation of the student’s grade.',0,1);
             
//              $pdf->SetFont('times','B',10);
//              $pdf->Ln(3);
//              $pdf->SetFillColor(224, 235, 255);
//              $pdf->Cell(90,5,'LECTURE',1,0,'C',1);
//              $pdf->Cell(30,5,'GRADE',1,0,'C',1);
//              $pdf->Cell(30,5,'FINAL GRADE',1,1,'C',1);
//              $pdf->Ln(0);
//              $pdf->Cell(30,5,'QUIZ',1,0,'C',1);
//              $pdf->Cell(30,5,'CS',1,0,'C',1);
//              $pdf->Cell(30,5,'EXAM',1,0,'C',1);
//              $pdf->Cell(30,5,'',1,0,'C',1);
//              $pdf->Cell(30,5,'TOTAL',1,0,'C',1);
//              $pdf->Ln(5);
//              $pdf->Cell(30,5,'',1,0,'C',1);
//              $pdf->Cell(30,5,'',1,0,'C',1);
//              $pdf->Cell(30,5,'',1,0,'C',1);
//              $pdf->Cell(30,5,'',1,0,'C',1);
//              $pdf->Cell(30,5,'',1,0,'C',1);
             
//              $pdf->Ln(10);
//              $pdf->SetFillColor(224, 235, 255);
//              $pdf->Cell(90,5,'LECTURE',1,0,'C',1);
//              $pdf->Cell(30,5,'GRADE',1,0,'C',1);
//              $pdf->Cell(30,5,'FINAL GRADE',1,1,'C',1);
//              $pdf->Ln(0);
//              $pdf->Cell(30,5,'QUIZ',1,0,'C',1);
//              $pdf->Cell(30,5,'CS',1,0,'C',1);
//              $pdf->Cell(30,5,'EXAM',1,0,'C',1);
//              $pdf->Cell(30,5,'',1,0,'C',1);
//              $pdf->Cell(30,5,'TOTAL',1,0,'C',1);
//              $pdf->Ln(5);
//              $pdf->Cell(30,5,'',1,0,'C',1);
//              $pdf->Cell(30,5,'',1,0,'C',1);
//              $pdf->Cell(30,5,'',1,0,'C',1);
//              $pdf->Cell(30,5,'',1,0,'C',1);
//              $pdf->Cell(30,5,'',1,0,'C',1);
             
             
             
//              $pdf->Ln(10);
//              $pdf->Cell(189,5,'Sincerely,',0,1);
//              $pdf->Ln(10);
//              $pdf->Cell(189,5,'Joseph Michael Aramil, MIT',0,1);
//              $pdf->Cell(189,5,'College Dean, AMACC Lipa',0,1);
             
             
             
             
//              $filename= $usn.'-'.$class_number.'-'.$subject_code.'-'.$trimester.'-'.$school_year.'-recommedation_letter.pdf'; 
//              //$pdf->Output('Report-'.$id.'.pdf', 'I');
//              //$filename= 'hello'; 
//              $pdf->Output(__DIR__ . '../../../uploads/'.$filename.'', 'F');

//              $sql5 = "INSERT INTO upload_teacher(filename,downloads,teacher) VALUES ('$filename',0,'$fullname')";
             
//              $conn->query($sql5);

//              $message = 'Grades Updated';
             
             
             
//             echo "<SCRIPT type='text/javascript'> //not showing me this
//              	alert('$message');
//              	window.location.replace(\"http:../dean.php#test2\");
//              </SCRIPT>";
                    
//              exit();
             
             
//              ?>



             