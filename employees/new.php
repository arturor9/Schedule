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
    <form method='POST' action="../employees/create.php" id="event" class="needs-validation" novalidate>
      <div class="offset-sm-3 col-sm-6">
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="form_first_name">Primer nombre</label>
                        <input type="text" class="form-control" id="form_first_name" name="form_first_name" required>
                        <div class="invalid-feedback">
                            Favor de ingresar el nombre de empleado.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="form_middle_name">Segundo nombre</label>
                        <input type="text" class="form-control" id="form_middle_name" name="form_middle_name">
                    </div>
                    <div class="form-group">
                        <label for="form_last_name">Apellidos</label>
                        <input type="text" class="form-control" id="form_last_name" name="form_last_name" required>
                        <div class="invalid-feedback">
                            Favor de ingresar el apellido de empleado.
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="form_email">Correo electronico</label>
                        <input type="email" class="form-control" id="form_email" name="form_email">
                    </div>
                    <div class="form-group">
                        <label for="form_rfc">RFC</label>
                        <input type="text" class="form-control" id="form_rfc" name="form_rfc">
                    </div>
                    <div class="form-group">
                        <label for="form_imss">Numero IMSS</label>
                        <input type="text" class="form-control" id="form_imss" name="form_imss">
                    </div>
                    <div class="form-group">
                        <label for="form_mobile_number">Numero de celular</label>
                        <input type="text" class="form-control" id="form_mobile_number" name="form_mobile_number">
                    </div>
                    <div class="form-group">
                        <label for="form_phone_number">Numero fijo</label>
                        <input type="text" class="form-control" id="form_phone_number" name="form_phone_number">
                    </div>
                    <div class="form-group">
                        <label for="form_emergency_number">Numero de emergencia</label>
                        <input type="text" class="form-control" id="form_emergency_number" name="form_emergency_number">
                    </div>
                    <div class="form-group">
                        <label for="form_emergency_contact">Contacto de emergencia</label>
                        <input type="text" class="form-control" id="form_emergency_contact" name="form_emergency_contact">
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
</div>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</body>
</html>
