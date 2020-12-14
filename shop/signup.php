<?php 
	session_start();
	include "../library/connect.php";

 function createUserAccount($obj, $data){
		$sm = $obj->prepare("INSERT INTO t_account VALUES (:username, :email, :password, :level)");
		$sm->bindParam(":username", $data['username'], PDO::PARAM_STR);
		$sm->bindParam(":email", $data['email'], PDO::PARAM_STR);
		$sm->bindParam(":password", $data['password'], PDO::PARAM_STR);
		$sm->bindParam(":level", $data['level'], PDO::PARAM_STR);
		$sm->execute();
 }

   $error = "";		
		if(isset($_POST['signup'])){
			var_dump($_POST);
			if($_POST['username'] == ""){
				$error = "<p class='login_content_error'>Username không để trống</p>";
			}
			else if($_POST['email'] == ""){
				$error = "<p class='login_content_error'>Email không để trống</p>";
			}
			else if($_POST['password'] == ""){
				$error = "<p class='login_content_error'>Password không để trống</p>";
			}
			else{
				$data['username'] = $_POST['username'];
				$data['email'] = $_POST['email'];
				$data['password'] = $_POST['password'];
				$data['level'] = 2;
				createUserAccount($obj, $data);
				$success = "<p>Bạn đã đăng kí thành công. Đăng nhập ngay để tiếp tục mua hàng</p>";
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
      <form action="signup.php" method="post" id="formSignUp">
        <h1>Tạo tài khoản</h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="#" class="social"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
          <a href="#" class="social"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
        </div>
        <span>hoặc đăng kí tài khoản của bạn</span>
        <input type="text" placeholder="Username" name="username" />
        <input type="email" placeholder="Email" name="email" />
				<input type="password" placeholder="Mật khẩu" name="password" />
				<?php echo $error ?>
        <input type="submit" value="Đăng kí" name="signup">
      </form>
    </div>
    
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <h1>Xin chào!</h1>
          <?php if(isset($success)) echo $success;
          else echo "<p>Bạn đã có tài khoản? Đăng nhập ngay!</p>"; ?>
          <button class="ghost" id="signIn"><a href="signin.php">Đăng nhập</a></button>
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