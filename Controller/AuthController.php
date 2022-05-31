<?php require_once("Controller/ConnectDB.php") ?>
<!-- Register -->
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';    

    $msg="";
    if(isset($_POST["register"])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn,md5($_POST['password']));
        $rpassword = mysqli_real_escape_string($conn,md5($_POST['rpassword']));
        $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $code = mysqli_real_escape_string($conn,md5(rand()));

        if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE username='{$username}'"))>0) {
            $msg = "<div class='alert alert-danger'>Tài khoản đã tồn tại !!!</div>";
        } else {
            if($password === $rpassword){
            $sql = "INSERT INTO users(username, password, fullname, email, code) VALUES ( '{$username}', '{$password}', '{$fullname}', '{$email}', '{$code}')";
            $result = mysqli_query($conn,$sql);
            
            if($result){
                echo"<div style='display :none;'>";
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'nminhhieu2802@gmail.com';                     //SMTP username
                    $mail->Password   = 'rnxrzuojzugephrj';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('from@example.com', 'Mailer');
                    $mail->addAddress($email);

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'No reply';
                    $mail->Body    = 'Link xác nhận tài khoản của bạn !! <b><a href="http://localhost/HMshop/Login.php?verification='.$code.'">http://localhost/HMshop/?verification='.$code.'</a></b>';

                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo"</div>";
                $msg = "<div class='alert alert-info'>Chúng tôi đã gửi Email xác nhận vào tải khoản Email của bạn</div>";
            }else{
                $msg ="<div class='alert alert-danger'>Đã có lỗi xảy ra trong quá trình đăng ký</div>";
            }
        }else{
            $msg ="<div class ='alert alert-danger'> Mật khẩu xác nhận không trùng khớp</div>";
            }
        }
    }
?>
<!-- login -->
<?php 
    $msg1 ="";
    if(isset($_GET['verification'])){
        if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE code = '{$_GET['verification']}'"))>0){
            $query =  mysqli_query($conn,"UPDATE users SET code = '' WHERE code ='{$_GET['verification']}'");

            if($query){
                $msg1 ="<div class='alert alert-success'>Tài khoản của bạn đã được kích hoạt</div>";
            }

        }else {
            header("Location: Login.php");
        }
    }
        if(isset($_POST["login"])){
            $username = mysqli_real_escape_string($conn,$_POST["username"]);
            $password = mysqli_real_escape_string($conn,md5($_POST["password"]));

            $sql = "SELECT * FROM users WHERE username='{$username}' AND password='{$password}'";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)===1){
                $row = mysqli_fetch_assoc($result);
                
                if(empty($row['code'])){
                    if($row['permission'] == 1){
                        header("Location: Admin.php");
                    }else{
                        header("Location: Home.php");
                    }
                }else{
                    $msg1 = "<div class='alert alert-info'>Trước tiên hãy xác nhận tài khoản của bạn</div>";
                }
            }else {
                $msg1 ="<div class='alert alert-danger'>Tài khoản hoặc mật khẩu không đúng</div>";
            }

        }
    
?>