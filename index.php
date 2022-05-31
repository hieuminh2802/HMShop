<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMShop</title>
    <!-- FA -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
    <?php require_once("Controller/AuthController.php") ?>
    <!-- start header -->
    <?php include "includes/header.php" ?>
    <!-- end header -->
    <!-- start main -->
    <?php include "includes/banner.php" ?>
    <div class="container">
        <h2 class="text-center fw-bold pb-2 border-bottom ">Sản phẩm nổi bật</h2>
        <div class="col-md-12 bg-light bg-opacity-50">
            <div class="col-md-12">
                <div class="row">
                    <?php
                        $sql = "SELECT * FROM product";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($result)){?>
                    <div class="col-md-4">

                        <form action="index.php?id=<?=$row['id']?>" method="post">
                            <div class="product">
                                <img src="Assets/img/<?=$row['image']?>" class="rounded mx-auto d-block"
                                    style='height: 200px;'>
                                <h4 class="text-center "><?= $row['name']; ?></h4>
                                <h6 class="text-center lead" name="info"><?= $row['info']; ?></h6>
                                <input type="hidden" name="info" value="<?= $row['info']; ?>">
                                <h6 class="text-center"><?=number_format($row['price']); ?> VNĐ</h6>
                                <input type="hidden" name="name" value="<?= $row['name']; ?>">
                                <input type="hidden" name="price" value="<?= $row['price']; ?>">
                                <input type="hidden" name="quantity" value="1" min="1" class="form-control">
                                <div class="d-grid gap-2">
                                    <button type="submit" name="addtocart" class="btn btn-success btn-block my-2">Thêm
                                        vào giỏ hàng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/CustomCard.php" ?>
    <!-- end main -->
    <!-- footer -->
    <?php include "includes/footer.php" ?>
    <!-- end footer -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>