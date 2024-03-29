<header class="bg-dark text-light">
   <h2>
      <label for="nav-toggle" class="text-light">
         <span class="las la-bars"></span>
      </label> <span class="name text-light">Dashboard</span>
   </h2>

   <div class="user-wrapper">
      <div>

         <div class="dropdown open">
            <a class="btn text-uppercase border-ligh text-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <?php if (isset($_SESSION['user_id'])) : ?>
                  <span class="las la-user text-light"></span>
                  <?php echo $_SESSION['user_username'] ?>
               <?php endif; ?>
            </a>
            <div class="dropdown-menu bg-light border-1 rounded-0">
               <!-- <a class="dropdown-item" type="button" href="<?php echo URLROOT; ?>/settings/profile"><span class="las la-user border-0 rounded-0"></span> Profile</a> -->
               <a class="dropdown-item" type="button" href="<?php echo URLROOT; ?>/users/register"><span class="las la-users border-0 rounded-0"></span> Add Users</a>
               <!-- <a class="dropdown-item" type="button" href="<?php echo URLROOT; ?>/settings/setting"><span class="las la-cog border-0 rounded-0"></span> Settings</a> -->
               <a class="dropdown-item text-danger border-top" href="<?php echo URLROOT; ?>/users/logout"><span class="las la-power-off border-0 rounded-0"></span> Logout</a>
            </div>
         </div>

      </div>
   </div>
</header>