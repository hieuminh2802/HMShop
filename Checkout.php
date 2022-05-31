<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMshop</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <?php 
          include './Controller/PaymentController.php';?>
    <!-- start header -->
    <?php include "includes/headerHome.php" ?>
    <!-- end header -->
    <!-- start main -->

    <div class="container">
        <div class="col-md-12">
            <h2 class="title text-center">Giỏ hàng</h2>
            <?php load_checkout();?>
        </div>
    </div>

    <div class="payments ">
        <div class="container">
            <div class="payment_cart row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">Thanh Toán PayPal</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="false">Thanh Toán Sau
                                Khi Nhận Hàng</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div div id="paypal-button-container">
                                <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
                                <script>
                                var total = <?= total()?>;
                                paypal.Buttons({
                                    // Sets up the transaction when a payment button is clicked
                                    createOrder: (data, actions) => {
                                        return actions.order.create({
                                            purchase_units: [{
                                                amount: {
                                                    value: total // Can also reference a variable or function
                                                }
                                            }]
                                        });
                                    },
                                    // Finalize the transaction after payer approval
                                    onApprove: (data, actions) => {
                                        return actions.order.capture().then(function(orderData) {
                                            // Successful capture! For dev/demo purposes:
                                            console.log('Capture result', orderData, JSON.stringify(
                                                orderData, null, 2));
                                            const transaction = orderData.purchase_units[0].payments
                                                .captures[0];
                                            if (transaction.status === 'COMPLETED') {
                                                // location.reload();
                                                alert('Thanh Toán thành công');

                                            }
                                            // When ready to go live, remove the alert and show a success message within this page. For example:
                                            // const element = document.getElementById('paypal-button-container');
                                            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                            // Or go to another URL:  actions.redirect('thank_you.html');
                                        });

                                    }
                                }).render('#paypal-button-container');
                                </script>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form method="POST">
                                <div class="p-5 ">
                                    <div class="form-outline form-white mb-2">
                                        <label class="form-label">Tên người nhận</label>
                                        <input type="text" class="form-control form-control-sm" name="name" />
                                    </div>

                                    <div class="form-outline form-white mb-2">
                                        <label class="form-label">Số điện thoại:</label>
                                        <input type="text" class="form-control form-control-sm" name="phone" />
                                    </div>
                                    <div class="form-outline form-white mb-2">
                                        <label class="form-label">Tỉnh, Thành phố:</label>
                                        <input type="text" class="form-control form-control-sm" name="city" />
                                    </div>
                                    <div class="form-outline form-white mb-2">
                                        <label class="form-label">Quận, Huyện:</label>
                                        <input type="text" class="form-control form-control-sm" name="district" />
                                    </div>
                                    <div class="form-outline form-white mb-2">
                                        <label class="form-label">Xã, Phường:</label>
                                        <input type="text" class="form-control form-control-sm" name="wards" />
                                    </div>
                                    <div class="form-outline form-white mb-2">
                                        <label class="form-label">Địa chỉ cụ thể:</label>
                                        <input type="text" class="form-control form-control-sm" name="street" />
                                    </div>
                                    <button class="btn btn-primary" name="add">Đặt Hàng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main -->
    <!-- footer -->
    <?php include "includes/footer.php" ?>
    <!-- end footer -->
    <script src="Assets/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>