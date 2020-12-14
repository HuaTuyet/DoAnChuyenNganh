<?php 
	session_start();
	include "../library/connect.php";

 function getUserAccount($obj, $data){
   $sm = $obj->prepare("SELECT * FROM t_account 
	 WHERE userName = :username");
	 $sm->bindParam(":username", $data['username'], PDO::PARAM_STR);
	 $sm->execute();
	 $account = $sm->fetchAll();
	 return $account;
 }
 function checkUserAccount($obj, $data){
	 $sm = $obj->prepare("SELECT * FROM t_account WHERE userName = :username");
	 $sm->bindParam(":username", $data['username'], PDO::PARAM_STR);
	 $sm->execute();
	 $row = $sm->rowCount();
	 if($row != 0 )
		 return true;
	 else
		return false;
 }

   $error = "";
    if(isset($_POST['signin']))
    {
     var_dump($_POST);
      if($_POST['txtUsername'] === "" || $_POST['txtPassword'] === "")
        {
          $error = "<p class='login_content_error'>Username hoặc password không để trống</p>";
        }
      else {
				$data['username'] = $_POST['txtUsername'];
				$data['password'] = $_POST['txtPassword'];
				$data['level'] = 2;
				$check = checkUserAccount($obj, $data); 
				if($check){
					$account = getUserAccount($obj, $data);
					foreach($account as $item){
						$userName = $item['userName'];
            $password = $item['password'];
            $level = $item['level'];
					}
					//var_dump($account);
					if($password == $_POST['txtPassword']){
						$_SESSION['signin']['userName'] = $userName;
						$_SESSION['signin']['password'] = $password;
						$_SESSION['signin']['level'] = $level;
						header('Location: index.php');
						exit();
					}
					else{
						$error = "<p class='login_content_error'>Password nhập sai</p>";
					}
				}
				else {
					$error = "<p class='login_content_error'>Tài khoản không tồn tại</p>";
				}
				
        // foreach ($account as $item){
        //     $userName = $item['userName'];
        //     $password = $item['password'];
        //     $level = $item['level'];
        // };

        // if($_POST['txtUsername'] == $userName && $_POST['txtPassword'] == $password){
        //   $_SESSION['userName'] = $userName;
        //   $_SESSION['password'] = $password;
				// 	$_SESSION['level'] = $level;
        //   header('Location: index.php');
        //   exit();
        // }
        // else if($_POST['txtUsername'] != $userName)
        // {
        //   $error = "<p class='login_content_error'>Username nhập sai</p>";
        // }
        // else 
        // {
        //   $error = "<p class='login_content_error'>Password nhập sai</p>";
        // }
      }
		}
?>

<!DOCTYPE html>
<html lang="vn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in/up</title>
  <link rel="stylesheet" href="./public/styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <!-- <h2>Weekly Coding Challenge #1: Sign in/up Form</h2> -->
  <div class="container" id="container">
    <div class="form-container sign-in-container">
      <form action="signin.php" method="post">
        <h1>Đăng nhập</h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="#" class="social"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
          <a href="#" class="social"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
        </div>
        <span>hoặc sử dụng tài khoản của bạn</span>
        <input type="text" placeholder="Username" name="txtUsername" />
        <input type="password" placeholder="Mật khẩu" name="txtPassword" />
        <?php echo $error ?>
        <a href="#">Quên mật khẩu?</a>
        <input type="submit" value="Đăng nhập" name="signin">
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <!-- <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>To keep connected with us please login with your personal info</p>
          <button class="ghost" id="signIn">Sign In</button>
        </div> -->
        <div class="overlay-panel overlay-right">
          <h1>Xin chào!</h1>
          <p>Bạn hãy đăng nhập để mua hàng nhé. Bạn là thành viên mới? </p>
          <button class="ghost" id="signUp"><a href="signup.php">Đăng kí</a></button>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <p>
      Created with <i class="fa fa-heart"></i> by
      <a target="_blank" href="https://florin-pop.com">Florin Pop</a>
      - Read how I created this and how you can join the challenge
      <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
    </p>
  </footer>

  <!-- <script src="public/script.js"></script> Ko chuyển đổi login và log out--> 
</body>

</html>