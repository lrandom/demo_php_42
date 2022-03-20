<?php
$rootDir = str_replace("/admin/category", "", __DIR__);
$rootDir .= "/dals/DalCategory.php";
require_once $rootDir; //auto loading Php - PSR 4 - Laravel sử dụng
$dalCategory = new DalCategory();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    if (is_numeric($id)) {
        if ($action == 'DELETE') {
            //tiến hành xoá
            //nếu là admin thì ko cho xoá
            $dalCategory->delete($id);
        } elseif ($action == 'EDIT') {
            //tiến hành sửa
            header("location: edit.php?id=$id");
        }
    }
}

$page = $_GET['page'] ?? 1; // isset($_GET['page']) ? $_GET['page'] : 1;
$categories = $dalCategory->getList($page);
$totalUsers = $dalCategory->getTotalRows();
$totalPages = ceil($totalUsers / DB::PAGE_SIZE);

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
    <a role="button" class="btn btn-primary" href="add.php">Add</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($categories as $category) {
            ?>
            <tr>
                <th scope="row"><?php echo $category->id; ?></th>
                <td><?php echo $category->name; ?></td>
                <td>
                    <a href="?action=EDIT&id=<?php echo $category->id; ?>" class="btn btn-primary">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete ?')"
                       href="?action=DELETE&id=<?php echo $category->id; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>

    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            for ($i = 1; $i <= $totalPages; $i++) {
                ?>
                <li class="page-item <?php if ($i == $page) {
                    echo 'active';
                } ?>"><a class="page-link" href="?page=<?php echo $i; ?>">
                        <?php echo $i; ?></a></li>
                <?php
            }
            ?>
        </ul>
    </nav>
</div>

<?php
require './../commons/footer.php';
?>
</body>
</html>