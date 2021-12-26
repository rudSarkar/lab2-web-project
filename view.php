<?php
    include 'db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View all the data</title>
</head>
<body>
        <table border="1">
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Mobile</th>
            <th>Website</th>
            <th>Comment</th>
    <?php
        $sql = "SELECT * FROM users";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $full_name = $row['full_name'];
            $gender    = $row['gender'];
            $mobile    = $row['mobile'];
            $email = $row['email'];
            $website = $row['website'];
            $comment = $row['comment'];
    ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $full_name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $gender; ?></td>
                <td><?php echo $mobile; ?></td>
                <td><?php echo $website; ?></td>
                <td><?php echo $comment; ?></td>
            </tr>
    <?php
        }
    ?>
        </table>
</body>
</html>