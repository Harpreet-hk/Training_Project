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
            <p class="title">Employee Profile</p>
        </div>
        <form action="index.php" method="POST">
            <?php
            require_once('dbconnect.php');
            try {
                $id=$_GET['id'];
                $stmt = $conn->prepare("SELECT * from emp where id='$id';"); 
                $stmt->execute();
                // set the resulting array to associative
                //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetch();
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
            <table class="table is-fullwidth ">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $result['id']; ?></td>
                        <td><a href="#" title="fname"><?php echo $result['fname']; ?></a></td>
                        <td><?php echo $result['lname']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $result['dob']; ?></td>
                        <td><?php echo $result['blood_gp']; ?></td>
                        <td><?php echo $result['gender']; ?></td>
                        <td><?php echo $result['mobile']; ?></td>
                        <td><?php echo $result['address']; ?></td>
                        <td><?php echo $result['creation_time']; ?></td>
                        <td><?php echo $result['last_updated']; ?></td>
                        <td>
                        <a href="<?php echo 'emp_edit.php?id='.$id ?>"><i class="far fa-edit"></i></a>
                        <a href="<?php echo 'emp_delete.php?id='.$id ?>" onclick="return confirm('Are you sure want to delete?')" title="delete" style="color:red"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>   
            <div class="field is-grouped is-grouped-centered">
                <div class="control">
                    <button class="button is-primary ">Back</button>
                </div>
            </div> 
        </form>
    </section>
</body>

</html>
