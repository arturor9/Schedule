<?php
require_once "../db/connect.php";

// Define variables and initialize with empty values

$std_id = $tch_id =  $tch_id= $date = $start_time= $end_time=0;

// Processing form data when form is asubmitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate student id
    $input_std_id = trim($_POST["std_id"]);
    $input_tch_id = trim($_POST["tch_id"]);
    $input_date   = trim($_POST["date"]);
    $input_start_time = trim($_POST["start_time"]);
    $input_end_time   = trim($_POST["end_time"]);


    // Validate tch id
    function validateInt($num){
        if(empty($num)){
            return 'empty';
        } elseif(!ctype_digit($num)){
            return 'nodigit';
        } else{
          return 'valid';
        }
        
    }
    // Validate date
    function validateDate($date, $format = 'Y-m-d'){
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }
        
    // Check input errors before inserting in database
    if( validateInt($input_std_id) && validateInt($input_tch_id) && validateDate($input_date) ){
        // Prepare an insert statement
        $sql = "INSERT INTO events (alumni_id,  employee_id,  start_date, start_time, end_time  ) VALUES ( ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "iisss", $param_std_id, $param_tch_id, $param_date, $param_start_time,  $param_end_time  );
            
            // Set parameters
            $param_std_id = $input_std_id;
            $param_tch_id = $input_tch_id;
            $param_date = date("Y-m-d",strtotime($input_date));   
            $param_start_time = $input_start_time ;
            $param_end_time =  $input_end_time  ;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: /index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        
        

         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($db);
}
?>
