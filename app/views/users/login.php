<?php

// session_start();
// require_once "./functions/connection.php";
// require_once "./functions/function.php";
// require_once "./functions/login.php";
// include "./functions/timeout.php";

?>

<?php require APPROOT . '/views/inc/header.php' ?>

<body>
   <div class="container">

   <div class="row">
      <div class="col-lg-5 col-md-12 mx-auto p-0">
         <div class="card card-body bg-light p-2 mt-5">
         <form action="" method="post" class="form py-4" id="form" enctype="multipart/form-data">
         <div class="bank-logo pt-0 pb-3">
            <img src="<?php echo URLROOT; ?>/img/viewdeep-logo.png" width="130px" height="130px">
            <h5>VIEWDEEP E-RECEIPT GENERATOR</h5>
         </div>
            <?php flashMsg('register_success'); ?>
         <div class="form-group">
            <input type="text" name="username" class="form-control <?php echo (empty($data['username'])) ? 'is-invalid' : ''; ?>" placeholder="USERNAME" value="<?php echo $data['username']; ?>" spellcheck="false" autocomplete="off" maxlength="50">
            <small class="invalid-feedback"><?php echo $data['username_err']; ?></small>
         </div>
         <div class="form-group">
            <input type="password" name="password" class="form-control <?php echo (empty($data['password'])) ? 'is-invalid' : ''; ?>" placeholder="PASSWORD" value="<?php echo $data['password']; ?>" maxlength="50">
            <small class="invalid-feedback"><?php echo $data['password_err']; ?></small>
         </div>
         <div class="row">
            <div class="col">
            <button type="submit" name="login_btn" class="btn btn-primary rounded-0 btn-block" id="submit">Login</button>
            </div>
            <div class="col">
           <a href="<?php echo URLROOT;?>/users/register" class="btn btn-light rounded-0" style="font-size: .9rem ;">No account? Register</a>
            </div>
         </div>
         
      </form>
         </div>
         
      </div>
   </div>
      
   </div>

   <?php require APPROOT . '/views/inc/footer.php' ?>
</body>

</html>