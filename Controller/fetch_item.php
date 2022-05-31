<?php

//fetch_item.php

include('config.php');

$query = "SELECT * FROM product ORDER BY id DESC";

$statement = $conn->prepare($query);

if($statement->execute())
{
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '
		<div class="col-md-4" style="margin-top:12px;">  
            <div class="product">
			<a href="Detail.php?id='.$row["id"].'" >
			<img src="Assets/img/'.$row["image"].'" class="rounded mx-auto d-block" style="height: 200px;"/><br /></a>	
            	<h4 class="text-center fw-bolder">'.$row["name"].'</h4>
				<h5 class="text-center lead">'.$row["info"].'</h5>
            	<h6 class="text-center ">'.number_format($row["price"]).' VNĐ</h6>
            	<input type="hidden" name="quantity" id="quantity' . $row["id"] .'" class="form-control" value="1" />
            	<input type="hidden" name="hidden_name" id="name'.$row["id"].'" value="'.$row["name"].'" />
				<input type="hidden" name="hidden_info" id="info'.$row["id"].'" value="'.$row["info"].'" />
            	<input type="hidden" name="hidden_price" id="price'.$row["id"].'" value="'.$row["price"].'" />
            	<input type="button" name="add_to_cart" id="'.$row["id"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Thêm vào giỏ hàng" />
            </div>
        </div>
		';
	}
	echo $output;
}


?>