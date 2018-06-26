<?php
require_once('dbconnect.php');
$id=$_GET['id'];
try {
    $sql = "DELETE FROM emp WHERE id=$id";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo 'alert("Record deleted successfully");';
    header("Location:emp_details.php");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>
