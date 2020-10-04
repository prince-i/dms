<?php

$sql = "SELECT * FROM upload_teacher where teacher='$user_data' order by date_upload desc" ;
$result = mysqli_query($con, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


        <div class="row">
                <form class="col s12 m12 l12">
                   
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="myInputdocu" type="text" class="validate">
                            <label for="icon_search">Search</label>
                        </div>
                    
                </form>
            </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInputdocu").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable5 li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<table>
<thead class="row">
    <th class="col s1 hide-on-med-and-down">ID</th>
    <th class="col s4">Filename</th>
    <th class="col s3">size (in mb)</th>
    <th class="col s3">Date Upload</th>
    <th class="col s1"></th>
</thead>
</table>

<ul id="myTable5" class="collection"style=" display:block;
  height:50vh;
  overflow:auto;">
  <?php foreach ($files as $file): ?>
    <li  class="collection-item row" style="padding:0px; margin:5px; ">
      <div class="col s1 hide-on-med-and-down"><?php echo $file['id']; ?></div>
      <div class="col s4"><?php echo $file['filename']; ?></div>
      <div class="col s3"><?php echo floatval($file['size'] / 1000) . ' MB'; ?></div>
      <div class="col s3"><?php echo $file['date_upload']; ?></div>
      <div class="col s1">
          <a href="#confirm_download?id=<?=$file['id'];?>" class="modal-trigger btn red darken-4"><i class="material-icons">file_download</i></a>
       
      </div>

      <div class="modal" id="confirm_download?id=<?=$file['id'];?>" style="width:300px;">
        <div class="modal-content">
          <div class="row center">
            <span>Confirm downloading <?=$file['filename'];?>.. </span>
          </div>
        
        </div>
          <div class="modal-footer">
             <a class="waves-effect waves-light btn red darken-4 tooltipped" data-position="left" data-tooltip="Download" href="teacher.php?file_id=<?php echo $file['id'] ?>" style="border-radius: 30px;">
                   <i class="material-icons">file_download</i>
                     </a>
              <a href="#" class="modal-close  waves-effect waves-light btn-flat">Cancel</a>
            </div>
      </div>
    </li>
  <?php endforeach;?>

</ul>



    </div>

