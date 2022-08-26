<?php require_once 'connection.php'; ?>
<div class="cards">
   <div class="card-single">
      <div>
         <?php foreach ($invoice as $co) { ?>
            <h1><?php echo $co['invoice'] ?></h1>
         <?php } ?>
         <span>Customers</span>
      </div>
      <div>
         <span class="las la-users"></span>
      </div>
   </div>

   <div class="card-single">
      <div>
         <?php foreach ($invoice as $in) { ?>
            <h1><?php echo $in['invoice'] ?></h1>
         <?php } ?>
         <span>Invoice</span>
      </div>
      <div>
         <span class="las la-clipboard-list"></span>
      </div>
   </div>

   <div class="card-single">
      <div>
         <?php foreach ($users as $user) { ?>
            <h1><?php echo $user['counts'] ?></h1>
         <?php } ?>
         <span>Users</span>
      </div>
      <div>
         <span class="las la-user-circle"></span>
      </div>
   </div>

   <div class="card-single main-color">
      <div>
         <?php foreach ($outstanding as $out) { ?>
            <h1>NGN <?php echo $out['total_out'] ?></h1>
         <?php } ?>

         <span>Outstanding</span>
      </div>
      <div>
         <span class="lab la-google-wallet"></span>
      </div>
   </div>

   <div class="card-single">
      <div>
         <?php foreach ($total as $to) { ?>
            <h1>NGN <?php echo $to['total'] ?></h1>
         <?php } ?>

         <span>Total Income</span>
      </div>
      <div>
         <span class="lab la-google-wallet"></span>
      </div>
   </div>
</div>