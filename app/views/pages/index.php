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

            <div class="dropdown open">
               <a class="btn text-uppercase border-primary text-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php if (isset($_SESSION['user_id'])) : ?>
                     <?php echo $_SESSION['user_username'] ?>
                  <?php endif; ?>
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
                  <a class="btn btn-primary text-uppercase border-primary text-white btn-sm" type="button" data-toggle="modal" data-target="#createReceipt">Add Receipt <span class="las la-plus"> </span></a>
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

   <!-- Modal -->
   <div class="modal fade" data-backdrop="static" id="createReceipt" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content rounded-0 border-primary">
            <div class="modal-header bg-primary text-light rounded-0">
               <h5 class="modal-title"><span class="las la-receipt"></span> Create New Receipt</h5>
               <button type="button" class="close text-white bg-transparent" data-dismiss="modal" aria-label="Close">
                  <span class="las la-times" aria-hidden="true"></span>
               </button>
            </div>
            <div class="modal-body">
               <form action="<?php echo URLROOT; ?>/pages/index" method="post" enctype="multipart/form-data">

                  <div class="form-group mb-2 row">
                     <div class="col-md-6 mb-2">
                        <label for="date" class="mb-0">Date</label>
                        <input type="date" name="date" class="form-control" required>
                     </div>
                     <div class="col-md-6">
                        <label for="estate" class="mb-0">Estate</label>
                        <?php
                        $options = array('Select option', 'Honour Court', 'Kings Court', 'Eden Pride', 'Distinction');

                        $selected = $options[0];

                        echo '<select class="custom-select" name="estate" required>';
                        foreach ($options as $opt) {
                           if ($selected === $opt) {
                              echo '<option disabled selected value="' . $opt . '">' . $opt . '</option>';
                           } else {
                              echo '<option value="' . $opt . '">' . $opt . '</option>';
                           }
                        }
                        echo '</select>';
                        ?>
                     </div>
                  </div>

                  <div class="form-group mb-2 row">
                     <div class="col-md-6 mb-2">
                        <label for="from" class="mb-0">Received From</label>
                        <input type="text" name="from" class="form-control" placeholder="Customer's name" required>
                     </div>
                     <div class="col-md-6">
                        <label for="sum" class="mb-0">The Sum of</label>
                        <input type="text" name="sum" class="form-control" placeholder="Amount in words" required>
                     </div>
                  </div>

                  <div class="form-group mb-2 row">
                     <div class="col-md-6">
                        <label for="payment_fig" class="mb-0">Payment in figure</label>
                        <input type="text" name="payment_fig" class="form-control" placeholder="Amount in figure" required>
                     </div>
                     <div class="col-md-6 mb-2">
                        <label class="d-block">Mode of payment: </label>
                        <label><input type="checkbox" name="payment_mode" class="" id="mode" value="Cheque" checked> Cheque
                        </label>

                        <label class="ml-3"><input type="checkbox" name="payment_mode" class="" id="mode" value="Bank Transfer">
                           Bank Transfer
                        </label>

                        <label class="ml-3"><input type="checkbox" name="payment_mode" class="" id="mode" value="Cash">
                           Cash
                        </label>
                     </div>
                  </div>

                  <div class="form-group mb-2 row">
                     <div class="col-md-6 mb-2">
                        <label for="payment_for" class="mb-0">Being payment for</label>
                        <input type="text" name="from" class="form-control" placeholder="Reason for payment" required>
                     </div>
                     <div class="col-md-6">
                        <label for="unit" class="mb-0">Number of unit(s)</label>
                        <?php
                        $options = array('Select option', 'Half plot', '1 plot', '2 plots', '3 plots', '4 plots', '5 plots', '6 plots', '7 plots', '8 plots', '9 plots', '10 plots', '11 plots', '12 plots', '13 plots', '14 plots', '15 plots', '16 plots', '17 plots', '18 plots', '19 plots', '20 plots',);

                        $selected = $options[0];

                        echo '<select class="custom-select" name="unit" required>';
                        foreach ($options as $opt) {
                           if ($selected === $opt) {
                              echo '<option disabled selected value="' . $opt . '">' . $opt . '</option>';
                           } else {
                              echo '<option value="' . $opt . '">' . $opt . '</option>';
                           }
                        }
                        echo '</select>';
                        ?>
                     </div>
                  </div>

                  <div class="form-group mb-2 row">
                     <div class="col-md-6 mb-2">
                        <label for="amount_paid" class="mb-0">Amount paid</label>
                        <input type="currency" name="amount_paid" class="form-control" id="amount_paid" placeholder="Amount Paid" required onkeypress="javascript: return event.charCode >= 48 && event.charCode <= 57" onkeyup="getValue();">
                     </div>
                     <div class="col-md-6">
                        <label for="total_outstanding" class="mb-0">Total Outstanding</label>
                        <input type="currency" name="total_outstanding" class="form-control" id="outstanding" placeholder="Outstanding payment" onkeypress="javascript: return event.charCode >= 48 && event.charCode <= 57" onkeyup="getValue();">
                     </div>
                  </div>

                  <div class="form-group mb-1 row justify-content-center align-items-center">
                     <div class="col-md-6">
                        <label for="balance" class="mb-0">Balance as today</label>
                        <input type="currency" name="balance" class="form-control" id="balance" placeholder="Auto calculated" onkeyup="getValue();">
                     </div>
                     <div class="col-md-6">
                        <label for="balance" class="mb-0"></label>
                        <button type="submit" class="btn btn-primary btn-md btn-block">Create</button>
                     </div>
                  </div>

            </div>
            </form>
         </div>

      </div>
   </div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>