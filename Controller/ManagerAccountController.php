<?php require_once("Controller/ConnectDB.php") ?>
<?php
        $msg="";
        $sql = "select * from users";
        $query = mysqli_query($conn,$sql);
    ?>
<?php
        if (isset($_GET["id_delete"])) {
            $sql = "DELETE FROM users WHERE id = ".$_GET["id_delete"];
            mysqli_query($conn,$sql);
            header('Location:Account.php');
        }      
    ?>
<?php
        if(isset($_GET["add"]) && !empty(["search"] !="")){
            $tk = $_GET["search"];
                
            $sql = "SELECT * FROM users WHERE username LIKE '%$tk%' ";
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
    $msg1="";
        if(isset($_POST["update"])){
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $permission = $_POST["permission"];
            if($fullname == ""){
                $msg = "<div class='alert alert-info'>Bạn không được để trống tên !!!</div>";
            }
            if($email == ""){
                $msg = "<div class='alert alert-info'>Bạn không được để trống Email !!!</div>";
            }
            if($fullname !=="" && $email !==""){
            $sql = "UPDATE users SET fullname = '$fullname',email ='$email' , permission = '$permission'  WHERE id = '$id'";
            mysqli_query($conn,$sql);
        }
        header('Location:Account.php');
    }
    function make_permission_dropdown($id){
        $select_1 = "";
        $select_2 = "";
        if ($id == 0) {
            $select_1 = 'selected = "selected"';
        }
        if ($id == 1) {
            $select_2 = 'selected = "selected"';
        }
        $select = '<select id="permission" name="permission">
                        <option value="0" '.$select_1.'>Thành viên thường</option>
                        <option value="1" '.$select_2.'>Admin</option>
                    </select>';

        return $select;
    }
    ?>