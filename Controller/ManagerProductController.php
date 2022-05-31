<?php require_once("Controller/ConnectDB.php") ?>
<?php
        $msg="";
        $sql = "SELECT * FROM product";
        $query = mysqli_query($conn,$sql);
?>
<?php
        if (isset($_GET["id_delete"])) {
            $sql = "DELETE FROM product WHERE id = ".$_GET["id_delete"];
            mysqli_query($conn,$sql);
            header('Location:Product.php');
        }      
?>
<?php
        if(isset($_GET["add"]) && !empty(["search"] !="")){
            $tk = $_GET["search"];
                
            $sql = "SELECT * FROM Product WHERE name LIKE '%$tk%' ";
            $query =mysqli_query($conn,$sql);
            $num = mysqli_num_rows($query);
            if ($num > 0) {
            } 
            else {
                $msg ="<div class='alert alert-danger'>Không tìm thấy kết quả</div>";
            }
        }
?>
<?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }
    ?>
<?php
        if(isset($_POST["update"])){
                $name = $_POST["name"];
                $info = $_POST["info"];
                $price = $_POST["price"];
                $image = $_POST["image"];
                if($name == ""){
                     $msg = "<div class='alert alert-info'>Bạn không được để trống tên sản phẩm !!!</div>";
                }
                if($info == ""){
                     $msg = "<div class='alert alert-info'>Bạn không được để trống mô tả sản phẩm !!!</div>";
                }
                if($price == ""){
                    $msg = "<div class='alert alert-info'>Bạn không được để trống giá sản phẩm !!!</div>";
                }
                if($image == ""){
                     $msg = "<div class='alert alert-info'>Bạn không được để trống hình ảnh sản phẩm !!!</div>";
                }
                if($name !=="" && $info !=="" && $price !=="" && $image !==""){
                $sql = "UPDATE product SET name = '$name', info ='$info' , price = '$price', image ='$image'  WHERE id = '$id'";
                mysqli_query($conn,$sql);
            }
            header('Location:Product.php');
        }
    ?>
<?php
     $msg2="";
     if(isset($_POST["additem"])){
        $name = $_POST["name"];
        $info = $_POST["info"];
        $price = $_POST["price"];
        $image =$_POST["image"];
        
        if($name =="" ||$info ==""||$price ==""||$image =="")
        {
             $msg2 ="<div class='alert alert-danger'>Bạn không được để trống thông tin</div>";
        }else{
            $sql = "INSERT INTO Product(name,price,info,image) VALUES ( '$name','$price','$info','$image')";
            mysqli_query($conn,$sql);
            $msg2 ="<div class='alert alert-success'>Thêm sản phẩm thành công</div>";
            }
            header('Location:Product.php');
        }
    ?>