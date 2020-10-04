      
<?php
    $sql = "SELECT * FROM `course`";
    $result = mysqli_query($con, $sql);
    $course = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<style>


  .pic{
    width:20rem;
    height: 10rem;
    border-radius: 100px;
  }
  .modal-trigger{
    border-radius: 100px;
  }
</style>

<body>

<div class="container col s12">
    <div id="card" class="card horizontal">
          <div class="card-stacked">
            <div class="card-content" style="font-weight:bold;">
             <img class="pic" src="../img/excel.png"/>
              <h6>Download CSV Templates here.</h6>
                
                <ul>
                  <li><a href="../template/f2f_only.xlsx">Face to Face subject only</a></li>
                  <li><a href="../template/lec_f2f.xlsx">Subject with Lec and Lab</a></u></li>
                  <li><a href="../template/lec_ol.xlsx">Subject with Lecture and Online</a> </li>
                  <li><a href="../template/lab_ol.xlsx">Subject with Online, Lecture & Lab</a></li>
                </ul>
            </div>
            <div class="card-action">
               <a class="btn btn-large red darken-4 modal-trigger tooltipped" data-position="right" data-tooltip="Add CSV gradesheet" href="#addcsv"><i class="material-icons">add</i></a>

            </div>
      </div>
    </div>
  </div>
            
</div>

    <!-- Modal Structure -->
    <div id="addcsv" class="modal modal-fixed-footer">
    <form method="post" action="" enctype="multipart/form-data" id="import_form">
        <div class="modal-content small">
        
        <div class="row">
            
        <div class="input-field col s6">
            
  <select class="browser-default" id="subject_code" name="subject_code">
    <option value="" disabled selected>Subject Code</option>
    
    <?php foreach ($course as $c): ?>
    <option value="<?php echo $c['subject_code']; ?>"><?php echo $c['subject_code']; ?></option>
    <?php endforeach;?>

  </select>

            </div>
            <div class="input-field col s6">
  <select class="browser-default" id="class_number" name="class_number">
    <option value="" disabled selected>Class Number</option>
    
    <?php foreach ($course as $c): ?>
    <option value="<?php echo $c['class_number']; ?>"><?php echo $c['class_number']; ?></option>
    <?php endforeach;?>

  </select>

            </div>
        </div>

        <div class="file-field input-field">
            <div class="btn red darken-4">
                <span>File</span>
                <input required type='file' name="importfile" id="importfile">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        
       <input type="hidden" name="teacher" value="<?php echo $_SESSION['username']; ?>">

       <div class="row col s12">
         <span>Please ensure that the file you want to upload was saved as CSV format before uploading.</span>
       </div>

    
        </div>
        <div class="modal-footer">
            <button class="btn red darken-4 waves-effect waves-light" type="submit" id="but_import" name="but_import">Upload
        <i class="material-icons right">file_upload</i>
      </button>
          <a  class=" modal-close btn-flat waves-effect waves-light">Cancel</a> 
    </div>
      </form>
  

</div>

