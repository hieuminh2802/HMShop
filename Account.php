<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMshop</title>

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
    <?php require_once("Controller/ManagerAccountController.php") ?>
    <!-- start header -->
    <?php include "includes/headerAdmin.php" ?>
    <!-- endheader -->
    <!-- star main -->
    <div class="container">
        <div class="col-md-12">
            <h2 class="title text-center">Quản lý tài khoản</h2>
            <div class="search">
                <form action="" method="GET" class="form">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Điền từ khoá </label>
                        <div class="input-group mb-3">
                            <input type="text" id="search" name="search" class="form-control"
                                placeholder="Nhập từ khoá tìm kiếm ....">
                            <button class="btn btn-outline-secondary btn-warning" name="add">Tìm kiếm <i
                                    class="bi bi-search"></i> </button>
                        </div>
                    </div>
                </form>
            </div>
            <?php echo $msg; ?>
            <table class="table table-striped table-hover text-center">
                <tr>
                    <th>STT</th>
                    <th>Tên đăng nhập</th>
                    <th>Tên đầy đủ</th>
                    <th>Quyền</th>
                    <th>email</th>
                    <th>Hành động</th>
                </tr>
                <?php
                while ($data = mysqli_fetch_array($query)){
                    $i =1;
                    $id = $data['id'];
                ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $data['username'] ?></td>
                    <td><?php echo $data['fullname'] ?></td>
                    <td><?php echo ($data['permission'] == 0) ? "Thành viên thường" : "Admin"; ?></td>
                    <td><?php echo $data['email'] ?></td>
                    <td>
                        <a href="UpdateAccount.php?id=<?php echo $id;?>" class="btn btn-success btn-block"
                            id="clear_cart">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="Account.php?id_delete=<?php echo $id;?>" class="btn btn-danger btn-block">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
                $i++;
                }
            ?>
            </table>
        </div>
    </div>
    </div>
    <!-- end main -->
    <!-- footer -->
    <?php include "includes/footer.php" ?>
    <!-- end footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>