<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container mt-5">
   <a href="<?php echo URLROOT ?>/pages/index" class="mt-5"><span class="las la-backward"></span> Back</a>
   <div class="row">
      <div class="col-lg-5 col-md-12 mx-auto p-0">
         <div class="card card-body bg-light p-2 mt-5">

            <h4 class="pt-4">Create New User</h4>
            <p>Fill out the form to add new users</p>

            <form action="" method="post" class="form py-4" id="form" enctype="multipart/form-data">

               <div class="form-group mb-3">
                  <input type="text" name="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" placeholder="USERNAME" value="<?php echo $data['username']; ?>" spellcheck="false" autocomplete="off" maxlength="50">
                  <small class="invalid-feedback"><?php echo $data['username_err']; ?></small>
               </div>

               <div class="form-group mb-3">
                  <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" placeholder="EMAIL" value="<?php echo $data['email']; ?>" spellcheck="false" autocomplete="off">
                  <small class="invalid-feedback"><?php echo $data['email_err']; ?></small>
               </div>

               <div class="form-group mb-3">
                  <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" placeholder="PASSWORD" value="<?php echo $data['password']; ?>" maxlength="50">
                  <small class="invalid-feedback"><?php echo $data['password_err']; ?></small>
               </div>

               <div class="row">
                  <div class="col">
                     <button type="submit" name="register_btn" class="btn btn-secondary rounded-0 btn-block" id="submit">Register</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>