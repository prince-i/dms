<div class="row">
                <form class="col s12 m12 l12">
                   
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="myInputAppr" type="text" class="validate">
                            <label for="icon_search">Search</label>
                        </div>
                    
                </form>
            </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInputAppr").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable4").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<?php

$sql = "SELECT * FROM table_grade WHERE teacher='$user_data' and statuss='done' order by date_upload desc;";
$result = mysqli_query($con, $sql);
$list1 = mysqli_fetch_all($result, MYSQLI_ASSOC);

 ?>
 
 <table>
<thead class="row">
    <th class="col s3">USN</th>
    <th class="col s3">Fullname</th>
    <th class="col s3">Subject Code</th>
    <th class="col s3">Date Approved</th>

</thead>
</table>

<ul class="collapsible"style=" display:block;
  height:50vh;
  overflow:auto;">
<?php foreach ($list1 as $row): ?>
 <li id="myTable4">
<style>
.collapsible-header:hover { 
  background-color:grey;
}
</style>
 
    <div class="collapsible-header row tooltipped" data-position="bottom" data-tooltip="Show/Hide Grades" style="padding:2px; margin:10px;">
      <div class="col s3"><?php echo $row['usn']; ?></div>
      <div class="col s3"><?php echo $row['fullname']; ?></div>
      <div class="col s3"><?php echo $row['subject_code']; ?></div>
      <div class="col s3"><?php echo $row['date_upload']; ?></div>
      
      </div>
      <div class="collapsible-body">
      
      
  <table class="table">
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



  <tr style="color:green">
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
$sql2 = "SELECT * FROM old_grades WHERE id=$id order by id desc limit 7;";
$result2 = mysqli_query($con, $sql2);
$list2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
foreach ($list2 as $roww): ?>

    <tr style="color:red">
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
    <?php endforeach; ?>


  </tbody>
</table>
      
      </div>
    </li>

    <?php endforeach; ?>
    
  </ul>

