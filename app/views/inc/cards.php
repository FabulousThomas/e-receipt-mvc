<div class="cards">
   <div class="card-single bg-dark text-light">
      <div>
         <?php foreach ($invoice as $co) { ?>
            <h1><?php echo $co['invoice'] ?></h1>
         <?php } ?>
         <span>Customers</span>
      </div>
      <div>
         <span class="las la-users text-light"></span>
      </div>
   </div>

   <div class="card-single bg-dark text-light">
      <div>
         <?php foreach ($invoice as $in) { ?>
            <h1><?php echo $in['invoice'] ?></h1>
         <?php } ?>
         <span>Invoice</span>
      </div>
      <div>
         <span class="las la-clipboard-list text-light"></span>
      </div>
   </div>

   <div class="card-single bg-dark text-light">
      <div>
         <?php foreach ($users as $user) { ?>
            <h1><?php echo $user['counts'] ?></h1>
         <?php } ?>
         <span>Users</span>
      </div>
      <div>
         <span class="las la-user-circle text-light"></span>
      </div>
   </div>

   <div class="card-single bg-light text-dark">
      <div>
         <?php foreach ($outstanding as $out) { ?>
            <h1><sup>NGN</sup> <?php echo $out['total_out'] ?></h1>
         <?php } ?>

         <span>Outstanding</span>
      </div>
      <div>
         <!-- <span class="lab la-google-wallet"></span> -->
      </div>
   </div>

   <div class="card-single bg-light text-dark">
      <div>
         <?php foreach ($total as $to) { ?>
            <h1><sup>NGN</sup> <?php echo $to['total'] ?></h1>
         <?php } ?>

         <span>Total Income</span>
      </div>
      <div>
         <!-- <span class="lab la-google-walle"></span> -->
      </div>
   </div>
</div>