

<div class="row">
                <form class="col s12 m12 l12">
                   
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="inputAppr" type="text" class="validate">
                            <label for="icon_search">Search</label>
                        </div>
                    
                </form>
            </div>


<table>
  <thead class="row">
    <th class="col s3">USN</th>
    <th class="col s3">Student</th>
    <th class="col s2">Teacher</th>
    <th class="col s2">Subject</th>
    <th class="col s2">Date Requested</th>
</thead>
</table>

<ul class="collapsible" id="myTableAppr" style="display:block;height:50vh;overflow:auto;">
<?php
$sql = "SELECT * FROM table_grade WHERE statuss='dean' order by id desc limit 7;";
foreach ($conn->query($sql) as $row) {
?>


<?php
$id = $row['id'];
$sql3 = "SELECT * FROM change_grade_request WHERE id= '$id' order by id desc limit 7;";
foreach ($conn->query($sql3) as $rowww) {
}?>

    <li>
    
    <div class="collapsible-header row tooltipped" data-position="top" data-tooltip="Show/Hide Grades" 
    style="padding:10px; margin:10px;">
      <div class="col s3"><?php echo $row['usn']; ?></div>
      <div class="col s3"><?php echo $row['fullname']; ?></div>
      <div class="col s2"><?php echo $row['teacher']; ?></div>
      <div class="col s2"><?php echo $row['subject_code']; ?></div>
      <div class="col s2"><?php echo $rowww['date_time']; ?></div>
      </div>
      <div class="collapsible-body">Propose Grade
      
      <table class="table responsive-table">
  <thead class="thead-light">
    
  <tr>
    <th>Quiz</th>
    <th>CS</td>
    <th>OL</th>
    <th>PE</th>
    <th>PG</td>
    <th>Quiz</th>
    <th>CS</th>
    <th>OL</td>
    <th>ME</th>
    <th>MG</th>
    <th>Quiz</th>
    <th>CS</th>
    <th>OL</th>
    <th>FE</td>
    <th>FG</th>
    <th>LEC</th>
    <th>LAB</th>
    
    <th>AVE</th>
    <th>Grade</th>
    <th></th>
    </tr>
  </thead>
  <tbody>

 
<tr style="color:red;">
      <td><?php echo $row['p_q']; ?></td>
      <td><?php echo $row['p_cs']; ?></td>
      <td><?php echo $row['p_ol']; ?></td>
      
      <td><?php echo $row['p_pe']; ?></td>
      <td><?php echo $row['pg']; ?></td>

      <td><?php echo $row['m_q']; ?></td>
      <td><?php echo $row['m_cs']; ?></td>
      <td><?php echo $row['m_ol']; ?></td>
      <td><?php echo $row['m_me']; ?></td>
      <td><?php echo $row['mg']; ?></td>

      
      <td><?php echo $row['f_q']; ?></td>
      <td><?php echo $row['f_cs']; ?></td>
      <td><?php echo $row['f_ol']; ?></td>
      <td><?php echo $row['f_fe']; ?></td>
      <td><?php echo $row['fg']; ?></td>

      <td><?php echo $row['lec']; ?></td>
      <td><?php echo $row['lab']; ?></td>
      
      <td><?php echo $row['ave']; ?></td>
      <td><?php echo $row['grade']; ?></td>
      
      <td></td>
     </tr>




<?php
$id = $row['id'];
$sql2 = "SELECT * FROM change_grade_request WHERE id=$id order by id desc limit 7;";

foreach ($conn->query($sql2) as $roww) {
?>



     <tr style="color:green;">
     <form method="POST" action="dean/approve.php?id=<?php echo $roww['id'];?>">
      <td><input type="hidden" name="p_q" value="<?php echo $roww['p_q']; ?>"><?php echo $roww['p_q']; ?></td>
      <td><input type="hidden" name="p_cs" value="<?php echo $roww['p_cs']; ?>"><?php echo $roww['p_cs']; ?></td>
       <td><input type="hidden" name="p_ol" value="<?php echo $roww['p_ol']; ?>"><?php echo $roww['p_ol']; ?></td>
      <td><input type="hidden" name="p_pe" value="<?php echo $roww['p_pe']; ?>"><?php echo $roww['p_pe']; ?></td>
     
      <td><input type="hidden" name="pg" value="<?php echo $roww['pg']; ?>"><?php echo $roww['pg']; ?></td>

      <td><input type="hidden" name="m_q" value="<?php echo $roww['m_q']; ?>"><?php echo $roww['m_q']; ?></td>
      <td><input type="hidden" name="m_cs" value="<?php echo $roww['m_cs']; ?>"><?php echo $roww['m_cs']; ?></td>
       <td><input type="hidden" name="m_ol" value="<?php echo $roww['m_ol']; ?>"><?php echo $roww['m_ol']; ?></td>
      <td><input type="hidden" name="m_me" value="<?php echo $roww['m_me']; ?>"><?php echo $roww['m_me']; ?></td>
     
      <td><input type="hidden" name="mg" value="<?php echo $roww['mg']; ?>"><?php echo $roww['mg']; ?></td>

      
      <td><input type="hidden" name="f_q" value="<?php echo $roww['f_q']; ?>"><?php echo $roww['f_q']; ?></td>
      <td><input type="hidden" name="f_cs" value="<?php echo $roww['f_cs']; ?>"><?php echo $roww['f_cs']; ?></td>
        <td><input type="hidden" name="f_ol" value="<?php echo $roww['f_ol']; ?>"><?php echo $roww['f_ol']; ?></td>
      <td><input type="hidden" name="f_fe" value="<?php echo $roww['f_fe']; ?>"><?php echo $roww['f_fe']; ?></td>
    
      <td><input type="hidden" name="fg" value="<?php echo $roww['fg']; ?>"><?php echo $roww['fg']; ?></td>
      <td><input type="hidden" name="lec" value="<?php echo $roww['lec']; ?>"><?php echo $roww['lec']; ?></td>
      <td><input type="hidden" name="lab" value="<?php echo $roww['lab']; ?>"><?php echo $roww['lab']; ?></td>

      <td><input type="hidden" name="ave" value="<?php echo $roww['ave']; ?>"><?php echo $roww['ave']; ?></td>
      <td><input type="hidden" name="grade" value="<?php echo $roww['grade']; ?>"><?php echo $roww['grade']; ?></td>
      <td><button class="btn waves-effect waves-light red darken-4" type="submit" name="update">Approve
    <i class="material-icons right">send</i>
  </button>
</td>
      </form>
      </tr>
  </tbody>
</table>


      </div>
    </li>
    <?php } ?>

<?php } ?>

  </ul>


<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#inputAppr").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTableAppr li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
