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
    <form  method='POST' action="../events/update.php" id="event" novalidate>
      <div class="offset-sm-3 col-sm-6">
            <?php 
            if(isset($_GET["id"]) && !empty($_GET["id"])){
                require_once "../db/connect.php";
                $input_id = $_GET["id"];
                $sql_events = "select a.id as 'event_id', date(a.start_date) as 'date' , s.id as 'alumni_id_selected',  t.id as 'employee_id_selected', a.start_time, a.end_time, a.notes  FROM events a JOIN alumni s ON a.alumni_id = s.id JOIN employees t ON a.employee_id = t.id where a.id =  " . $input_id;
                $sql_alumni = "select id as 'alumni_id', name  as 'alumni_name' FROM alumni;";
                $sql_employees = "select id as 'employee_id', CONCAT(first_name, ' ', last_name)  as 'employee_name' FROM employees;";
                if($events = mysqli_query($db, $sql_events)){
                    if(mysqli_num_rows($events) == 1){
                        $event = mysqli_fetch_array($events, MYSQLI_ASSOC);
                        $event_id = $event['event_id'];
                        $alumni_id_selected = $event['alumni_id_selected'];
                        $employee_id_selected = $event['employee_id_selected'];
                        $date       = $event['date'];
                        $start_time = $event['start_time'];
                        $end_time   = $event['end_time'];
                        if($alumni = mysqli_query($db, $sql_alumni)){
                        if(mysqli_num_rows($alumni) > 0){
                            echo  '<input type="hidden" id="id" name="id" value="' . $event_id . '">' ;
                            echo '<div class="row">';
                                echo '<div class="col-md-12">';
                                    echo '<div class="form-group">';
                                        echo '<label for="alumni_select">Estudiante</label>';
                                        echo '<select class="form-control" id="alumni_select" name="std_id" required >';
                                        while($row = mysqli_fetch_array($alumni)){
                                            if( $row['alumni_id'] == $alumni_id_selected ){
                                                echo '<option value="' . $row['alumni_id'] . ' " selected >' . $row['alumni_name'] . '</option>';   
                                            }else{
                                                echo '<option value="' . $row['alumni_id'] . ' " >' . $row['alumni_name'] . '</option>';   
                                            }
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
                                echo '<div class="col-md-12">';
                                    echo '<div class="form-group">';
                                        echo '<label for="alumni_select">Maestro</label>';
                                            echo '<select class="form-control" id="employee_select" name="tch_id" required >';
                                            while($row = mysqli_fetch_array($employees)){
                                                if( $row['employee_id'] == $employee_id_selected ){
                                                    echo '<option value="' . $row['employee_id'] . ' " selected >' . $row['employee_name'] . '</option>';   
                                                }else{
                                                    echo '<option value="' . $row['employee_id'] . ' " >' . $row['employee_name'] . '</option>';   
                                                }
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
                    }else{
                        echo "<p class='lead'><em>No alumni records were found.</em></p>";
                    }

                echo '<div class="row">';
                    echo '<div class="col-md-8">';
                        echo '<div class="form-group">';
                        echo '<label for="usr_time"  class="form-label">Dia</label></br>';
                        echo '<input type="checkbox" checked="checked"  class="chckbx-btn-day chckbx-btn-wd" name="dow_number" value="1" id="mon-chckbxecho" >';
                        echo '<label for="mon-chckbx" class="btn btn-default label-btn-wd" >L</label>';
                        echo '<input type="checkbox"  class="chckbx-btn-day chckbx-btn-wd" name="dow_number" value="2" id="tu-chckbx">';
                        echo '<label for="tu-chckbx" class="btn btn-default label-btn-wd" >M</label>';
                        echo '<input type="checkbox"  class="chckbx-btn-day chckbx-btn-wd" name="dow_number" value="3" id="wed-chckbx">';
                        echo '<label for="wed-chckbx" class="btn btn-default label-btn-wd" >M</label>';
						echo '<input type="checkbox"  class="chckbx-btn-day chckbx-btn-wd" name="dow_number" value="4" id="thu-chckbx">';
                        echo '<label for="thu-chckbx" class="btn btn-default label-btn-wd" >J</label>';
                        echo '<input type="checkbox"  class="chckbx-btn-day  chckbx-btn-wd" name="dow_number" value="5" id="fri-chckbx">';
                        echo '<label for="fri-chckbx" class="btn btn-default label-btn-wd" >V</label>';
                        echo '<input type="checkbox"  class="chckbx-btn-day" name="dow_number" value="0" id="other-chckbx">';
                        echo '<label for="other-chckbx" class="btn btn-default label-btn-wd" >...</label>';
                        echo '<input class="form-control" type="date" id="datePicker" name="date"  value="'. $date . '" min='. date("Y-m-d") . '>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="row">';
                    echo '<div class="col-md-6">';
                        echo '<div class="form-group">';
                            echo '<label for="usr_time"  class="form-label">Hora Inicio</label>';
                            echo '<input class="form-control" required type="time" value="' . $start_time . '" name="start_time" id="start_time"  step="1800" min="08:00:00" max="22:00:00">';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="col-md-6">';
                        echo '<div class="form-group">';
                            echo '<label for="usr_time"  class="form-label">Hora Final</label>';
                            echo '<input class="form-control" required type="time" value="' . $end_time . '" name="end_time"  id="end_time" step="1800" max="22:00:00" >';
                        echo '</div>';
                    echo '</div>                  ';
                echo '</div>';
                echo '<div class="row">';
                    echo '<div class="col-md-12">';
                        echo '<div class="form-group">';
                        echo '<button type="submit"  class="btn btn-info">Guardar</button>';
                        echo '</div>';
                    echo '</div>             ';
                echo '</div> '; 

                }else{
                    echo "ERROR: Could not able to execute $sql_events. " . mysqli_error($db);
                }
            }else{
                // URL doesn't contain id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            ?>              
                </div> 
            </form>           
      </div>
    </form>
  </div>
</div>
</body>
</html>    
    



