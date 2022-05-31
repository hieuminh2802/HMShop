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
</head>

<body>
    <?php require_once("Controller/AuthController.php") ?>
    <div class="vh-100 bg-light">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <form action="" method="post" class="form">
                            <div class="card-body ">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <div class="text-center">
                                        <a href="index.php">
                                            <img src="Assets/img/logo5.png" alt="" width="60" height="55">
                                        </a>
                                        <h1 class="fw-bold mb-2 text-uppercase">Login</h1>
                                    </div>
                                    <?php echo $msg1; ?>
                                    <div class="form-outline form-white mb-4">
                                        <label for="username" class="form-label">Account</label>
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Account Adress..." required autofocus>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password..." required autofocus>
                                    </div>
                                    <div class="d-grid gap">
                                        <button class="btn btn-outline-light btn-lg px-5" name="login">Login</button>
                                    </div>
                                    <div class="mb-0 text-center">
                                        <p>Don't have an account ? <a href="Register.php"
                                                class="link-light">Register</a></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>