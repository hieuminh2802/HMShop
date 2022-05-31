<?php
    session_start();
	function load_checkout(){
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
					<td>'.$values["product_quantity"].'</td>
					<td align="right">'.number_format($values["product_price"]).' VNĐ</td>
					<td align="right">'.number_format($values["product_quantity"] * $values["product_price"]).' VNĐ</td>
				</tr>
				';
				$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
                
			}
            $output = substr($output, 0, -2);
			$output .= '
            <tr>  
             <td colspan="5" align="right">Total :</td>  
             <td class="total" align="right" >'.number_format($total_price).' VNĐ</td>
            </tr>
			';
		}
		$output .= '</table></div>';
		echo $output;

	}
    function total(){
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
					<td>'.$values["product_quantity"].'</td>
					<td align="right">'.number_format($values["product_price"]).' VNĐ</td>
					<td align="right">'.number_format($values["product_quantity"] * $values["product_price"]).' VNĐ</td>
				</tr>
				';
				$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
                
			}
            $output = substr($output, 0, -2);
			$output .= '
            <tr>  
             <td colspan="5" align="right">Total :</td>  
             <td class="total" align="right" >'.number_format($total_price).' VNĐ</td>
            </tr>
			';
			$total = round(($total_price/23000),2);
		}
		$output .= '</table></div>';
		echo $total;

	}
?>
<?php require_once("Controller/ConnectDB.php") ?>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';    

    if(isset($_POST["add"])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
		$city = $_POST['city'];
		$district = $_POST['district'];
		$wards = $_POST['wards'];
		$street = $_POST['street'];
											
        $sql = "INSERT INTO payments(name, phone, city, district, wards, street) VALUES ( '{$name}', '{$phone}', '{$city}', '{$district}', '{$wards}','{$street}')";
        $result = mysqli_query($conn,$sql);
            
	    $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'nminhhieu2802@gmail.com';                     //SMTP username
                    $mail->Password   = 'rnxrzuojzugephrj';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('from@example.com', 'Mailer');
                    $mail->addAddress('hieuhangkhong@gmail.com');

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Mail Payments';
					    $total_price = 0;
						$total_item = 0;
						$output = '';
						if(!empty($_SESSION["shopping_cart"]))
							{
								foreach($_SESSION["shopping_cart"] as $keys => $values)
								{
									$output .= '
									<tr>
										<td>'.$values["product_name"].'</td>
										<td>'.$values["product_info"].'</td>
										<td>'.$values["product_quantity"].'</td>
										<td align="right">'.number_format($values["product_price"]).' VNĐ</td>
										<td align="right">'.number_format($values["product_quantity"] * $values["product_price"]).' VNĐ</td>
									</tr>
									';
									$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
									
								}
								$output = substr($output, 0, -2);
								$output .= '
								<tr>  
								<td colspan="5" align="right">Tổng tiền :</td>  
								<td class="total" align="right" >'.number_format($total_price).' VNĐ</td>
								</tr>
								';
							}
					$output .= '</table></div>';
					$mail->Body    = 
					'
					<p>Tên Người nhận : '.$name.' </p>
					<p>Số điện thoại  : '.$phone.' </p>
					<p>Địa chỉ : '.$street.','.$wards.','.$district.','.$city.'</p>
					<div class="table-responsive" id="order_table">
						<table class="table table-bordered table-striped text-center">
							<tr>  
								<th >Tên Sản Phẩm</th>
								<th >Thông tin</th>   
								<th >Số Lượng</th>  
								<th >Giá</th>  
								<th >Tổng tiền</th>  
								</tr>'.$output.'<td colspan="3"></td>';
                    $mail->send();
					echo "<script>alert('Đặt hàng thành công')</script>";
                    unset($_SESSION["shopping_cart"]);
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			echo '<pre>';
				print_r($e);
			echo '</pre>';die;
		}
	}

?>