<?php
function detail_product(){
        $conn = new PDO("mysql:host=localhost;dbname=qlbh", "root", "");
        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $query = " SELECT * FROM product WHERE id=$id ORDER BY id ASC ";
          $statement = $conn ->prepare($query);
  
          if($statement->execute())
          {
          $result = $statement->fetchAll();
          $output = '';
          foreach($result as $row)
          {
          $output .= '
                  <div class="container">
                      <div class="row align-items-center">
                          <div class="col-md-4"><img class="rounded mx-auto d-block" style="height: 400px;" src="Assets/img/'.$row["image"].'"" alt="..."></div>
                          <div class="col-md-8">
                              <div class="mb-1">MSP: IPS-'.$row["id"].'</div>
                              <h2 class="display-6 fw-bolder">'.$row["name"].'</h2>
                              <ul class="rating nav" style="list-style: none; color:green;">
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                </ul>
                              <div class="fs-5 mb-2">
                                  <span>'.number_format($row["price"]).' VNĐ</span>
                              </div>
                              <div class="fs-5 mb-2">
                                  <span>'.$row["info"].'</span>
                              </div>
                              <p class="lead">Super Retina XDR displayfootnote¹ with ProMotion for a faster, more responsive feel</p>
                              <p class="lead">Biggest Pro camera system upgrade ever for epic low-light shots and macro photography</p>
                              <p class="lead">A15 Bionic with 5-core GPU — the fastest chip ever in a smartphone</p>
                              <div class="">
                              <input type="hidden" name="hidden_name" id="name'.$row["id"].'" value="'.$row["name"].'" />
                              <input type="hidden" name="hidden_price" id="info'.$row["id"].'" value="'.$row["info"].'" />
                              <input type="hidden" name="hidden_price" id="price'.$row["id"].'" value="'.$row["price"].'" />
                              <div class ="">
                              <input type="number" name="quantity" id="quantity'.$row["id"].'" min="1" max="10" class="form-control" value="1" style="max-width: 20%" />
                              <input type="button" name="add_to_cart" id="'.$row["id"].'" class="btn btn-outline-success mt-3 p-2 form-control add_to_cart" style="max-width: 30%" value="Add to Cart" />
                              </div>
                              </div>
                          </div>
                      </div>
                  </div>
          ';
          }
          echo $output;
          }
      } 
    }
?>