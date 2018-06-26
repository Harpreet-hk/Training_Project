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
            <p class="title">Employee Details</p>
        </div>
        <form  method="POST">
            <?php
            require_once('dbconnect.php');
            if (isset($_POST["back"])) {
                header('Location: index.php');    
            }
            try {
                $stmt = $conn->prepare("SELECT * from emp;"); 
                $stmt->execute();
                // set the resulting array to associative
                //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
            <table class="table is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>F. Name</th>
                        <th>L. Name</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Blood Gp.</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Creation Time</th>
                        <th>Last Updated</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php while( $result = $stmt->fetch()){ ?>
                    <tr>
                        <td><?php echo $result['id']; ?></td>
                        <td><a href="<?php echo 'emp_profile.php?id='.$result['id'] ?>" title="fname"><?php echo $result['fname']; ?></a></td>
                        <td><?php echo $result['lname']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $result['dob']; ?></td>
                        <td><?php echo $result['blood_gp']; ?></td>
                        <td><?php echo $result['gender']; ?></td>
                        <td><?php echo $result['mobile']; ?></td>
                        <td><?php echo $result['address']; ?></td>
                        <td><?php echo $result['creation_time']; ?></td>
                        <td><?php echo $result['last_updated']; ?></td>
                    </tr>
                <?php 
                }
                ?>
                </tbody>
            </table>   
            <div class="field is-grouped is-grouped-centered">
                <div class="control">
                    <button class="button is-primary " name ="back">Back</button>
                </div>
            </div> 
        </form>
    </section>
</body>

</html>