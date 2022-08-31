<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/connection.php';
?>

<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="main-content">
   <?php require APPROOT . '/views/inc/nav.php'; ?>

   <main class="bg-secondary">
      <?php require APPROOT . '/views/inc/cards.php' ?>

      <?php flashMsg('msg'); ?>
      <div class="card bg-dark text-light mt-5">
         <div class="card-header d-flex justify-content-between align-items-center border-bottom">
            <h3>Recent</h3>

            <a class="btn btn-secondary text-uppercase border-secondary text-light btn-sm" type="button" data-toggle="modal" data-target="#createReceipt">Add Receipt <span class="las la-plus"> </span></a>

         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table width="100%" class="">
                  <thead class="">
                     <tr>
                        <td>Serial No.</td>
                        <td>User Id</td>
                        <td>Dates</td>
                        <td>Customers</td>
                        <td>Amounts</td>
                     </tr>
                  </thead>
                  <tbody class="">

                     <?php foreach ($data['receipt'] as $res) : ?>

                        <form action="" method="POST" enctype="multipart/form-data">
                           <input type="text" hidden id="id" value="<?php echo $res->id; ?>">
                        </form>

                        <tr>
                           <td class="name"><?php echo $res->serial_no ?></td>
                           <td class="name"><?php echo $res->user_id ?></td>
                           <td class="name"><?php echo $res->date ?></td>
                           <td class="name"><?php echo $res->received_from ?></td>
                           <td class="name"><?php echo $res->amount_paid ?></td>
                           <td class="name" hidden><?php echo $res->estate ?></td>
                           <td class="name" hidden><?php echo $res->sum_of ?></td>
                           <td class="name" hidden><?php echo $res->payment_mode ?></td>
                           <td class="name" hidden><?php echo $res->payment_for ?></td>
                           <td class="name" hidden><?php echo $res->no_unit ?></td>
                           <td class="name" hidden><?php echo $res->amount_paid ?></td>
                           <td class="name" hidden><?php echo $res->outstanding ?></td>
                           <td class="name" hidden><?php echo $res->balance ?></td>

                           <td>
                              <div class="dropdown text-dark">
                                 <a class="btn btn-secondary text-light rounded-1 dropdown-toggle py-1" type="button" data-toggle="dropdown" style="font-size: .8rem;">Action</a>

                                 <div class="dropdown-menu shadow py-1" style="font-size: .9rem;">

                                    <a class="dropdown-item editReceipt" type="button">Edit</a>

                                    <form action="<?php echo URLROOT ?>/pages/delete/<?php echo $res->id ?>" method="POST" enctype="multipart/form-data">

                                       <input type="submit" title="Delete <?php echo $res->id; ?>" class="dropdown-item" value="Delete">
                                    </form>
                                    <a class="dropdown-item" href="<?php echo URLROOT ?>/receipts/preview/<?php echo $res->id ?>" target="_blank">View</a>
                                 </div>
                              </div>
                           </td>

                        </tr>
                     <?php endforeach ?>
                     <?php if (!$data['receipt']) : ?>
                        <tr>
                           <td class="text-center" colspan="6">No record found</td>
                        </tr>
                     <?php endif; ?>
                  </tbody>

               </table>
            </div>
         </div>
         <!-- Card-body END -->
      </div>
      <div class="text-center">
         <a class="btn btn-dark btn-block" href="<?php echo URLROOT ?>/pages/invoice">See all</a>
      </div>

   </main>

   <!-- Modal -->
   <div class="modal fade" data-backdrop="static" id="createReceipt" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content rounded-0 border-dark">
            <div class="modal-header bg-secondary text-light rounded-0">
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
                        <label for="received_from" class="mb-0">Received From</label>
                        <input type="text" name="received_from" class="form-control" placeholder="Customer's name" required>
                     </div>
                     <div class="col-md-6">
                        <label for="sum_of" class="mb-0">The Sum of</label>
                        <input type="text" name="sum_of" class="form-control" placeholder="Amount in words" required>
                     </div>
                  </div>

                  <div class="form-group mb-2 row">
                     <div class="col-md-6">
                        <label for="payment_figure" class="mb-0">Payment in figure</label>
                        <input type="text" name="payment_figure" class="form-control" placeholder="Amount in figure" required>
                     </div>
                     <div class="col-md-6 mb-2">
                        <label class="d-block">Mode of payment: </label>
                        <label><input type="checkbox" name="payment_mode" class="" value="Cheque"> Cheque
                        </label>

                        <label class="ml-3"><input type="checkbox" name="payment_mode" class="" value="Bank Transfer">
                           Bank Transfer
                        </label>

                        <label class="ml-3"><input type="checkbox" name="payment_mode" class="" value="Cash">
                           Cash
                        </label>
                     </div>
                  </div>

                  <div class="form-group mb-2 row">
                     <div class="col-md-6 mb-2">
                        <label for="payment_for" class="mb-0">Being payment for</label>
                        <input type="text" name="payment_for" class="form-control" placeholder="Reason for payment" required>
                     </div>
                     <div class="col-md-6">
                        <label for="no_unit" class="mb-0">Number of unit(s)</label>
                        <?php
                        $options = array('Select option', 'Half plot', '1 plot', '2 plots', '3 plots', '4 plots', '5 plots', '6 plots', '7 plots', '8 plots', '9 plots', '10 plots', '11 plots', '12 plots', '13 plots', '14 plots', '15 plots', '16 plots', '17 plots', '18 plots', '19 plots', '20 plots',);

                        $selected = $options[0];

                        echo '<select class="custom-select" name="no_unit" required>';
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
                        <input type="text" name="amount_paid" class="form-control" id="amount_paid" placeholder="Amount Paid" required onkeypress="javascript: return event.charCode >= 48 && event.charCode <= 57" onkeyup="getValue();">
                     </div>
                     <div class="col-md-6">
                        <label for="outstanding" class="mb-0">Total Outstanding</label>
                        <input type="text" name="outstanding" class="form-control" id="total_outstanding" placeholder="Outstanding balance" required onkeypress="javascript: return event.charCode >= 48 && event.charCode <= 57" onkeyup="getValue();">
                     </div>
                  </div>

                  <div class="form-group mb-1 row justify-content-center align-items-center">
                     <div class="col-md-6">
                        <label for="balance" class="mb-0">Balance as today</label>
                        <input type="text" name="balance" class="form-control" id="balance" placeholder="Auto calculated" onkeypress="javascript: return event.charCode >= 48 && event.charCode <= 57" onkeyup="getValue();" disabled>
                     </div>
                     <div class="col-md-6">
                        <label for="btnCreateReceipt" class="mb-0"></label>
                        <button type="submit" name="btnCreateReceipt" class="btn btn-secondary btn-md btn-block">Create</button>
                     </div>
                  </div>

            </div>
            </form>
         </div>

      </div>
   </div>

   <?php require_once APPROOT . '/views/inc/edit.php'; ?>

</div>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>

<script>
   $(document).ready(function() {
      $('.editReceipt').on('click', function() {
         $('#editReceipt').modal('show');

         $tr = $(this).closest("tr");
         var data = $tr.children("td").map(function() {
            return $(this).text();
         }).get();

         // console.log(data);
         $('#userId').val(data[1]);
         $('#date').val(data[2]);
         $('#received_from').val(data[3]);
         $('#payment_figure').val(data[4]);
         $('#estate').val(data[5]);
         $('#sum_of').val(data[6]);
         $('#mode').val(data[7]);
         $('#payment_for').val(data[8]);
         $('#no_unit').val(data[9]);
         $('#amount').val(data[10]);
         $('#outstandings').val(data[11]);
         $('#balances').val(data[12]);

      });

   });
</script>