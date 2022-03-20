<?php
$rootDir = str_replace("/admin/product", "", __DIR__);
$rootDir .= "/dals/DalProduct.php";
require_once $rootDir; //auto loading Php - PSR 4 - Laravel sử dụng
$dalProduct = new DalProduct();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    if (is_numeric($id)) {
        if ($action == 'DELETE') {
            //tiến hành xoá
            //nếu là admin thì ko cho xoá
            $dalProduct->delete($id);
            //xoá ảnh
            try {
                //xoá ảnh
            }catch (Exception $ex) {
                echo $ex->getMessage();
            }
        } elseif ($action == 'EDIT') {
            //tiến hành sửa
            header("location: edit.php?id=$id");
        }
    }
}

$page = $_GET['page'] ?? 1; // isset($_GET['page']) ? $_GET['page'] : 1;
$products = $dalProduct->getList($page);
$totalUsers = $dalProduct->getTotalRows();
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
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($products as $product) {
            ?>
            <tr>
                <th scope="row"><?php echo $product->id; ?></th>
                <td>
                    <img onclick="_openModal('<?php echo BASE_URL . $product->image; ?>')"
                         src="<?php echo BASE_URL . $product->image; ?>"
                         width="100"
                         alt="<?php echo $product->name; ?>" width="100">

                </td>
                <td><?php echo $product->name; ?></td>
                <td><?php echo $product->price; ?></td>
                <td>
                    <a href="?action=EDIT&id=<?php echo $product->id; ?>" class="btn btn-primary">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete ?')"
                       href="?action=DELETE&id=<?php echo $product->id; ?>" class="btn btn-danger">Delete</a>
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


<div class="preview-image hide">
    <div class="content">
        <button role="button" class="btn-close-modal" onclick="_closeModal()">x</button>
        <img src="" alt="" id="preview-image">
    </div>
</div>
<style>
    .preview-image {
        position: fixed;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        background: rgba(0, 0, 0, 0.38);
        display: flex;
        padding: 5rem;
        justify-content: center;
        align-items: center;
        z-index: 50;
    }

    .preview-image > .content {
        position: relative;
        width: 100%;
        height: 100%;
        background: #fff;
        border-radius: 5px;
    }

    .preview-image > .content .btn-close-modal {
        position: absolute;
        width: 3rem;
        height: 3rem;
        border-radius: 999px;
        background: white;
        right: -10px;
        top: -10px;
        borer:none;
        outline: none;
    }

    .preview-image > .content img{
        width: 100%;
        height: 100%;
    }

    .hide{
        display: none;
    }



</style>
<script>
    function _openModal(imagePath) {
        document.querySelector('.preview-image').classList.remove('hide');
        const imageElem = document.querySelector('.preview-image .content img');
        imageElem.src = imagePath;
    }

    function _closeModal() {
        document.querySelector('.preview-image').classList.add('hide');
    }
</script>
<?php
require './../commons/footer.php';
?>
</body>
</html>