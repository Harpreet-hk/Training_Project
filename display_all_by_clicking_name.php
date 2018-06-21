

<!DOCTYPE html>
<html>
    <body>
        <?php
            $query = mysqli_query("SELECT * FROM table WHERE ID='" . mysqli_real_escape_string($_GET['ID']) . "'");
            if(mysqli_num_rows($query) == 0)
                echo 'There is a problem showing you more info about this product';
            else {
                $row = mysqli_fetch_array($query);
            }
        ?>
    </body>
</html>