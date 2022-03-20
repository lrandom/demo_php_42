<?php
$rootDir = str_replace("/admin/product", "", __DIR__);
require_once $rootDir . "/dals/DalCategory.php";
if (isset($_POST['name'])
    && isset($_FILES['image']) && $_FILES['image']['name']) {
    //name ///tên file ở client
    //tmp_name //vị trí file trong thư mục tạm thời
    //size //file size byte
    //type //mime type ->loại file
    //error //mã lỗi của file
    $_FILES['image']['name'] = "default.png";
    $uploadsDir = $rootDir . "/uploads/products";
    try {
        //20_03_2022
        $subDir = date("d_m_Y");
        //uploads/products/20_03_2022/
        if (!file_exists($uploadsDir . '/' . $subDir) && !is_dir($uploadsDir . '/' . $subDir)) {
            mkdir($uploadsDir . '/' . $subDir, 0775); //phân quyền unix user/ group /everyone
        }
        $newFileName = $uploadsDir . '/' . $subDir . "/" . time() . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $newFileName);

        require_once $rootDir . "/dals/DalProduct.php"; //auto loading Php - PSR 4 - Laravel sử dụng
        $dalProduct = new DalProduct();
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];


        $data = array(
            'name' => $name,
            'price' => $price,
            'description' => htmlentities($description),
            'category_id' => $category_id,
            'image' => str_replace($rootDir, '', $newFileName)
        );
        $inserted = $dalProduct->add($data);
        if ($inserted) {
            $success = "Add success";
        } else {
            $failed = "Add failed";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        $failed = "Add failed";
    }
}
$dalCategory = new DalCategory();
$categories = $dalCategory->getList();
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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>tinymce.init({
            selector: '#description',
            height: 500,
        });</script>
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

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="image" class="form-label">Image*</label>
            <input type="file" required name="image" class="form-control" id="image">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name*</label>
            <input type="text" required name="name" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price*</label>
            <input type="number" required name="price" class="form-control" id="price">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description*</label>
            <textarea class="form-control" required name="description" id="description">
            </textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category*</label>
            <select name="category_id" class="form-control">
                <?php
                foreach ($categories as $category) {
                    ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name ?></option>
                    <?php
                }
                ?>
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