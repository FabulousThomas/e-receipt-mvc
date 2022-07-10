<?php

session_start();
// require_once "./functions/connection.php";
// require_once "./functions/function.php";
// require_once "./functions/login.php";
// include "./functions/timeout.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="./img/viewdeep-logo.png" type="image/x-icon">
   <link rel="stylesheet" href="<?php echo URLROOT ?>/css/css.css">
   <!-- <title>ViewDeep E-Receipt | Login</title> -->
   <title><?php echo SITENAME ?></title>
</head>

<body>
   <div class="container">

      <form action="" method="post" class="form" id="form" enctype="multipart/form-data">

         <div class="bank-logo">
            <img src="./img/viewdeep-logo.png" width="130px" height="130px">
            <h5>VIEWDEEP E-RECEIPT GENERATOR</h5>
         </div>
         <div class="form-group">

            <input type="text" name="username" class="form-control" id="username" placeholder="USERNAME"
               spellcheck="false" required autocomplete="off" maxlength="50">
            <small>USERNAME</small>
         </div>
         <div class="form-group">

            <input type="password" name="password" required class="form-control" id="password" placeholder="PASSWORD"
               maxlength="50">
            <small>PASSWORD</small>
         </div>
         <div class="form-group">
            <button type="submit" name="login_btn" class="form-control" id="submit">Login</button>
         </div>
         <div class="form-group">
            <?php if ($loginErr) { ?>
            <div style="color: red;"><?php echo $loginErr; ?></div>
            <?php } ?>
         </div>
         <div id="account">
            <p>Don't have an account? <a href="register.php">Register</a></p>
         </div>
      </form>
   </div>
   <h1><?php echo $data['title']; ?></h1>
</body>

</html>