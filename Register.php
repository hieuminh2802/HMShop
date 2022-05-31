<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMshop</title>

    <link rel="stylesheet" href="../Assets/css/login.css">

    <!-- FA -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php require_once("Controller/AuthController.php") ?>
    <div class="vh-100 bg-light">
        <div class="container py-4 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <a href="index.php">
                                    <img src="Assets/img/logo5.png" alt="" width="60" height="55">
                                </a>
                                <h1 class="fw-bold mb-2 text-uppercase">Register</h1>
                            </div>
                            <?php echo $msg; ?>
                            <form action="" method="post" class="row g-3">
                                <div class="col-md-12">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username..."
                                        required autofocus>
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Password..." required autofocus>
                                </div>
                                <div class="col-md-6">
                                    <label for="rpassword" class="form-label">Repeat your password</label>
                                    <input type="password" name="rpassword" class="form-control"
                                        placeholder="Repeat your password..." required autofocus>
                                </div>
                                <div class="col-md-12">
                                    <label for="fullname" class="form-label">Name</label>
                                    <input type="text" name="fullname" class="form-control" placeholder="Name..."
                                        required autofocus>
                                </div>
                                <div class="col-md-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email..."
                                        required autofocus>
                                </div>
                                <div class="d-grid gap">
                                    <button class="btn btn-outline-light btn-lg px-5" name="register">Register</button>
                                </div>
                                <div class="mb-0 text-center">
                                    <p>Have an account ? <a href="Login.php" class="link-light">Login</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>