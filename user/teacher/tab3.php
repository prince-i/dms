
    <style>
.collapsible-header:hover { 
  background-color:grey;
}
</style>
<div class="row">
                <form class="col s12 m12 l12">
                   
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="myInputPend" type="text" class="validate">
                            <label for="icon_search">Search</label>
                        </div>
                    
                </form>
            </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInputPend").on("keyup", function() {
    var value = $(this).val().toLowerCase();
      $("#myTablePend li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<table>
  <thead class="row">
    <th class="col s3">USN</th>
    <th class="col s3">Name</th>
    <th class="col s3">Subject</th>
    <th class="col s3">Date Requested</th>
</thead>
</table>

<?php

$sql = "SELECT * FROM table_grade WHERE teacher='$user_data' and grade='IC' and statuss='dean'order by date_upload desc;";
$result = mysqli_query($con, $sql);
$list1 = mysqli_fetch_all($result, MYSQLI_ASSOC);

 ?>
 

<ul id="myTablePend" class="collapsible"style=" display:block;
  height:50vh;
  overflow:auto;">
<?php foreach ($list1 as $row): ?>
 
    <li >


 
    <div class="collapsible-header row tooltipped" data-position="top" data-tooltip="Show/Hide Grades" style="padding:10px; margin:10px;">
      <div class="col s3"><?php echo $row['usn']; ?></div>
      <div class="col s3"><?php echo $row['fullname']; ?></div>
      <div class="col s3"><?php echo $row['subject_code']; ?></div>
      <div class="col s3"><?php echo $row['date_upload']; ?></div>
      
      </div>
      <div class="collapsible-body">
      
      
  <table class="table responsive-table">
  <p>Propose Grade</p>
  <thead class="thead-light">
    
  <tr>
    <th>Quiz</th>
    <th>CS</td>
    <th>PE</th>
    <th>OL</th>
    <th>PG</td>
    
    <th>Quiz</th>
    <th>CS</th>
    <th>ME</th>
    <th>OL</td>
    <th>MG</th>
    
    <th>Quiz</th>
    <th>CS</th>
    <th>FE</td>
    <th>OL</th>
    <th>FG</th>
    
    <th>LEC</th>
    <th>LAB</th>
    
    <th>AVE</th>
    <th>Grade</th>
    </tr>
  </thead>
  <tbody>



  <tr style="color:red">
      <td><?php echo $row['p_q']; ?></td>
      <td><?php echo $row['p_cs']; ?></td>
      <td><?php echo $row['p_pe']; ?></td>
      <td><?php echo $row['p_ol']; ?></td>
      <td><?php echo $row['pg']; ?></td>

      <td><?php echo $row['m_q']; ?></td>
      <td><?php echo $row['m_cs']; ?></td>
      <td><?php echo $row['m_me']; ?></td>
      <td><?php echo $row['m_ol']; ?></td>
      <td><?php echo $row['mg']; ?></td>

      
      <td><?php echo $row['f_q']; ?></td>
      <td><?php echo $row['f_cs']; ?></td>
      <td><?php echo $row['f_fe']; ?></td>
      <td><?php echo $row['f_ol']; ?></td>
      <td><?php echo $row['fg']; ?></td>
      
      <td><?php echo $row['lec']; ?></td>
      <td><?php echo $row['lab']; ?></td>

      <td><?php echo $row['ave']; ?></td>
      <td><?php echo $row['grade']; ?></td>
      
      
    </tr>

<?php 
$id = $row['id'];
$sql2 = "SELECT * FROM change_grade_request WHERE id=$id order by id desc limit 7;";
$result2 = mysqli_query($con, $sql2);
$list2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
foreach ($list2 as $roww): ?>

    <tr style="color:green">
      <td><?php echo $roww['p_q']; ?></td>
      <td><?php echo $roww['p_cs']; ?></td>
      <td><?php echo $roww['p_pe']; ?></td>
      <td><?php echo $roww['p_ol']; ?></td>
      <td><?php echo $roww['pg']; ?></td>

      <td><?php echo $roww['m_q']; ?></td>
      <td><?php echo $roww['m_cs']; ?></td>
      <td><?php echo $roww['m_me']; ?></td>
      <td><?php echo $roww['m_ol']; ?></td>
      <td><?php echo $roww['mg']; ?></td>

      
      <td><?php echo $roww['f_q']; ?></td>
      <td><?php echo $roww['f_cs']; ?></td>
      <td><?php echo $roww['f_fe']; ?></td>
      <td><?php echo $roww['f_ol']; ?></td>
      <td><?php echo $roww['fg']; ?></td>
    
      <td><?php echo $roww['lec']; ?></td>
      <td><?php echo $roww['lab']; ?></td>

      <td><?php echo $roww['ave']; ?></td>
      <td><?php echo $roww['grade']; ?></td>
      
    </tr>
    <?php endforeach; ?>

  </tbody>
</table>
      
      </div>
    </li>

    <?php endforeach; ?>
    
  </ul>

