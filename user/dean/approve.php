<?php
include "../../php/conn.php";
require '../../TCPDF-master/tcpdf.php';
             
if(isset($_POST['update'])){
       		$id = $_GET['id'];
			$p_q = $_POST['p_q'];
			$p_cs = $_POST['p_cs'];
			$p_ol = $_POST['p_ol'];
            $p_pe = $_POST['p_pe'];
            $pg = $_POST['pg'];

            $m_q = $_POST['m_q'];
			$m_cs = $_POST['m_cs'];
			$m_ol = $_POST['m_ol'];
            $m_me = $_POST['m_me'];
            $mg = $_POST['mg'];
 
            $f_q = $_POST['f_q'];
			$f_cs = $_POST['f_cs'];
			$f_ol = $_POST['f_ol'];
            $f_fe = $_POST['f_fe'];
            $fg = $_POST['fg'];
    
            $lec = $_POST['lec'];
            $lab = $_POST['lab'];
    
            $ave = $_POST['ave'];
            $grade = $_POST['grade'];
            $status= "done";
        
			$ssql = " UPDATE 
            table_grade SET 
            p_q = '$p_q',
            p_cs = '$p_cs',
            p_ol = '$p_ol',
            p_pe = '$p_pe',
            pg = '$pg',

            m_q = '$m_q',
            m_cs = '$m_cs',
            m_ol = '$m_ol',
            m_me = '$m_me',
            mg = '$mg',
            
            f_q = '$f_q',
            f_cs = '$f_cs',
            f_ol = '$f_ol',
            f_fe = '$f_fe',
            fg = '$fg',
            lec = '$lec',
            lab = '$lab',
            ave = '$ave',
            grade = '$grade',
            statuss='$status' WHERE id = '$id' ";
           $conn->query($ssql);
           if($conn->query($ssql)){
           }
           
         	}
            
             


             
            if (isset($_POST['update'])) {
            //error_reporting(0);
            $id = $_GET['id'];
            $grade = $_POST['grade'];
    
            $sth = $conn->prepare("SELECT * FROM table_grade WHERE id = '$id'");
            $sth->execute();
            $result = $sth->fetchALL();
            foreach($result as $row){
            $id = $row['id'];
            $usn = $row['usn'];
            $fullname = $row['fullname'];
            $date_upload = $row['date_upload'];
            $tuser = $row['teacher'];
            
            $class_number = $row['class_number'];
            $subject_code = $row['subject_code'];
            }
            

            $sth7 = $conn->prepare("SELECT * FROM user WHERE username = '$tuser' ");
            $sth7->execute();
            $result7 = $sth7->fetchALL();
            foreach($result7 as $row){
            $teacher = $row['fullname'];
            }  


            $sth2 = $conn->prepare("SELECT * FROM user WHERE usertype = 4 ");
            $sth2->execute();
            $result2 = $sth2->fetchALL();
            foreach($result2 as $row){
            $registrar = $row['fullname'];
            }  

            
            $sth4 = $conn->prepare("SELECT * FROM user WHERE usertype = 3 ");
            $sth4->execute();
            $result4 = $sth4->fetchALL();
            foreach($result4 as $row){
            $dean = $row['fullname'];
            }  

            $sth3 = $conn->prepare("SELECT * FROM course WHERE subject_code = '$subject_code' ");
            $sth3->execute();
            $result3 = $sth3->fetchALL();
            foreach($result3 as $row){
            $subject_description = $row['description'];
            $trimester = $row['trimester'];
            $school_year = $row['school_year'];
            }  
              }
             class PDF extends TCPDF{
                 
                 //Page header
                 public function Header() {
                     // Logo
                     // $image_file = K_PATH_IMAGES.'sis.png';
                     // $this->Image($image_file, 80, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
                     // // // Set font
                     $this->Ln(15);
                     $this->SetFont('helvetica', 'B', 12);
                     // Title
                     $this->Cell(189, 5, 'AMA Computer College Lipa', 0, 1, 'C');
             
                     $this->SetFont('helvetica', '', 8);
                     $this->Cell(189,3,'Ayala Highway, Balintawak, Lipa City, Batangas 4217',0,1,'C');
                     $this->Cell(189,3,'Tel. Nos. 63-43-312-0157  Fax No. 63-43-981-3034',0,1,'C');
                 }
             }
             $pdf = new PDF('p','mm','A4');
             
             // set document information
             $pdf->SetCreator(PDF_CREATOR);
             $pdf->SetAuthor('thegreatallen99.99');
             $pdf->SetTitle('grade_recommendation');
             $pdf->SetSubject('');
             $pdf->SetKeywords('');
             
             // set default header data
             $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
             
             // set header and footer fonts
             $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
             $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
             
             // set default monospaced font
             $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
             
             // set margins
             $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
             $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
             $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
             
             
             // set auto page breaks
             $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
             
             $pdf->AddPage();
             
             $pdf->Ln(25);
             
             $pdf->SetFont('times','B',10);
             //$pdf->Cell(189,3,'Report as on :- '.$fromDate,0,1,'C');
             $pdf->Ln(7);
             //Set font
             $pdf->SetFont('times','B',10);
             $pdf->Cell(130,5,''.$date_upload.' ',0,0);
             //Set font
             $pdf->SetFont('times','B',10);
             $pdf->Cell(59,5,'',0,1);
             $pdf->Ln(7);
             $pdf->Cell(130,5,'To: '.$registrar.'',0,0);
             $pdf->Ln(7);
             $pdf->Cell(130,5,'Registrar',0,1);
             $pdf->Ln(7);
             $pdf->Cell(189,5,'Dear Sir/madam,',0,1);
             $pdf->Ln(7);
             $pdf->MultiCell(189,5,'            This is to certify that '.$fullname.' has satisfactorily completed the subject '.$subject_code.'- '.$subject_description.' offered last '.$trimester.' AY '.$school_year.' with a Final grade of '.$grade.'.,',0,1);
             $pdf->Ln(10);
             $pdf->Cell(189,5,'Sincerely,',0,1);
             $pdf->Ln(10);
             $pdf->Cell(189,5,''.$dean.'',0,1);
             $pdf->Cell(189,5,'College Dean, AMACC Lipa',0,1);
             
             $pdf->SetCreator(PDF_CREATOR);
             $pdf->SetAuthor('thegreatallen99.99');
             $pdf->SetTitle('grade_recommendation');
             $pdf->SetSubject('');
             $pdf->SetKeywords('');
             
             // set default header data
             $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
             
             // set header and footer fonts
             $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
             $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
             
             // set default monospaced font
             $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
             
             // set margins
             $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
             $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
             $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
             
             
             // set auto page breaks
             $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
             
             $pdf->AddPage();
             
             $pdf->Ln(25);
             
             $pdf->SetFont('times','B',10);
             //$pdf->Cell(189,3,'Report as on :- '.$fromDate,0,1,'C');
             $pdf->Ln(7);
             //Set font
             $pdf->SetFont('times','B',10);
             $pdf->Cell(130,5,''.$date_upload.'',0,0);
             //Set font
             $pdf->SetFont('times','B',10);
             $pdf->Cell(59,5,'',0,1);
             $pdf->Ln(7);
             $pdf->Cell(130,5,'To: '.$registrar.'',0,0);
             $pdf->Ln(7);
             $pdf->Cell(130,5,'Registrar',0,1);
             $pdf->Ln(7);
             $pdf->Cell(189,5,'Re:  Grade Erratum,',0,1);
             $pdf->Ln(7);
             $pdf->MultiCell(189,5,'            This is to request your good office to change the grade of '.$fullname.' enrolled at '.$trimester.' trimester of A.Y. '.$school_year.' subject: '.$subject_description.'. From IC to '.$grade.'.  Presented below the computation of the student’s grade.',0,1);
             
             $pdf->SetFont('times','B',10);
             $pdf->Ln(3);
             $pdf->SetFillColor(224, 235, 255);
             $pdf->Cell(90,5,'LECTURE',1,0,'C',1);
             $pdf->Cell(30,5,'GRADE',1,0,'C',1);
             $pdf->Cell(30,5,'FINAL GRADE',1,1,'C',1);
             $pdf->Ln(0);
             $pdf->Cell(30,5,'QUIZ',1,0,'C',1);
             $pdf->Cell(30,5,'CS',1,0,'C',1);
             $pdf->Cell(30,5,'EXAM',1,0,'C',1);
             $pdf->Cell(30,5,'',1,0,'C',1);
             $pdf->Cell(30,5,'TOTAL',1,0,'C',1);
             $pdf->Ln(5);
             $pdf->Cell(30,5,''.$p_q.'',1,0,'C',1);
             $pdf->Cell(30,5,''.$p_q.'',1,0,'C',1);
             $pdf->Cell(30,5,''.$p_q.'',1,0,'C',1);
             $pdf->Cell(30,5,''.$p_q.'',1,0,'C',1);
             $pdf->Cell(30,5,''.$p_q.'',1,0,'C',1);
             
             $pdf->Ln(10);
             $pdf->SetFillColor(224, 235, 255);
             $pdf->Cell(90,5,'LECTURE',1,0,'C',1);
             $pdf->Cell(30,5,'GRADE',1,0,'C',1);
             $pdf->Cell(30,5,'FINAL GRADE',1,1,'C',1);
             $pdf->Ln(0);
             $pdf->Cell(30,5,'QUIZ',1,0,'C',1);
             $pdf->Cell(30,5,'CS',1,0,'C',1);
             $pdf->Cell(30,5,'EXAM',1,0,'C',1);
             $pdf->Cell(30,5,'',1,0,'C',1);
             $pdf->Cell(30,5,'TOTAL',1,0,'C',1);
             $pdf->Ln(5);
             $pdf->Cell(30,5,''.$p_q.'',1,0,'C',1);
             $pdf->Cell(30,5,''.$p_cs.'',1,0,'C',1);
             $pdf->Cell(30,5,''.$p_pe.'',1,0,'C',1);
             $pdf->Cell(30,5,''.$p_ol.'',1,0,'C',1);
             $pdf->Cell(30,5,''.$pg.'',1,0,'C',1);
             
             
             
             $pdf->Ln(10);
             
             $pdf->Cell(189,5,'Prepared by:,',0, 1);
             $pdf->Ln(10);
             $pdf->Cell(189,5,''.$teacher.'',0,1 );
             $pdf->Cell(189,5,'Instructor',0,1);
             
             $pdf->Cell(189,5,'Prepared by:,',0, 1);
             $pdf->Ln(10);
             $pdf->Cell(189,5,''.$dean.'',0,1 );
             $pdf->Cell(189,5,'College Dean, AMACC Lipa',0,1);
             
             $pdf->Cell(189,5,'Prepared by:,',0,1);
             $pdf->Ln(10);
             $pdf->Cell(189,5,''.$registrar.'',0,1);
             $pdf->Cell(189,5,'Registrar',0,1);
             
             
             $pdf->Cell(189,5,'Prepared by:,',0,1);
             $pdf->Ln(10);
             $pdf->Cell(189,5,'REMELINE P. ALNARU',0,1);
             $pdf->Cell(189,5,'School Director',0,1);
             
             
             $doc_type = 'recom_letter';
             $filename= $usn.'-'.$class_number.'-'.$subject_code.'-'.$trimester.'-'.$school_year.'-recommedation_letter.pdf'; 
             //$pdf->Output('Report-'.$id.'.pdf', 'I');
             //$filename= 'hello'; 
              $pdf->Output(__DIR__ . '../../../uploads/'.$filename.'', 'F');

              $sql5 = "INSERT INTO upload_teacher(filename,downloads,teacher,subject_code,doc_type) VALUES ('$filename',0,'$usn','$subject_code','$doc_type')";             
              $conn->query($sql5);

             
             
             $message = "Grade Updated";
             echo "<SCRIPT type='text/javascript'> //not showing me this
          	alert('$message');
          	window.location.replace(\"http:../dean.php#test2\");
             </SCRIPT>";
                    
          exit();
             
             
             ?>



             
