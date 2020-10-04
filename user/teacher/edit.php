
<?php
include "../../php/config.php";
	if(isset($_POST['edit'])){
    
    		$id = $_GET['id'];
			$p_q = $_POST['p_q'];
			$p_cs = $_POST['p_cs'];
			$p_pe = $_POST['p_pe'];
            $p_ol = $_POST['p_ol'];
            if(empty($p_ol)){
                $pg = ($p_q * 0.4) + ($p_cs * 0.1) + ($p_pe * 0.5);
                $p_ol = 0;

            }else{
                $pg = ((($p_q * 0.4) + ($p_cs * 0.1) + ($p_pe * 0.5)) * 0.5) + ($p_ol * 0.5) ;
        }
            $m_q = $_POST['m_q'];
			$m_cs = $_POST['m_cs'];
			$m_me = $_POST['m_me'];
            $m_ol = $_POST['m_ol'];
              if(empty($m_ol)){
                $mg = ($m_q * 0.4) + ($m_cs * 0.1) + ($m_me * 0.5);
                $m_ol = 0;
            }else{
                $mg = ((($m_q * 0.4) + ($m_cs * 0.1) + ($m_me * 0.5)) * 0.5) + ($m_ol * 0.5) ;
        }
 
            $f_q = $_POST['f_q'];
			$f_cs = $_POST['f_cs'];
			$f_fe = $_POST['f_fe'];
            $f_ol = $_POST['f_ol'];
           if(empty($p_ol)){
                $fg = ($f_q * 0.4) + ($f_cs * 0.1) + ($f_fe * 0.5);
                $f_ol = 0;
            }else{
                $fg = ((($f_q * 0.4) + ($f_cs * 0.1) + ($f_fe * 0.5)) * 0.5) + ($f_ol * 0.5) ;
        }
            $lec = ($pg * 0.3) + ($mg * 0.3) + ($fg * 0.4);
            $lab = $_POST['lab'];
            if(empty($lab)){
                     $ave = $lec ;
            }else{
                    $ave = ($lec * 0.6) + ($lab * 0.4);
            }

            if($ave >= 96){
                $grade = "A+";
            }elseif($ave >= 91){
                $grade = "A";
            }elseif($ave >= 86){
                $grade = "A-";
            }elseif($ave >= 81){
                $grade = "B+";
            }elseif($ave >= 75){
                $grade = "B";
            }elseif($ave >= 69){
                $grade = "B-";
            }elseif($ave >= 63){
                $grade = "C+";
            }elseif($ave >= 57){
                $grade = "C";
            } elseif($ave >= 50){
                $grade = "C-";
            }
                     
            
    $status = "dean";

                $sql2 = "INSERT INTO change_grade_request (id,p_q,p_cs,p_pe,p_ol,pg,m_q,m_cs,m_me,m_ol,mg,f_q,f_cs,f_fe,f_ol,fg,lec,lab,ave,grade)
                 VALUES ('$id','$p_q','$p_cs','$p_pe','$p_ol','$pg','$m_q','$m_cs','$m_me','$m_ol','$mg','$f_q','$f_cs','$f_fe','$f_ol','$fg','$lec','$lab','$ave','$grade')";
                if (mysqli_query($con, $sql2)) {
                    $message = 'Request sent';

                    echo "<SCRIPT type='text/javascript'> //not showing me this
                        alert('$message');
                        window.location.replace(\"http:../teacher.php#tab3\");
                    </SCRIPT>";
                }
                $sql3 = "UPDATE table_grade SET 
                 statuss = '$status' WHERE id = '$id'";
               
                if($con->query($sql3) === TRUE) {
                }
                  
    }
    
?>

