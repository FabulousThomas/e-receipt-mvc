<?php APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT .'/views/inc/sidebar.php'; ?>

<div class="main-content">
   <header>
      <h2>
         <label for="nav-toggle">
            <span class="las la-bars"></span>
         </label> <span class="name">Dashboard</span>
      </h2>

      <div class="user-wrapper">
         <span class="las la-user"></span>
         <div>
            <h4><?php echo $data['username'] ?></h4>
            <!-- <small>Admin</small> -->
         </div>
         <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
      </div>
   </header>

   <main>
      <!-- <?php require APPROOT . '/views/inc/cards.php' ?> -->

      <div class="recent-grid">
         <div class="projects">
            <div class="card">
               <div class="card-header">
                  <h3>Invoice</h3>

                  <!-- <form action="./invoice.php"> -->
                  <button>Create Receipt <span class="las la-plus"> </span></button>
                  <!-- </form> -->
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table width="100%">
                        <thead>
                           <tr>
                              <td>Serial No.</td>
                              <td>User Id</td>
                              <td>Dates</td>
                              <td>Customers</td>
                              <td>Amounts</td>
                              <!-- <td>Users</td> -->
                              <td>Edit</td>
                              <td>Delete</td>
                              <td>View</td>
                           </tr>
                        </thead>
                        <tbody>

                           <?php foreach ($result_limit as $res) { ?>
                              <form action="" method="POST" enctype="multipart/form-data">
                                 <input type="text" hidden id="id" value="<?php echo $res['id']; ?>">
                              </form>

                              <tr>
                                 <td class="name"><?php echo $res['serial_no'] ?></td>
                                 <td class="name"><?php echo $res['user_id'] ?></td>
                                 <td class="name"><?php echo $res['date'] ?></td>
                                 <td class="name"><?php echo $res['received_from'] ?></td>
                                 <td class="name">NGN <?php echo $res['amount_paid'] ?></td>
                                 <!-- <td class="name"><?php echo $res['username'] ?></td> -->
                                 <td><a href="./update.php?id=<?php echo $res['id'] ?>"><span class="las la-edit" id="las"></span></a></td>
                                 <td>
                                    <form method="POST" enctype="multipart/form-data">
                                       <input type="text" hidden name="id" value="<?php echo $res['id']; ?>">
                                       <button name="delete_btn" style="border: none; background: transparent;"><span class="las la-trash" id="las"></span></button>
                                    </form>
                                 </td>
                                 <td><a href="./preview.php?id=<?php echo $res['id'] ?>" target="_blank"><span class="las la-clipboard-list" id="las"></span></a></td>
                              </tr>
                           <?php } ?>
                        </tbody>

                     </table>
                  </div>
               </div>
               <!-- Card-body END -->
            </div>
         </div>

      </div>
   </main>
</div>
<?php APPROOT . '/views/inc/footer.php'; ?>