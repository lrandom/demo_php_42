<?php
include_once './get_connect.php';
$conn = getConnect();
mysqli_query($conn, "SET NAMES 'utf8'");
$provinceRs = mysqli_query($conn, "SELECT * FROM provinces");
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $provinceId = $_POST['province_id'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    mysqli_query($conn, "INSERT INTO users(name,age,province_id,phone,address) 
VALUES('$name',$age,'$provinceId','$phone','$address')");
}
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
<form style="padding:200px" method="post">
    <div class="mb-3">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="inputName" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" id="inputAddress" aria-describedby="emailHelp">
    </div>


    <div class="mb-3">
        <label for="inputPhone" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" id="inputPhone" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="inputAge" class="form-label">Age</label>
        <input type="text" name="age" class="form-control" id="inputAge" aria-describedby="emailHelp">
    </div>


    <div class="mb-3">
        <label for="inputProvince" class="form-label">Province</label>
        <select name="province_id" class="form-control">
            <?php
            while ($row = mysqli_fetch_assoc($provinceRs)) {
                ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>