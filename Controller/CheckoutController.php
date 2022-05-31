<?php
    session_start();
	function load_cart(){
		$total_price = 0;
		$total_item = 0;

		$output = '
		<div class="table-responsive" id="order_table">
			<table class="table table-bordered table-striped text-center">
				<tr>  
					<th >Mã Sản Phẩm</th> 
					<th >Tên Sản Phẩm</th>
					<th >Thông tin</th>   
					<th >Số Lượng</th>  
					<th >Giá</th>  
					<th >Tổng tiền</th>  
					<th >Thao Tác</th>  
				</tr>
		';
		if(!empty($_SESSION["shopping_cart"]))
		{
			foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
				$output .= '
				<tr>
					<td>'.$values["product_id"].'</td>
					<td>'.$values["product_name"].'</td>
					<td>'.$values["product_info"].'</td>
					<td><input data-product-id ="'.$values["product_id"].'" type="number" name="quantity"  class="form-control quantity" value="'.$values["product_quantity"].'" min="1" max="10" /></td>
					<td align="right">'.number_format($values["product_price"]).' VNĐ</td>
					<td align="right">'.number_format($values["product_quantity"] * $values["product_price"]).' VNĐ</td>
					<td><button name="delete" class="btn btn-warning btn-xs delete" id="'. $values["product_id"].'"><i class="bi bi-trash"></i></button></td>
				</tr>
				';
				$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
                
			}
            $output = substr($output, 0, -2);
			$output .= '
            <tr>  
             <td colspan="5" align="right">Total :</td>  
             <td class="total" >'.number_format($total_price).' VNĐ</td>
             <td>   <a href="#" class="btn btn-danger" id="clear_cart">
             <i class="bi bi-cart-x"></i>
             </a>
             <a href="checkout.php" class="btn btn-info" >
             Thanh Toán <i class="bi bi-credit-card-2-front"></i>
             </a>
             </td> 
            </tr>
			';
		}
		$output .= '</table></div>';
		echo $output;

	}

?>