

<div class="row">
                <form class="col s12 m12 l12">
                   
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="myApprove" type="text" class="validate">
                            <label for="icon_search">Search</label>
                        </div>
                    
                </form>
            </div>


<script>
$(document).ready(function(){
  $("#myApprove").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTableApprove li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


 <table>
  <thead class="row">
    <th class="col s3">USN</th>
    <th class="col s2">Student</th>
    <th class="col s2">Teacher</th>
    <th class="col s2">Subject</th>
    <th class="col s2">Date Approved</th>
    <th></th>
</thead>
</table>

<ul class="collapsible"style=" display:block;height:50vh;overflow:auto;" id="myTableApprove">
<?php
$sql = "SELECT * FROM table_grade WHERE statuss='done' order by date_upload desc;";
foreach ($conn->query($sql) as $row) {
?>


<?php
$id = $row['id'];
$sql3 = "SELECT usn,fullname, teacher,subject_code FROM old_grades inner join on old_grades.usn = change_grade_request.usn WHERE id=$id";
$result = $conn->query($sql3);



  ?>

    <li style="padding:10px;">
      <div class="collapsible-header row tooltipped" data-position="top" data-tooltip="Show/Hide Grades" 
      style="padding:2px; margin:10px;">
      <div class="col s3"><?php echo $row['usn']; ?></div>
      <div class="col s2"><?php echo $row['fullname']; ?></div>
      <div class="col s2"><?php echo $row['teacher']; ?></div>
      <div class="col s2"><?php echo $row['subject_code']; ?></div>
      <div class="col s2"><?php echo $row['date_upload']; ?></div>
      </div>

      
      <div class="collapsible-body">
      
      <table class="table responsive-table">
  <thead style="background-color:white;">
    
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

 
<tr  style="color:green;">
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
$sql2 = "SELECT * FROM old_grades WHERE id=$id;";

foreach ($conn->query($sql2) as $roww) {
?>

<tr style="color:red;">
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
     
     <tr>
       <td colspan="19">
        <a class="btn red darken-4" target="_blank" href="../user/dean/spreadsheet.php?USN=<?=$row['usn'];?>
        &subject=<?=$row['subject_code'];?>
        &teacher=<?=$row['teacher'];?>
        &fullname=<?=$row['fullname'];?>
        &oldp_q=<?=$roww['p_q'];?>
        &oldp_cs=<?=$roww['p_cs'];?>
        &oldp_ol=<?=$roww['p_ol'];?>
        &oldp_pe=<?=$roww['p_pe'];?>
        &oldm_q=<?=$roww['m_q'];?>
        &oldm_cs=<?=$roww['m_cs'];?>
        &oldm_ol=<?=$roww['m_ol'];?>
        &oldm_me=<?=$roww['m_me'];?>
        &oldf_q=<?=$roww['f_q'];?>
        &oldf_cs=<?=$roww['f_cs'];?>
        &oldf_ol=<?=$roww['f_ol'];?>
        &oldf_fe=<?=$roww['f_fe'];?>
        &oldfg=<?=$roww['fg'];?>
        &oldpg=<?=$roww['pg'];?>
        &oldmg=<?=$roww['mg'];?>
        &oldlec=<?=$roww['lec'];?>
        &oldlab=<?=$roww['lab'];?>
        &oldave=<?=$roww['ave'];?>
        &oldgrade=<?=$roww['grade'];?>
        &newp_q=<?=$row['p_q'];?>
        &newp_cs=<?=$row['p_cs'];?>
        &newp_ol=<?=$row['p_ol'];?>
        &newp_pe=<?=$row['p_pe'];?>
        &newm_q=<?=$row['m_q'];?>
        &newm_cs=<?=$row['m_cs'];?>
        &newm_ol=<?=$row['m_ol'];?>
        &newm_me=<?=$row['m_me'];?>
        &newf_q=<?=$row['f_q'];?>
        &newf_cs=<?=$row['f_cs'];?>
        &newf_ol=<?=$row['f_ol'];?>
        &newf_fe=<?=$row['f_fe'];?>
        &newfg=<?=$row['fg'];?>
        &newpg=<?=$row['pg'];?>
        &newmg=<?=$row['mg'];?>
        &newlec=<?=$row['lec'];?>
        &newlab=<?=$row['lab'];?>
        &newave=<?=$row['ave'];?>
        &newgrade=<?=$row['grade'];?>


        ">View Spreadsheet</a>


      </td>
     </tr>

    <?php } ?>
  </tbody>
</table>


      </div>
    </li>

<?php } ?>

  </ul>


