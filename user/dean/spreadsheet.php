<?php
	
	$servername = "localhost";
	$password = "";
	$username ="root";

	 try {
        $conn = new PDO("mysql:host=$servername;dbname=ama_online_grade_completion",$username,$password);
    }catch(PDOException $e){
        echo $sql ."No connection detected.".$e->getMessage();
    }

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

	$date_today = date("F j, Y");

	if(isset($_GET['USN'])){
		$usn = $_GET['USN'];


	}
	if(isset($_GET['teacher'])){
		$teacher_id = $_GET['teacher'];
		$fetch_teacher_name = "SELECT *from user where username = '$teacher_id' and usertype = 2 LIMIT 1";
		$stmt = $conn->prepare($fetch_teacher_name);
		$stmt->execute();
		$result = $stmt->fetchALL();
		foreach($result as $tr){
			$teacher_name = $tr['fullname'];
		}
	}
	$subj_code = $_GET['subject'];
	$fullname = $_GET['fullname'];

	$oldp_q = $_GET['oldp_q'];
	$oldp_cs = $_GET['oldp_cs'];
	$oldp_ol = $_GET['oldp_ol'];
	$oldp_pe = $_GET['oldp_pe'];
	$oldpg = $_GET['oldpg'];
	$oldm_q = $_GET['oldm_q'];
	$oldm_cs = $_GET['oldm_cs'];
	$oldm_ol = $_GET['oldm_ol'];
	$oldm_me = $_GET['oldm_me'];
	$oldmg = $_GET['oldmg'];
	$oldf_q = $_GET['oldf_q'];
	$oldf_cs = $_GET['oldf_cs'];
	$oldf_ol = $_GET['oldf_ol'];
	$oldf_fe = $_GET['oldf_fe'];
	$oldfg = $_GET['oldfg'];
	$oldlec = $_GET['oldlec'];
	$oldlab = $_GET['oldlab'];
	$oldave = $_GET['oldave'];
	$oldgrade = $_GET['oldgrade'];


	$newp_q = $_GET['newp_q'];
	$newp_cs = $_GET['newp_cs'];
	$newp_ol = $_GET['newp_ol'];
	$newp_pe = $_GET['newp_pe'];
	$newpg = $_GET['newpg'];
	$newm_q = $_GET['newm_q'];
	$newm_cs = $_GET['newm_cs'];
	$newm_ol = $_GET['newm_ol'];
	$newm_me = $_GET['newm_me'];
	$newmg = $_GET['newmg'];
	$newf_q = $_GET['newf_q'];
	$newf_cs = $_GET['newf_cs'];
	$newf_ol = $_GET['newf_ol'];
	$newf_fe = $_GET['newf_fe'];
	$newfg = $_GET['newfg'];
	$newlec = $_GET['newlec'];
	$newlab = $_GET['newlab'];
	$newave = $_GET['newave'];
	$newgrade = $_GET['newgrade'];


	$fetch_officials_dean = "SELECT fullname from user where usertype = 3";
	$stmt = $conn->prepare($fetch_officials_dean);
	$stmt->execute();
	$result = $stmt->fetchALL();
	foreach ($result as $user) {
		$dean_name = $user['fullname'];
	}


	$fetch_officials_registrar = "SELECT fullname from user where usertype = 4";
	$stmt = $conn->prepare($fetch_officials_registrar);
	$stmt->execute();
	$result = $stmt->fetchALL();
	foreach ($result as $user) {
		$reg_name = $user['fullname'];
	}


	$fetch_officials_sd = "SELECT fullname from user where usertype = 6";
	$stmt = $conn->prepare($fetch_officials_sd);
	$stmt->execute();
	$result = $stmt->fetchALL();
	foreach ($result as $user) {
		$sd_name = $user['fullname'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Spreedsheet</title>
	    <link href="https://fonts.googleapis.com/css?family=Lateef|Montserrat" rel="stylesheet">
	<style>
		img {
			width: 50px;
			height:50px;
		}
		table{
			width:100%;
			border-collapse: collapse;
			font-family: Montserrat;

		}
		#printBtn{
			padding:10px;
			font-family: montserrat;
			font-weight:bold;
			border-radius:8px;
		
		}

		.third{
			text-align: center;
		}
		.seventhrow{
			text-align: center;
			font-weight: bold;
		}
		.eight{
			text-align: center;
			height:60px;
		}
		.nine {
			text-align: center;
		}
	</style>
</head>
<body>

<table border="1" cellpadding="5px">
  <tr>
    <th><img src="ama logo.jpeg"/></th>
    <th colspan="14" style="font-size: 40px;color:maroon;font-weight: bold;">AMA COMPUTER COLLEGES LIPA</th>
    <th>DATE:</th>
    <th colspan="4"><?=$date_today;?></th>
  </tr>
  <tr>
    <td>USN: <?=$usn;?></td>
    <td colspan="10">NAME: <?=$fullname;?></td>
    <td colspan="4">SUBJECT:</td>
    <td>TEACHER: </td>
    <td colspan="4"><?=$teacher_name;?></td>
  </tr>


  <tr class="third">
    <td></td>
    <td colspan="5">PRELIMS</td>
    <td colspan="5">MIDTERM</td>
    <td colspan="5">FINALS</td>
    <td>LEC</td>
    <td>LAB</td>
    <td>AVERAGE</td>
    <td>GRADE</td>
  </tr>

 <tr>
    <td>--</td>
    <td>Quiz</td>
    <td>CS</td>
    <td>OL</td>
    <td>PExam</td>
    <td>PG</td>
    <td>Quiz</td>
    <td>CS</td>
    <td>OL</td>
    <td>MExam</td>
    <td>MG</td>
    <td>Quiz</td>
    <td>CS</td>
    <td>OL</td>
    <td>FExam</td>
    <td>FG</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>PREVIOUS GRADES</td>
    <td><?=$oldp_q;?></td>
    <td><?=$oldp_cs;?></td>
    <td><?=$oldp_ol;?></td>
    <td><?=$oldp_pe;?></td>
    <td><?=$oldpg;?></td>
    <td><?=$oldm_q;?></td>
    <td><?=$oldm_cs;?></td>
    <td><?=$oldm_ol;?></td>
    <td><?=$oldm_me;?></td>
    <td><?=$oldmg;?></td>
    <td><?=$oldf_q;?></td>
    <td><?=$oldf_cs;?></td>
    <td><?=$oldf_ol;?></td>
    <td><?=$oldf_fe;?></td>
    <td><?=$oldfg;?></td>
    <td><?=$oldlec;?></td>
    <td><?=$oldlab;?></td>
    <td><?=$oldave;?></td>
    <td><?=$oldgrade;?></td>
  </tr>


  <tr>
    <td>UPDATED GRADES</td>
    <td><?=$newp_q;?></td>
    <td><?=$newp_cs;?></td>
    <td><?=$newp_ol;?></td>
    <td><?=$newp_pe;?></td>
    <td><?=$newpg;?></td>
    <td><?=$newm_q;?></td>
    <td><?=$newm_cs;?></td>
    <td><?=$newm_ol;?></td>
    <td><?=$newm_me;?></td>
    <td><?=$newmg;?></td>
    <td><?=$newf_q;?></td>
    <td><?=$newf_cs;?></td>
    <td><?=$newf_ol;?></td>
    <td><?=$newf_fe;?></td>
    <td><?=$newfg;?></td>
    <td><?=$newlec;?></td>
    <td><?=$newlab;?></td>
    <td><?=$newave;?></td>
    <td><?=$newgrade;?></td>
  </tr>
  <tr class="seventhrow">
    <td colspan="4">Teacher</td>
    <td colspan="6">College Dean</td>
    <td colspan="6">Registrar</td>
    <td colspan="4">School Director</td>
  </tr>
  <tr class="eight">
    <td colspan="4"><?=$teacher_name;?></td>
    <td colspan="6"><?=$dean_name;?></td>
    <td colspan="6"><?=$reg_name;?></td>
    <td colspan="4"><?=$sd_name;?></td>
  </tr>
  <tr>
    <td colspan="20" class="nine">
    	Automatically Generated from AMAICSys this
    	<?php
    		 echo date('l jS \of F Y h:i:s A');
    		 echo " | ";
    		 echo $_SERVER['REMOTE_ADDR'];
    	?>
    </td>
  </tr>
</table>
<button id="printBtn" onclick="printpage()">Print</button>
</body>
</html>
<script>
	function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printBtn");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
    }
</script>