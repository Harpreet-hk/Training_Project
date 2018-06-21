<?php
    $id = $_GET["ID"];
    $conn = mysqli_connect('localhost', 'root', 'root', 'php_form');
    if (!$conn) {
        die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
    } else {
       // echo 'Connected !';
    }
    $sql = "SELECT * FROM form_info where ID='$id'";
    $result = mysqli_query($conn, $sql);
?> 
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <style>
        body{
            font-size: 14px;
        }
        table, th, td {
            border: 1px solid #d0cbce;
            border-collapse: collapse;
            padding: 10px;
            margin: 0 auto;
        }
        caption{
            padding-bottom: 10px;
            font-size: 14px;
            font-weight: bold;
        }
        form{
            display: inline-block;
        }
       
        a{
            color: #4a4a4a;
        }
    </style>
</head>
<body>
    <table width="1200" border="1" cellpadding="7" cellspacing="3">
        <caption class="title">Record of the Candidate</caption>
        <thead>
        <tr>
            <th>ID</th>
            <th>FullName</th>
            <th>D_O_B</th>
            <th>Email</th>
            <th>ContactNo</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
         if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                    
                    echo "<br>";
                    echo '<tr>
                          <td> '.$row["ID"]. ' </td> 
                          <td> '.$row["FullName"].'</td>
                          <td>'.$row['D_O_B'].'</td>
                          <td>'.$row['Email'].'</td>
                          <td>'.$row['ContactNo'].'</td>
                          <td>'.$row['Gender'].'</td>
                          <td> 
                                <form action="edit.php" method="POST" >
                                <input type="hidden" name="ID" value="'.$id.'">
                                <div class="control"><button class="button is-info" type="submit">Edit</button></div>
                                </form>
                                &nbsp; &nbsp;
                               
                                <form action="delete.php" method="POST" >
                                <input type="hidden" name="ID" value="'.$id.'">
                                <div class="control"><button class="button is-danger" type="submit" >Delete</button></div>
                                </form>                         
                                </td>
                          </tr>';
            }
        }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html> 