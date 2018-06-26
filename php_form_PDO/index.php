<?php
    require_once('dbconnect.php');

    $fnameErr="";
    $lnameErr="";
    $emailErr="";
    $phErr="";
    if (isset($_POST["register"])) {
        $fname=$_POST["fname"];
        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
            $fnameErr = "* Please enter a vallid first name"; 
        }
        $email=$_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "* Please enter a correct email"; 
        }
        $creation_time=date('jS F g:i A');
        $updation_time=date('jS F g:i A');
        $sql = "INSERT INTO emp (id,fname,email) VALUES ('', '$fname', '$email')";
        try {
            // use exec() because no results are returned
            $conn->exec($sql);
            //echo "You are now registered successfully";
            header("location: emp_details.php");
            }
        catch(PDOException $e)
            {
            //echo $sql . "<br>" . $e->getMessage();
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<!-- Start of head section-->

<head>
    <title>Employee Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <style>
         .columns{
            background-color: rgb(245, 216, 204);
            width: 40%;
            height: auto;
            margin: 0 auto;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <section class="container">
    
        <form method="POST">

        <div class="hero is-info hero-body has-text-centered">
            <p class="title">Employee Registration</p>
            <?php
            $inTwoMonths = 60 * 60 * 24 * 60 + time();
            //$time = $_SERVER['REQUEST_TIME'];
            setcookie('lastVisit', date('jS F g:i A'),$inTwoMonths);
            if(isset($_COOKIE['lastVisit']))
            
            {
            $visit = $_COOKIE['lastVisit'];
            echo "Your last visit was on - ". $visit;
            //echo "You have elapsed ".$time;
            }
            else
            echo "Welcome ! This is your first visit";
            ?>
        </div>
            <div class="columns is-centered ">
            <h3> Registration Form</h3>
                <div class="column is-8">
                    <div class="field">
                        <label class="label">ID</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="ID" disabled name="id">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Full Name</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="Please enter first name" required name="fname">
                            <p class="has-text-danger"><?php echo $fnameErr; ?></p>
                        </div>
                        <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" type="email" placeholder="Please enter email" required name="email">
                            <p class="has-text-danger"><?php echo $fnameErr; ?></p>
                        </div>
                    </div>
                    
                    <div class="field is-grouped is-grouped-centered">
                        <div class="control"><button type="submit" name="register" class="button is-primary">Register</button></div>
                        <div class="control"><button type="reset" class="button is-warning ">Reset</button></div>
                        <div class="control"><a href="emp_details.php" class="button is-danger ">View All</a></div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</body>

</html>