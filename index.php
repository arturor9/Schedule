<html>
<head>
<?php
include "main/header.html"; 
?>
</head>    
<body>
<div class='container'>
<?php
include "main/navbar.html"; 
$dow = idate('w', $timestamp);
?>
  <div  id="content" >
<?php
                    // Attempt select query execution
                     require_once "db/connect.php";
                    $sql = "select a.id, date(a.start_date) as 'date' , s.name as 'alumni_name', CONCAT(t.first_name, ' ', t.last_name) as 'employee_name', a.start_time, a.end_time, a.notes  FROM events a JOIN alumni s ON a.alumni_id = s.id JOIN employees t ON a.employee_id = t.id ";
                    if($result = mysqli_query($db, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Fecha</th>";
                                        echo "<th>Hora</th>";
                                        echo "<th>Alumno</th>";
                                        echo "<th>Maestro</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $row['start_time'] . "</td>";
                                        echo "<td>" . $row['alumni_name'] . "</td>";
                                        echo "<td>" . $row['employee_name'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='/events/edit.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span>Update - </a>";
                                            echo "<a href='/events/delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span>Delete</a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
                    }
 
                    // Close connection
                
                

?>
  <a href='/events/new.php' title='New' data-toggle='tooltip'><span class='fa fa-plus'></span>  New</a>
  </div>
</div>
</body>
</html>    
    