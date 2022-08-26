<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/sidebar.php'; ?>

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

            <!-- <h4><?php echo $data['username'] ?></h4> -->
            <!-- <small>Admin</small> -->
            <div class="dropdown open">
               <a class="btn text-uppercase border-primary text-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Admin
               </a>
               <div class="dropdown-menu">
                  <a class="dropdown-item text-danger" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
               </div>
            </div>
         </div>
      </div>
   </header>

   <main>
      <?php require APPROOT . '/views/inc/cards.php' ?>

      <div class="recent-grid">
         <div class="projects">
            <div class="card">
               <div class="card-header">
                  <h3>Invoice</h3>

                  <!-- <form action="./invoice.php"> -->
                  <a class="btn btn-primary text-uppercase border-primary text-white btn-sm" type="button">Add Receipt <span class="las la-plus"> </span></a>
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
                              <!-- <td>View</td> -->
                           </tr>
                        </thead>
                        <tbody>

                           <?php foreach ($data['receipt'] as $res) : ?>
                              <form action="" method="POST" enctype="multipart/form-data">
                                 <input type="text" hidden id="id" value="<?php echo $res->id; ?>">
                              </form>

                              <tr>
                                 <td class="name"><?php echo $res->serial_no ?></td>
                                 <td class="name"><?php echo $res->user_id ?></td>
                                 <td class="name"><?php echo $res->date ?></td>
                                 <td class="name"><?php echo $res->received_from ?></td>
                                 <td class="name">NGN <?php echo $res->amount_paid ?></td>

                                 <td>
                                    <div class="dropdown text-dark">
                                       <button class="btn btn-light text-dark dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: .8rem;">Action</button>

                                       <div class="dropdown-menu shadow py-1" style="font-size: .9rem;">

                                          <a class="dropdown-item" href="./update.php?id=<?php echo $res->id ?>">Edit</a>

                                          <form action="<?php echo URLROOT ?>/pages/delete/<?php echo $res->id ?>" method="POST" enctype="multipart/form-data">

                                             <input type="submit" class="dropdown-item" value="Delete">
                                          </form>
                                          <a class="dropdown-item" href="./preview.php?id=<?php echo $res->id ?>" target="_blank">View</a>
                                       </div>
                                    </div>
                                 </td>

                              </tr>
                           <?php endforeach ?>
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
<?php require APPROOT . '/views/inc/footer.php'; ?>