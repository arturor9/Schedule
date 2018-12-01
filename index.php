<!DOCTYPE html>
<html>
<head>
<title>Empleados</title>
<?php
include "main/header.html"; 
?>
</head>
<body>
    <div class='container'>
<?php
include "main/navbar.html"; 
?>

<?php
                    // Attempt select query execution
                     require_once "db/connect.php";
                    $sql = "select a.emp_id, a.first_name, a.middle_name, a.last_name FROM employee a";
                    if($result = mysqli_query($db, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>No. Empleado</th>";
                                        echo "<th>Primer nombre</th>";
                                        echo "<th>Segundo nombre</th>";
                                        echo "<th>Apellido</th>";
                                        echo "<th>Accion</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['emp_id'] . "</td>";
                                        echo "<td>" . $row['first_name'] . "</td>";
                                        echo "<td>" . $row['middle_name'] . "</td>";
                                        echo "<td>" . $row['last_name'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='/events/edit.php?id=". $row['emp_id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a> Editar - ";
                                            echo "<a href='/events/delete.php?id=". $row['emp_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a> Borrar";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No se encontraron empleados.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
                    }
 
                    // Close connection
                
                

?>
    </div>
</body>
</html>
