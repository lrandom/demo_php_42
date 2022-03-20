<?php
if (isset($_POST['name'])) {
    $rootDir = str_replace("/admin/category", "", __DIR__);
    $rootDir .= "/dals/DalCategory.php";
    require_once $rootDir; //auto loading Php - PSR 4 - Laravel sử dụng
    $dalCategory = new DalCategory();

    $name = $_POST['name'];

    $data = array(
        'name' => $name
    );
    $inserted = $dalCategory->add($data);
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
            <label for="name" class="form-label">Name</label>
            <input type="name" required name="name" class="form-control" id="name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
require './../commons/footer.php';
?>
</body>
</html>