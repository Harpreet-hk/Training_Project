<?php
    $conn = new mysqli("localhost", "root", "root","php_form");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected";
    echo "<br>";
    $ID = $_POST["ID"];
    
    $sql = "DELETE FROM form_info WHERE ID='$ID';";
    $statement = $conn->prepare($sql);
    if ($statement->execute()) {
        header("Location:php_table.php");
    }
?>


