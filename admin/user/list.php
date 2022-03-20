<?php
$rootDir = str_replace("/admin/user", "", __DIR__);
$rootDir .= "/dals/DalUser.php";
require_once $rootDir; //auto loading Php - PSR 4 - Laravel sử dụng
$dalUser = new DalUser();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    if (is_numeric($id)) {
        if ($action == 'DELETE') {
            //tiến hành xoá
            //nếu là admin thì ko cho xoá
            $dalUser->delete($id);
        } elseif ($action == 'EDIT') {
            //tiến hành sửa
            header("location: edit.php?id=$id");
        }
    }
}

$page = $_GET['page'] ?? 1; // isset($_GET['page']) ? $_GET['page'] : 1;
$users = $dalUser->getList($page);
$totalUsers = $dalUser->getTotalRows();
$totalPages = ceil($totalUsers / DalUser::PAGE_SIZE);

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
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($users as $user) {
            ?>
            <tr>
                <th scope="row"><?php echo $user->id; ?></th>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->phone; ?></td>
                <td><?php echo $user->address; ?></td>
                <td>
                    <?php if ($user->role == 1) {
                        echo "<span class='badge bg-primary'>User</span>";
                    } else {
                        echo "<span class='badge bg-danger'>Admin</span>";
                    } ?></td>
                <td>
                    <a href="?action=EDIT&id=<?php echo $user->id; ?>" class="btn btn-primary">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete ?')"
                       href="?action=DELETE&id=<?php echo $user->id; ?>" class="btn btn-danger">Delete</a>
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
                <li class="page-item <?php if($i==$page){echo 'active';} ?>"><a class="page-link" href="?page=<?php echo $i; ?>">
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