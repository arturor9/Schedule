<?php
require_once "../db/connect.php";

$input_first_name = $input_middle_name = $input_last_name = $input_email = $input_rfc  = $input_emergency_contact = "";
$input_imss = $input_mobile_number = $input_phone_number = $input_emergency_number = 0;

try {
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
    $input_emp_id            = trim($_POST["form_id"]);
}   

$stmt = $db->prepare("UPDATE employees SET first_name=?, middle_name=?, last_name=?, email=?, rfc=?, imss=?, phone_number=?, mobile_number=?, emergency_phone_number=?, emergency_contact=? WHERE id=?");


/* Bind our params */
/* BK: variables must be bound in the same order as the params in your SQL.
 * Some people prefer PDO because it supports named parameter. */
$stmt->bind_param('sssssiiiisi', $input_first_name, $input_middle_name, $input_last_name, $input_email, $input_rfc, $input_imss, $input_phone_number, $input_mobile_number, $input_emergency_number, $input_emergency_contact, $input_emp_id);
/* Set our params */
/* BK: No need to use escaping when using parameters, in fact, you must not, 
 * because you'll get literal '\' characters in your content. */


/* Execute the prepared Statement */
$status = $stmt->execute();

if($status === true){
    header("location: ../employees/index.php");
    exit();
} else{
    echo "Something went wrong. Please try again later.";
}

/* close statement and connection */
$stmt->close();

/* close connection */
$db->close();
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
?>