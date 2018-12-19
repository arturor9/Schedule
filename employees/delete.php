<?php
require_once "../db/connect.php";

// Define variables and initialize with empty values
// Processing form data when form is asubmitted

    // Check input errors before inserting in database
    if(isset($_GET["id"]) && !empty($_GET["id"])){
        // Prepare an insert statement
        $sql = "DELETE FROM employees WHERE id = ?";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param( $stmt, "i", $param_id  );
            
            // Set parameters
            $param_id = trim($_GET["id"]);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../employees/index.php");
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
?>
