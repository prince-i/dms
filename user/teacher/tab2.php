<div class="row">
                <form class="col s12 m12 l12">
                   
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="myInput" type="text" class="validate">
                            <label for="icon_search">Search</label>
                        </div>
                    
                </form>
            </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTableIC tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


<?php
    $sql = "SELECT * FROM table_grade
    WHERE teacher='$user_data' and grade='IC' and statuss='teacher';";
    $result = mysqli_query($con, $sql);
    $grades = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>  


<table class="responsive-table container">
  <thead class="row">
    <th>ID</th>
    <th>USN</th>
    <th>Fullname</th>
    <th>Subject Code</th>
    <th>Grade</th>
    <th></th>
  </thead>
  <tbody id="myTableIC" >
    <?php foreach($grades as $grade)
      {

        ?>
          <tr>
            <td><?=$grade['id'];?></td>
            <td><?=$grade['usn'];?></td>
            <td><?=$grade['fullname'];?></td>
            <td><?=$grade['subject_code'];?></td>
            <td><?=$grade['grade'];?></td>
            <td>
                <a class="waves-effect waves-light btn red darken-4 modal-trigger tooltipped" data-position="left"
        data-tooltip="Update" href="#modalview<?php echo $grade['id']; ?>"><i class="material-icons">update</i></a>
         <?php include "edit_delete_modal.php"; ?>
      </td>
          </tr>
    <?php
      }
    ?>
  </tbody>
</table>




