<!DOCTYPE html>
<html>  
    <body>
        <?php 
       
        // define variables and set to empty values
        // $nameErr = $emailErr = $genderErr = $websiteErr = "";
        // $name = $email = $gender = $comment = $website = "";
        
        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //   if (empty($_POST["email"])) {
        //     $emailErr = "Email is required";
        //     //var_dump($emailErr);
        //   } else  if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        //     $emailErr = "Invalid email format"; 
        //   }
        //   else{
        //     $email = test_input($_POST["email"]);
        //     // check if name only contains letters and whitespace
        //   }
        // }
        if(! empty($_POST)){
            $mysqli = new mysqli('localhost','root','root','php_form');
            if($mysqli -> connect_error){
                die('Connect Error:' . $mysqli->Connect_errno . ': '. $mysqli->connect_error );
            }
            $sql = "INSERT INTO form_info (ID, FullName, D_O_B, Email, ContactNo, Gender) VALUES ('{$mysqli->real_escape_string($_POST['id'])}','{$mysqli->real_escape_string($_POST['firstname'].' '.$_POST["lastname"])}',  '{$mysqli->real_escape_string($_POST['dob'])}', '{$mysqli->real_escape_string($_POST['email'])}', '{$mysqli->real_escape_string($_POST['contactNo'])}', '{$mysqli->real_escape_string($_POST['gender'])}')";
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
        ID: <?php echo $_POST["id"]?><br>
        FullName: <?php echo $_POST["firstname"].' '.$_POST["lastname"]?><br>
        D.O.B: <?php echo $_POST["dob"]?><br>
        Email: <?php echo $_POST["email"]; ?><br>
        Contact No: <?php echo $_POST["contactNo"]?><br>
        Gender: <?php echo $_POST["gender"]?><br>
    </body>
</html> 







