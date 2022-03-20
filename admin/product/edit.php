<?php
$rootDir = str_replace("/admin/category", "", __DIR__);
$rootDir .= "/dals/DalCategory.php";
require_once $rootDir; //auto loading Php - PSR 4 - Laravel sử dụng
$dalCategory = new DalCategory();


$id = $_GET['id'];
$obj = $dalCategory->get($id);
if ($obj == null) {
    header("Location: list.php");
    die();
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $data = array(
        'name' => $name,
    );
    $inserted = $dalCategory->update($data, $id);

    if ($inserted) {
        $success = "Update success";
    } else {
        $failed = "Update failed";
    }
}
$obj = $dalCategory->get($id);
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
            <input type="name" name="name" value="<?php echo $obj->name; ?>" class="form-control" id="name">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
require './../commons/footer.php';
?>
</body>
</html>