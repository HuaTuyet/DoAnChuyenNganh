 <?php 
 session_start();
 include "../library/connect.php";

 function getAdminAccount($obj){
   $sm = $obj->prepare("SELECT * FROM t_account WHERE level = 1");
   $sm->execute();
   $data = $sm->fetchAll();
   return $data;
 }
   $error = "";
    if(isset($_POST['btnLogin']))
    {
     
      if($_POST['txtUsername'] === "" || $_POST['txtPassword'] === "")
        {
          $error = "<p class='login_content_error'>Username hoặc password không để trống</p>";
        }
      else {
        $account = getAdminAccount($obj); 
        foreach ($account as $item){
            $userName = $item['userName'];
            $password = $item['password'];
            $level = $item['level'];
        };

        if($_POST['txtUsername'] == $userName && $_POST['txtPassword'] == $password){
          $_SESSION['userName'] = $userName;
          $_SESSION['password'] = $password;
          $_SESSION['level'] = $level;
          header('Location: index.php');
          exit();
        }
        else if($_POST['txtUsername'] != $userName)
        {
          $error = "<p class='login_content_error'>Username nhập sai</p>";
        }
        else 
        {
          $error = "<p class='login_content_error'>Password nhập sai</p>";
        }
      }
    }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/CSS/reset.css">
  <link rel="stylesheet" href="public/SCSS/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title> Login - Admin Glasses Shop</title>
</head>

<body>
  <div class="wrapper bgOpacity"></div>
  <div class="login">
      <div class="login_image">
        <img src="public/IMAGES/logo.jpg" alt="logo">
      </div>
      <div class="login_content">
        <p class="login_content_text">Admin <span>Glasses Shop</span></p>
        <form action="login.php" method="post">
          <input type="text" name="txtUsername" id="" placeholder="Username">
          <input type="password" name="txtPassword" id="" placeholder="Password">
          <?php echo $error; ?>
          <input type="submit" value="Sign In" class="btn-submit" name="btnLogin">
        </form>
      </div>
    </div>
</body>

</html>