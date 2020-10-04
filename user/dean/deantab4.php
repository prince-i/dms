<?php
$sql = 'SELECT * FROM course order by id desc';
$statement = $conn->prepare($sql);
$statement->execute();
$subject = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
  <form class="row">
                    <div class="col s12 m12 l12 ">
                        <div class="input-field col s6 m6 l6">
                        <a class="btn waves-effect waves-light modal-trigger tooltipped" data-position="right" data-tooltip="Add Subject" href="#addsubject"><i class="material-icons">
library_add
</i></a> </div>
                        
                        <div class="input-field col s6 m6 l6">
                            <i class="material-icons prefix">search</i>
                            <input id="icon_search" type="text" class="validate">
                            <label for="icon_search">Search</label>
                        </div>
                        
                    </div>
                </form>
   <table class="table table-bordered">
   

   <thead class="row">
        <tr>
          <th class="col m1">ID</th>
          <th class="col m2">Subject Code</th>
          <th class="col m2">Class Number</th>
          
          <th class="col m2">trimester</th>
          <th class="col m1">Units</th>
          <th class="col m2">School Year</th>
          <th class="col m2"></th>
        </tr>
    </thead>
    </table>
    <ul class="collection" style=" display:block;
  height:50vh;
  overflow:auto;">
        <?php foreach($subject as $subj): ?>
        <li class="collection-item row" style="padding:0px; margin:5px; ">
  
            <div class="col m1"><?= $subj->id; ?></div>
            <div class="col m2"><?= $subj->subject_code; ?></div>
            <div class="col m2"><?= $subj->class_number; ?></div>
            <div class="col m2"><?= $subj->trimester; ?></div>
            <div class="col m1"><?= $subj->units; ?></div>
            <div class="col m2"><?= $subj->school_year; ?></div>
            <div class="col m2">
              <a href="#update_subject?id=<?= $subj->id ?>" 
              class="waves-effect waves-light btn #263238 blue-grey darken-4 modal-trigger tooltipped" 
              data-position="left" data-tooltip="Update">
              <i class="material-icons">update</i>
              </a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="dean/delete_subject.php?id=<?= $subj->id ?>" 
              class="waves-effect waves-light btn #263238 blue-grey darken-4 tooltipped" data-position="right" data-tooltip="Update">
              <i class="material-icons">delete</i>
              </a>
            </div>
            </li>
        <?php endforeach; ?>
    </ul>
    

    <div id="addsubject" class="modal modal-fixed-footer">
    <form method="post" action="dean/query.php" enctype="multipart/form-data" id="import_form">
        <div class="modal-content">
        

        <div class="row">
            <div class="input-field col s6">
                <input required id="subject_code" name="subject_code" type="text" class="validate">
                <label for="subject_code">Subject Code</label>
            </div>
           
            <div class="input-field col s6">
                <input required id="class_number" name="class_number" type="text" class="validate">
                <label for="class_number">Class Number</label>
            </div>
        </div>
       
        <div class="row">
            <div class="input-field">
                <input id="description" name="description" type="text"class="validate">
                <label for="description">Description</label>
            </div>
         
        </div>

        <div class="row">

        <div class="col m3">        
        <label>Units</label>
        <select required class="browser-default" name="units">
            <option value="" disabled selected>Choose your option</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="9">9</option>
        </select>
        </div>

        <div class="col m3">        
        <label>trimester</label>
        <select required class="browser-default" name="trimester">
            <option value="" disabled selected>Choose your option</option>
            <option value="1st Trimester">1st Trimester</option>
            <option value="2nd Trimester">2nd Trimester</option>
            <option value="3rd Trimester">3rd Trimester</option>
        </select>
        </div>

        <div class="input-field col m3">
              <input type="text" id="school_year" name="school_year"  value="<?php echo date("y-");echo date("y")+1;?>" class="validate">
              <label for="school_year">School Year</label>
        </div>


        
        </div>



    
    </div>
        <div class="modal-footer">
            <button class="btn waves-effect waves-light" type="submit" id="add_subject" name="add_subject">Add Subject
        <i class="material-icons right">add</i>
      </button></div>
      </form>
    </div>









    <?php foreach($subject as $subj): ?>
 

    <div id="update_subject?id=<?= $subj->id ?>" class="modal modal-fixed-footer">
    <form method="post" action="dean/query.php?id=<?= $subj->id ?>" enctype="multipart/form-data" id="import_form">
        <div class="modal-content">
        

        <div class="row">
            <div class="input-field col s6">
                <input required id="subject_code" value="<?= $subj->subject_code ?>" name="subject_code" type="text" class="validate">
                <label for="subject_code">Subject Code</label>
            </div>
            <div class="input-field col s6">
                <input required id="class_number" value="<?= $subj->class_number ?>" name="class_number" type="text" class="validate">
                <label for="class_number">Class Number</label>
            </div>
        </div>
       
        <div class="row">
            <div class="input-field">
                <input id="description" value="<?= $subj->description ?>" name="description" type="text"class="validate">
                <label for="description">Description</label>
            </div>
         
        </div>

        <div class="row">

        <div class="col m3">        
        <label>Units</label>
        <select required class="browser-default" value="<?= $subj->units ?>" name="units">
            <option value="" disabled selected>Choose your option</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        </div>

        <div class="col m3">        
        <label>trimester</label>
        <select required class="browser-default" value="<?= $subj->trimester ?>" name="trimester">
            <option value="" disabled selected>Choose your option</option>
            <option value="1st Trimester">1st Trimester</option>
            <option value="2nd Trimester">2nd Trimester</option>
            <option value="3rd Trimester">3rd Trimester</option>
        </select>
        </div>

        <div class="input-field col m3">
              <input type="text" id="school_year" name="school_year"  value="<?= $subj->school_year ?>" class="validate">
              <label for="school_year">School Year</label>
        </div>


        
        </div>



    
    </div>
        <div class="modal-footer">
            <button class="btn waves-effect waves-light" type="submit" id="update_subject" name="update_subject">Update
        <i class="material-icons right">update</i>
      </button></div>
      </form>
    </div>
    <?php endforeach; ?>
