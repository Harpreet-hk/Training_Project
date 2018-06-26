<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Form</title>   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <style>
        .columns{
            background-color: rgb(245, 216, 204);
            width: 40%;
            height: 600px;
            margin: 0 auto;
            margin-top: 30px;
        }
        .x{
            display: inline-flex;
        }
        .label{ID
            padID
        }
        h3{
            padID
            fonID
        }
        .field{
            padding-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="columns is-mobile">
        <div class="column">
            <h3 class="has-text-centered has-text-weight-bold">Update FORM</h3>
            <form action="php_table.php" method="POST">

                <?php
                    $conn = new mysqli("localhost", "root", "root","php_form");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    if (isset($_POST["back"])) {
                        header("Location:emp_details.php");
                    }
                    $ID = $_POST['ID'];
                    if (isset ($_POST['ID'])) {
    
                        $ID = $_POST['ID'];
                        $FullName = $_POST['FullName'];
                        $D_O_B = $_POST['D_O_B'];
                        $Email = $_POST['Email'];
                        $ContactNo = $_POST['ContactNo'];
                        $Gender = $_POST['Gender'];
                    
                        echo $sql = 'UPDATE form_info SET FullName=$FullName, D_O_B=$D_O_B, Email=$Email, ContactNo=$ContactNo, Gender=$Gender WHERE ID="$ID"';
                      $statement = $conn->query($sql);
                    } 
                    $sql = "SELECT * FROM form_info WHERE ID='$ID';";
                    $result = $conn->query($sql);
                    $person = $result->fetch_assoc();
                ?>

                <div class="x field">
                    <label class="label">Firstname</label>
                    <div class="control"><input value="<?php echo $person['ID']; ?>" name="firstname" class="input" type="text" required placeholder="Text input"></div>
                </div>
                <div class="x field">
                    <label class="label">Lastname</label>
                    <div class="control"><input value="<?php echo $person['FullName']; ?>" name="lastname" class="input" type="text" required placeholder="Text input"></div>
                </div>
                <div class="x field">
                    <label class="label">Date of Birth</label>
                    <div class="control"><input value="<?= $D_O_B; ?>" name="dob" class="input" type="date" required placeholder="Text input"></div>
                </div>
                <div class="x field">
                    <label class="label"><i class="fas fa-envelope"></i>&nbsp;Email</label>
                    <div class="control"><input value="<?= $Email; ?>" name="email" class="input" type="email" required placeholder="Email input"></div>
                </div>
                <div class="x field">
                    <label class="label">Contact No.</label>
                    <div class="control"><input value="<?= $ContactNo; ?>" name="contactNo" class="input" type="tel" maxlength="10" required placeholder="Enter Contact No"></div>
                </div>
                <div class="field">
                        <label class="label">Gender</label>
                        <div class="control">
                            <label class="radio"><input value="<?= $Gender; ?>" id="gender_male" type="radio" name="gender">Male</label>
                            <label class="radio"><input value="<?= $Gender; ?>" id="gender_female" type="radio" name="gender">Female</label>
                            <label class="radio"><input value="<?= $Gender; ?>" id="gender_others" type="radio" name="gender">Others</label>
                        </div>
                </div>
                <input type="hidden" name="user_id" value="<?= $ID; ?>">

                <div class="field is-grouped">
                    <div class="control"><button type="submit" class="button is-primary">Update</button></div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>




