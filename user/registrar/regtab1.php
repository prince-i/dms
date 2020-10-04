<div class="row">
          
                   
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="regSearch" type="text">
                            <label for="icon_search">Search</label>
                        </div>
            
            </div>

<table>
<thead class="row">
    <th class= "col s1 hide-on-med-and-down">ID</th>
    <th class= "col s3">Owner</th>
    <th class= "col s5">Filename</th>
    <th class= "col s2">Date Created</th>
    <th class= "col s1"></th>
    
</thead>
</table>

<ul class="collection" id="tableDoc" style=" display:block;
  height:50vh;
  overflow:auto;" >
  <?php   
    $sql = "SELECT * FROM upload_teacher WHERE doc_type = 'recom_letter' order by date_upload desc" ;
    foreach ($conn->query($sql) as $row) {
?>

<style>
.collection-item:hover { 
  background-color:grey;
}
</style>
    <li class="collection-item row"
    style="padding:0px; margin:5px; ">
    
    <div class= "col s1 hide-on-med-and-down"><?php echo $row['id']; ?></div>
    <div class= "col s3"><?php echo $row['teacher']; ?></div>
    <div class= "col s5"><?php echo $row['filename']; ?></div>
    <div class= "col s2"><?php echo $row['date_upload']; ?></div>
    <div class= "col s1"><a class="waves-effect waves-light btn #263238 red darken-4 tooltipped" data-position="left" data-tooltip="Download" href="teacher.php?file_id=<?php echo $row['id'] ?>"><i class="material-icons">
get_app
</i></a>
</div>
    </li>
    
    <?php } ?>

</ul>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#regSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tableDoc li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>