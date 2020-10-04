<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/material-design-icons/iconfont/material-icons.css">
    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/css?family=Barrio" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Login</title>

</head>
<style>
    body {
      font-family:'Montserrat';
      background-color:white;
     }
    nav {
      font-size:4vh;
     
    }
    .logo{
      width:200px;
      height:200px;
      border-radius:10px;
    }


  </style>


<body>
</div>
  <main class="center">
    <div class="navbar-fixed">
      <nav class="nav-wrapper blue-grey darken-4">
        <ul>
          <li>&nbsp;</li>
          <li>AMAICSYS</li>
        </ul>
      </nav>
    </div>
     

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row">

          <form class="col s12" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='username' id='username' />
                <label for='username'>Enter your Username</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Enter your password</label>
              </div>
              
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='login' class='btn btn-large waves-effect red darken-4' style="border-radius: 30px;">Login</button>
              </div>
            </center>
          </form>
        </div>
      </div>
      <div class="row">
        <img class="logo" class="responsive-img" src="img/ama logo.jpeg"/>
      </div>
  	<div id="loading">
		<p class="center"><b>Loading list...</b></p>
	</div>
<div class="row container" id="content">
<table class="striped">
<h3>List of students with IC grades</h3>
<th>USN</th>
<th>Teacher</th>
<th>Academic Type</th>
<th>Upload Date</th>
<?php
	require_once 'php/conn.php';
	$x = "SELECT *from  old_grades WHERE grade = 'IC'";
	$stmt = $conn->prepare($x);
	$stmt->execute();
	$result = $stmt->fetchALL();
	foreach($result as $prev){
?>	
	<tr>
		<td><?=$prev['usn'];?></td>	
		<td><?=$prev['teacher'];?></td>
		<td><?=$prev['sheet'];?></td>
		<td><?=$prev['date_time'];?></td>
	</tr>
	
<?php

}
?>
</table>
</div>

	
  </main>

            <?php
                        require_once 'php/check.php';
                    ?>

<script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/materialize-css/dist/js/materialize.min.js" type="text/javascript"></script>
  <script src="js/material.js"></script>
  <script src="js/login.js"></script>
	<script>
		document.querySelector("#content").style.display = "none";
		document.querySelector("#loading").style.display = "block";
		setTimeout(function(){
		document.querySelector("#content").style.display = "block";
		document.querySelector("#loading").style.display = "none";
	},4000);
		</script>

</html>