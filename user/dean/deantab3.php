<div class="row">
                <form class="col s12 m12 l12">
                   
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="searchInputFile" type="text" class="validate">
                            <label for="icon_search">Search</label>
                        </div>
                    
                </form>
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

<ul class="collection" style=" display:block;height:50vh;overflow:auto;" id="TableFile">
  <?php   
    $sql = "SELECT * FROM upload_teacher  order by date_upload desc" ;
    foreach ($conn->query($sql) as $row) {
?>


    <li class="collection-item row" style="padding:10px; margin:5px; ">
    
    <div class= "col s1 hide-on-med-and-down"><?php echo $row['id']; ?></div>
    <div class= "col s3"><?php echo $row['teacher']; ?></div>
    <div class= "col s5"><?php echo $row['filename']; ?></div>
    <div class= "col s2"><?php echo $row['date_upload']; ?></div>
    <div class= "col s1"><a class="waves-effect waves-light btn #263238 red darken-4 tooltipped" data-position="left" data-tooltip="Download" href="teacher.php?file_id=<?php echo $row['id'] ?>" style="border-radius: 30px;"><i class="material-icons">
get_app
</i></a>
</div>
    </li>
    
    <?php } ?>

</ul>
</div>

<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#searchInputFile").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#TableFile li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>