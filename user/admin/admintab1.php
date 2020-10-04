<?php

$sql = "SELECT * FROM upload_teacher  order by id desc" ;
$statement = $conn->prepare($sql);
$statement->execute();
$files = $statement->fetchAll(PDO::FETCH_OBJ);
?>
        <div class="row">
            
                   
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="inputDoc" type="text" class="validate">
                            <label for="icon_search">Search</label>
                        </div>
                    
             
            </div>


<table>
<thead class="row">
    <th class="col s2 hide-on-med-and-down">ID</th>
    <th class="col s3">User</th>
    <th class="col s3">Filename</th>
    <th class="col s3">Date Upload</th>
    <th class="col s1"></th>
</thead>
</table>
<ul class="collection" style=" display:block;
  height:50vh;
  overflow:auto;" id="myTableDoc">
  <?php foreach ($files as $file): ?>

  
<style>
.collection-item:hover { 
  background-color:#D3D3D3;
}
</style>
  <li class="collection-item row" style="padding:0px; margin:5px; ">
      <div class="col s2 hide-on-med-and-down"><?= $file->id; ?></div>
      <div class="col s3"><?= $file->teacher; ?></div>
      <div class="col s3"><?= $file->filename; ?></div>
      <div class="col s3"><?= $file->date_upload; ?></div>
      <div class= "col s1"><a class="waves-effect waves-light btn #263238 red darken-4 tooltipped" data-position="left" data-tooltip="Download" href="teacher.php?file_id=<?=$file->id;?>"><i class="material-icons">
get_app
</i></a>
</div>
</li>
  <?php endforeach;?>

</li>





    </div>


      
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
  $("#inputDoc").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTableDoc li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

