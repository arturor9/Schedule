<?php
require_once "../db/connect.php";

$input_first_name = $input_middle_name = $input_last_name = $input_email = $input_rfc = $input_imss = $input_mobile_number = $input_phone_number = $input_emergency_number = $input_emergency_contact = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_first_name        = trim($_POST["form_first_name"]);
    $input_middle_name       = trim($_POST["form_middle_name"]);
    $input_last_name         = trim($_POST["form_last_name"]);
    $input_email             = trim($_POST["form_email"]);
    $input_rfc               = trim($_POST["form_rfc"]);
    $input_imss              = trim($_POST["form_imss"]);
    $input_mobile_number     = trim($_POST["form_mobile_number"]);
    $input_phone_number      = trim($_POST["form_phone_number"]);
    $input_emergency_number  = trim($_POST["form_emergency_number"]);
    $input_emergency_contact = trim($_POST["form_emergency_contact"]);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

$stmt = $db->prepare("INSERT INTO employee (first_name, middle_name, last_name, email, rfc, imss,phone_number, mobile_number, emergency_phone_number, emergency_contact) VALUES  (?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('sssssiiiis', $param_first_name, $param_middle_name, $param_last_name, $param_email, $param_rfc, $param_imss, $param_phone_number, $param_mobile_number, $param_emergency_number, $param_emergency_contact);

            // Set parameters
            $param_first_name = $input_first_name;
            $param_middle_name = $input_middle_name;
            $param_last_name = $input_last_name;
            $param_email = $input_email;
            $param_rfc = $input_rfc;
            $param_imss = $input_imss;
            $param_mobile_number = $input_mobile_number;
            $param_phone_number = $input_phone_number;
            $param_emergency_number = $input_emergency_number;
            $param_emergency_contact = $input_emergency_contact;

/* execute prepared statement */
/*$stmt->execute(); */

if(mysqli_stmt_execute($stmt)){
// Records created successfully. Redirect to landing page
printf("%d Row inserted.\n", $stmt->affected_rows);
    header("location: /index.php");
    exit();
} else{
    echo "Something went wrong. Please try again later.";
}



/* close statement and connection */
$stmt->close();

/* close connection */
$db->close();
}
?>