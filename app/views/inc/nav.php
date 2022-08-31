<header class="bg-dark text-light">
      <h2>
         <label for="nav-toggle" class="text-light">
            <span class="las la-bars"></span>
         </label> <span class="name text-light">Dashboard</span>
      </h2>

      <div class="user-wrapper">
         <span class="las la-user text-light border-light"></span>
         <div>

            <div class="dropdown open">
               <a class="btn text-uppercase border-ligh text-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php if (isset($_SESSION['user_id'])) : ?>
                     <?php echo $_SESSION['user_username'] ?>
                  <?php endif; ?>
               </a>
               <div class="dropdown-menu bg-light border-1 rounded-0">
                  <a class="dropdown-item" type="button" href="#"><span class="las la-user-circle border-0 rounded-0"></span> Add New User</a>
                  <a class="dropdown-item" type="button" href="#"><span class="las la-cog border-0 rounded-0"></span> Settings</a>
                  <a class="dropdown-item text-danger border-top" href="<?php echo URLROOT; ?>/users/logout"><span class="las la-power-off border-0 rounded-0"></span> Logout</a>
               </div>
            </div>

         </div>
      </div>
   </header>