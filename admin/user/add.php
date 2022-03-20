<?php
if (isset($_POST['email'])) {
    $rootDir = str_replace("/admin/user", "", __DIR__);
    $rootDir .= "/dals/DalUser.php";
    require_once $rootDir; //auto loading Php - PSR 4 - Laravel sử dụng
    $dalUser = new DalUser();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $data = array(
        'email' => $email,
        'password' => md5($password),
        'name' => $name,
        'phone' => $phone,//salt
        'address' => $address,
        'role' => $role
    );
    $inserted = $dalUser->add($data);
    if ($inserted) {
        $success = "Add success";
    } else {
        $failed = "Add failed";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List User</title>
    <?php
    require './../commons/head.php';
    ?>
</head>
<body>

<?php
require './../commons/nav.php';
?>

<div class="container" style="min-height:100vh;margin-top:5rem">
    <?php
    if (isset($success)) {
        ?>
        <div class="alert alert-success">
            <?php echo $success; ?>
        </div>
        <?php
    }

    if (isset($failed)) {
        ?>
        <div class="alert alert-danger">
            <?php echo $failed; ?>
        </div>
        <?php
    }
    ?>

    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address *</label>
            <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password*</label>
            <input type="password" name="password" required class="form-control" id="exampleInputPassword1">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone*</label>
            <input type="text" name="phone" required class="form-control" id="phone">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="address">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="name" name="name" class="form-control" id="name">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" class="form-control" id="role">
                <option value="1">User</option>
                <option value="2">Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
require './../commons/footer.php';
?>
</body>
</html>