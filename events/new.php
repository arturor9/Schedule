<html>
<head>
<?php
include "../main/header.html"; 
?>
</head>    
<body>
<div class='container'>
<?php
include "../main/navbar.html"; 
?>
  <div  id="content" > 
    <form  method='POST' action="../events/create.php" id="event" >
      <div class="offset-sm-3 col-sm-6">
                <?php 
                require_once "../db/connect.php";
                $sql_alumni = "select id as 'id_alumni', name  as 'name_alumni' FROM alumni;";
                $sql_employees = "select id as 'id_employee', CONCAT(first_name, ' ', last_name)  as 'name_employee' FROM employees;";
                if($alumni = mysqli_query($db, $sql_alumni)){
                  if(mysqli_num_rows($alumni) > 0){
                      echo '<div class="row">';
                      echo '<div class="col-sm-12">';
                      echo '<div class="form-group">';
                      echo '<label for="alumni_select">Estudiante</label>';
                      echo '<select class="form-control" id="alumni_select" name="std_id" required >';
                          while($row = mysqli_fetch_array($alumni)){
                              echo '<option value="' . $row['id_alumni'] . ' " >' . $row['name_alumni'] . '</option>';
                          }
                      echo '</select>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';
                      // Free result set
                      mysqli_free_result($alumni);
                  } else{
                      echo "<p class='lead'><em>No alumni records were found.</em></p>";
                  }
                } else{
                  echo "ERROR: Could not able to execute $sql_alumni. " . mysqli_error($db);
                }
                if($employees = mysqli_query($db, $sql_employees)){
                  if(mysqli_num_rows($employees) > 0){
                      echo '<div class="row">';
                      echo '<div class="col-sm-12">';
                      echo '<div class="form-group">';
                      echo '<label for="alumni_select">Estudiante</label>';
                      echo '<select class="form-control" id="employee_select" name="tch_id" required >';
                          while($row = mysqli_fetch_array($employees)){
                              echo '<option value="' . $row['id_employee'] . ' " >' . $row['name_employee'] . '</option>';
                          }
                      echo '</select>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';
                      // Free result set
                      mysqli_free_result($employees);
                  } else{
                      echo "<p class='lead'><em>No alumni records were found.</em></p>";
                  }
                } else{
                  echo "ERROR: Could not able to execute $sql_employees. " . mysqli_error($db);
                }
                 mysqli_close($db);
                ?>
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="usr_time"  class="form-label">Dia</label></br>
                        <input type="checkbox" checked="checked"  class="chckbx-btn-day chckbx-btn-wd" name="dow_number" value="1" id="mon-chckbx" >
                        <label for="mon-chckbx" class="btn btn-default label-btn-wd" >L</label>
                        <input type="checkbox"  class="chckbx-btn-day chckbx-btn-wd" name="dow_number" value="2" id="tu-chckbx">
                        <label for="tu-chckbx" class="btn btn-default label-btn-wd" >M</label>
                        <input type="checkbox"  class="chckbx-btn-day chckbx-btn-wd" name="dow_number" value="3" id="wed-chckbx">
                        <label for="wed-chckbx" class="btn btn-default label-btn-wd" >M</label>
						            <input type="checkbox"  class="chckbx-btn-day chckbx-btn-wd" name="dow_number" value="4" id="thu-chckbx">
                        <label for="thu-chckbx" class="btn btn-default label-btn-wd" >J</label>
                        <input type="checkbox"  class="chckbx-btn-day  chckbx-btn-wd" name="dow_number" value="5" id="fri-chckbx">
                        <label for="fri-chckbx" class="btn btn-default label-btn-wd" >V</label>
                        <input type="checkbox"  class="chckbx-btn-day" name="dow_number" value="0" id="other-chckbx">
                        <label for="other-chckbx" class="btn btn-default label-btn-wd" >...</label>
                        <input class="form-control" type="date" id='datePicker' name="date"  value="<?php echo date('Y-m-d'); ?>" min=<?php echo date('Y-m-d'); ?> >
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="usr_time"  class="form-label">Hora Inicio</label>
                        <input class="form-control" required type="time" value="12:00:00" name="start_time" id="start_time"  step="1800" min="08:00:00" max="22:00:00">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="usr_time"  class="form-label">Hora Final</label>
                        <input class="form-control" required type="time" value="13:00:00" name="end_time"  id="end_time" step="1800" max="22:00:00" >
                    </div>
                </div>                  
              </div>
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <button type="submit"  class="btn btn-info">Guardar</button>
                    </div>
                </div>             
              </div>                
      </div>
    </form>
  </div>
</div>
</body>
</html>    
    

