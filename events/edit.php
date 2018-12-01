<!DOCTYPE html>
<html>
<head>
<title>Alta de empleado</title>
<?php
include "../main/header.html"; 
?>
</head>
<body>
<div class='container'>
<?php
include "../main/navbar.html"; 
?>

  <div id="content" > 
    <form method='POST' action="../events/update.php" id="event" class="needs-validation" novalidate>
      <div class="offset-sm-3 col-sm-6">
        
        
        
        <?php 
            if(isset($_GET["id"]) && !empty($_GET["id"])){
                require_once "../db/connect.php";
                $input_id = $_GET["id"];
                $sql_events = "select a.emp_id, a.first_name, a.middle_name, a.last_name, a.email, a.rfc, a.imss, a.mobile_number, a.phone_number, a.emergency_phone_number, a.emergency_contact FROM employee a where a.emp_id =  " . $input_id;
                if($events = mysqli_query($db, $sql_events)){
                    if(mysqli_num_rows($events) == 1){
                      $event = mysqli_fetch_array($events, MYSQLI_ASSOC);
                      $emp_id = $event['emp_id'];
                      $first_name = $event['first_name'];
                      $middle_name = $event['middle_name'];
                      $last_name = $event['last_name'];
                      $email = $event['email'];
                      $rfc = $event['rfc'];
                      $imss = $event['imss'];
                      $mobile_number = $event['mobile_number'];
                      $phone_number = $event['phone_number'];
                      $emergency_number = $event['emergency_phone_number'];
                      $emergency_contact =  $event['emergency_contact'];
                      
                    
                    echo '<div class="form-group">';
                      echo '<input type="hidden" id="form_emp_id" name="form_emp_id" value="' . $emp_id . ' ">';
                      echo '<label for="form_first_name">Primer nombre</label>';
                      echo '<input type="text" class="form-control" id="form_first_name" name="form_first_name" value="' . $first_name . '" required>';
                      echo '<div class="invalid-feedback">';
                          echo 'Favor de ingresar el nombre del empleado.';
                      echo '</div>';
                    echo '</div>';
                    echo '<div class="form-group">';
                        echo '<label for="form_middle_name">Segundo nombre</label>';
                        echo '<input type="text" class="form-control" id="form_middle_name" name="form_middle_name" value="' . $middle_name . '">';
                    echo '</div>';
                    echo '<div class="form-group">';
                        echo '<label for="form_last_name">Apellidos</label>';
                        echo '<input type="text" class="form-control" id="form_last_name" name="form_last_name" value="' . $last_name . '" required>';
                        echo '<div class="invalid-feedback">';
                            echo 'Favor de ingresar el apellido de empleado.';
                        echo '</div>';                        
                    echo '</div>';
                    echo '<div class="form-group">';
                        echo '<label for="form_email">Correo electronico</label>';
                        echo '<input type="email" class="form-control" id="form_email" name="form_email" value="' . $email . '">';
                    echo '</div>';
                    echo '<div class="form-group">';
                        echo '<label for="form_rfc">RFC</label>';
                        echo '<input type="text" class="form-control" id="form_rfc" name="form_rfc" value="' . $rfc . '">';
                    echo '</div>';
                    echo '<div class="form-group">';
                        echo '<label for="form_imss">Numero IMSS</label>';
                        echo '<input type="text" class="form-control" id="form_imss" name="form_imss" value="' . $imss . '">';
                    echo '</div>';
                    echo '<div class="form-group">';
                        echo '<label for="form_mobile_number">Numero de celular</label>';
                        echo '<input type="text" class="form-control" id="form_mobile_number" name="form_mobile_number" value="' . $mobile_number . '">';
                    echo '</div>';
                    echo '<div class="form-group">';
                        echo '<label for="form_phone_number">Numero fijo</label>';
                        echo '<input type="text" class="form-control" id="form_phone_number" name="form_phone_number" value="' . $phone_number . '">';
                    echo '</div>';
                    echo '<div class="form-group">';
                        echo '<label for="form_emergency_number">Numero de emergencia</label>';
                        echo '<input type="text" class="form-control" id="form_emergency_number" name="form_emergency_number" value="' . $emergency_number . '">';
                    echo '</div>';
                    echo '<div class="form-group">';
                        echo '<label for="form_emergency_contact">Contacto de emergencia</label>';
                        echo '<input type="text" class="form-control" id="form_emergency_contact" name="form_emergency_contact" value="' . $emergency_contact . '">';
                    echo '</div>';
                echo '</div>';
              echo '</div>';
              echo '<div class="row">';
                echo '<div class="col-sm-12">';
                    echo '<div class="form-group">';
                      echo '<button type="submit"  class="btn btn-info">Guardar</button>';
                    echo '</div>';
                echo '</div>';             
              echo '</div>';


                        } else{
                        echo "ERROR: Could not able to execute $sql_events. " . mysqli_error($db);
                        }
                    }else{
                        echo "<p class='lead'><em>No se encontraron datos del empleado seleccionado</em></p>";
                        echo '<input class="form-control" required value="' . $first_name . '" name="start_time" id="start_time">';
               
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
  </div>
</body>
</html>  