
$(document).ready(function() {

    load_product();

    load_cart_data();

    function load_product() {
        $.ajax({
            url: "Controller/fetch_item.php",
            method: "POST",
            success: function(data) {
                $('#display_item').html(data);
            }
        });
    }

    function load_cart_data() {
        $.ajax({
            url: "Controller/fetch_cart.php",
            method: "POST",
            dataType: "json",
            success: function(data) {
                $('#cart_details').html(data.cart_details);
                $('.total_price').text(data.total_price);
                $('.badge').text(data.total_item);
            }
        });
    }

    $(document).on('click', '.add_to_cart', function() {
        var product_id = $(this).attr("id");
        var product_name = $('#name' + product_id + '').val();
        var product_info = $('#info' + product_id + '').val();
        var product_price = $('#price' + product_id + '').val();
        var product_quantity = $('#quantity' + product_id).val();
        var action = "add";
        if (product_quantity > 0) {
            $.ajax({
                url: "Controller/CartController.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_info: product_info,
                    product_price: product_price,
                    product_quantity: product_quantity,
                    action: action
                },
                success: function(data) {
                    load_cart_data();
                    alert("Sản phẩm đã được thêm vào giỏ hàng");
                }
            });
        } else {
            alert("Vui lòng nhập số lượng");
        }
    });

    $(document).on('click', '.delete', function() {
        var product_id = $(this).attr("id");
        var action = 'remove';
        if (confirm("Bạn có muốn xoá sản phẩm ra khỏi giỏ hàng?")) {
            $.ajax({
                url: "Controller/CartController.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    action: action
                },
                success: function (data) {
                    load_cart_data();
                    location.reload();
                }
            })
        } else {
            return false;
        }
    });

    $(document).on('click', '#clear_cart', function() {
        var action = 'empty';
        if (confirm("Bạn có muốn xoá toàn bộ sản phẩm ra khỏi giỏ hàng?")) {
        $.ajax({
            url: "Controller/CartController.php",
            method: "POST",
            data: {
                action: action
            },
            success: function () {
                load_cart_data();
                location.reload();
            }
        })
        } else {
            return false;
        }
    });

    $('.quantity').change(function () {
        var product_id = $(this).attr('data-product-id');
        var product_quantity = $(this).val();
        var action = 'update';
        console.log(product_quantity);
        if (product_quantity > 0) {
            $.ajax({
                url: "Controller/CartController.php",
                method: "POST",
                data: {product_id: product_id, product_quantity: product_quantity, action: action},
                success: function (data) {
                    load_cart_data();
                    location.reload();
                  
                }
            })
        } else alert("Vui lòng nhập số lượng");

    });

});
