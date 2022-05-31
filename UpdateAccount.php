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

    <title>Document</title>
</head>

<body>
    <?php require_once("Controller/ManagerAccountController.php") ?>
    <!-- start header -->
    <?php include "includes/headerAdmin.php" ?>
    <!-- endheader -->
    <!-- start main -->
    <div class="container">
        <h3 class="text-center">Thay đổi thông tin</h3>
        <?php echo $msg1; ?>
        <form action="" method="post" class="row g-3">
            <div class="col-md-12">
                <label for="fullname" class="form-label">Name</label>
                <input type="text" name="fullname" class="form-control" placeholder="Name..." required autofocus>
            </div>
            <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email..." required autofocus>
            </div>
            <div class="col-md-12">
                <Label for="permisstion" class="input-label"> Quyền</Label>
                <?php echo make_permission_dropdown(['permission']); ?>
            </div>
            <div class="">
                <button class="btn btn-success" type="submit" name="update">Cập nhật thông tin </button>
            </div>
        </form>
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