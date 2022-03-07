<?php
require_once('./get_connect.php');
$conn = getConnect();
mysqli_query($conn, "set names utf8");
$rs = mysqli_query($conn, "SELECT *,users.name as user_name, users.id as user_id, provinces.name as province_name FROM users LEFT JOIN provinces ON users.province_id = provinces.id");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</head>
<body>
<a class="btn btn-primary" role="button" href="add.php">Thêm</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Phone</th>
        <th scope="col">Age</th>
        <th scope="col">Province</th>
        <th scope="col">Thao tác</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($rs)) {
        ?>
        <tr>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['province_name']; ?></td>
            <td>
                <a href="?id=<?php echo $row['user_id']; ?>&action_name=UPDATE">Sửa</a>
                <a href="?id=<?php echo $row['user_id']; ?>&action_name=DELETE">Xóa</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>