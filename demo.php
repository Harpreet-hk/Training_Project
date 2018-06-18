<!DOCTYPE html>
<html>  
    <body>
    <?php 
        if(! empty($_POST)){

            $mysqli = new mysqli('localhost','root','root','php_form');

            if($mysqli -> connect_error){
                die('Connect Error:' . $mysqli->Connect_errno . ': '. $mysqli->connect_error );
            }

            $sql = "INSERT INTO form_info (FullName, contactNo, D_O_B, Email, Address, Gender, Blood_group) VALUES ('{$mysqli->real_escape_string($_POST['firstname'].' '.$_POST["lastname"])}', '{$mysqli->real_escape_string($_POST['contactNo'])}', '{$mysqli->real_escape_string($_POST['dob'])}', '{$mysqli->real_escape_string($_POST['email'])}', '{$mysqli->real_escape_string($_POST['address'])}', '{$mysqli->real_escape_string($_POST['gender'])}', '{$mysqli->real_escape_string($_POST['bg'])}')";
            $insert = $mysqli->query($sql);

            if($insert){
                echo "Success! Row ID: {$mysqli->insert_id}";
            }
            else{
                die ("Error: {mysqli->errno} : {$mysqli->error}");
            }

            $mysqli->close();
        }
    ?>
    <br>
        FullName: <?php echo $_POST["firstname"].' '.$_POST["lastname"]?><br>
        Contact No: <?php echo $_POST["contactNo"]?><br>
        D.O.B: <?php echo $_POST["dob"]?><br>
        Email: <?php echo $_POST["email"]; ?><br>
        Address: <?php echo $_POST["address"]; ?><br>
        Gender: <?php echo $_POST["gender"]?><br>
        Blood Group: <?php echo $_POST["bg"]?>
    </body>
</html>
