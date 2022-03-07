<?php
$conn = mysqli_connect("127.0.0.1", "root", "koodinh@", "php_42");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//thực thi query insert vào database
/*$name = "Nguyễn Văn A";
$address = "Hà Nội";
$phone = "0987654321";
$age = 18;
$province_id = 1;
$sql = "INSERT INTO users(name, address, phone,age,province_id) 
           VALUES('$name', '$address', '$phone', $age, '$province_id')";
mysqli_query($conn, $sql);*/

//thực thi query update
/*$sql = "UPDATE users SET name = 'Nguyễn Văn B' WHERE id = 18";
mysqli_query($conn, $sql);*/

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Address</th>
    </tr>
    </thead>

    <tbody>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['age'] ?></td>
                <td><?php echo $row['address'] ?></td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>
</body>
</html>