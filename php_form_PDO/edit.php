<?php
    require_once('dbconnect.php');
    $id=$_GET["id"];
    if (isset($_POST["update"])) {
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $email=$_POST["email"];
        $dob=$_POST["dob"];
        $bg=$_POST["blood_gp"];
        $gen=$_POST["gen"];
        $ph=$_POST["phone"];
        $addr=$_POST["address"];
        $creation_time= "";
        $updation_time=date('jS F g:i A');
        try {
            $sql = "UPDATE emp SET fname= '$fname',lname= '$lname', email= '$email', blood_gp= '$bg', gender='$gen', mobile='$ph', address= '$addr', last_updated= '$updation_time' WHERE id='$id'";
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            header("Location:emp_details.php");
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
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
</head>

<body>
    <section class="container">
        <div class="hero is-primary hero-body has-text-centered">
            <p class="title">Employee Updation</p>
        </div>
        <form method="POST">
            <?php
                $qry = $conn->prepare("SELECT * from emp WHERE id=$id;"); 
                $qry->execute();
                $result = $qry->fetch();
            ?>
            <div class="columns is-centered ">
                <div class="column is-8">
                    <div class="field">
                        <label class="label">ID</label>
                        <div class="control">
                            <input class="input is-primary" type="text" value="<?php echo $result['id']; ?>" disabled name="id">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">First Name</label>
                        <div class="control">
                            <input class="input is-primary" type="text" value="<?php echo $result['fname']; ?>" required name="fname">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Last Name</label>
                        <div class="control">
                            <input class="input is-primary" type="text" value="<?php echo $result['lname']; ?>" name="lname">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input is-primary" type="email" value="<?php echo $result['email']; ?>" required name="email">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">DOB</label>
                        <div class="control">
                            <input class="input is-primary" type="date" value="<?php echo $result['dob']; ?>" required name="dob">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Blood Group</label>
                        <div class="control">
                            <div class="select is-primary">
                                <select name="blood_gp" required>
                                    <option><?php echo $result['blood_gp']; ?></option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="gen" <?php if (isset($gen) && $gen=="male") echo "checked";?> value= "male">
                                Male
                            </label>
                            <label class="radio">
                                <input type="radio" name="gen" <?php if (isset($gen) && $gen=="female") echo "checked";?> value="female">
                                Female
                            </label>
                            <label class="radio">
                                <input type="radio" name="gen" <?php if (isset($gen) && $gen=="other") echo "checked";?> value="other">
                                Other
                            </label>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Mobile</label>
                        <div class="control">
                            <input class="input is-primary" type="tel" value="<?php echo $result['mobile']; ?>" name="phone" maxlength="10" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Address</label>
                        <div class="control">
                            <textarea class="textarea is-primary" type="text" name="address" required><?php echo $result['address']; ?></textarea>
                        </div>
                    </div>
                    <div class="field is-grouped is-grouped-centered">
                        <div class="control">
                            <button type="submit" name="update" class="button is-primary">Update</button>
                        </div>
                        <div class="control">
                            <a href="emp_details.php" class="button is-primary" name="back">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</body>

</html>