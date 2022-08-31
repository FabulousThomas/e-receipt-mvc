   <!-- Edit Modal -->
   <div class="modal fade" id="editReceipt" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content rounded-0 border-dark">
            <div class="modal-header bg-secondary text-light rounded-0">
               <h5 class="modal-title"><span class="las la-edit"></span> Edit Receipt</h5>
               <button type="button" class="close text-white bg-transparent" data-dismiss="modal" aria-label="Close">
                  <span class="las la-times" aria-hidden="true"></span>
               </button>
            </div>
            <div class="modal-body">
               <form action="" method="post" enctype="multipart/form-data">

                  <input type="text" name="userId" id="userId" hidden class="form-control">

                  <div class="form-group mb-2 row">
                     <div class="col-md-6 mb-2">
                        <label for="date" class="mb-0">Date</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                     </div>
                     <div class="col-md-6">
                        <label for="estate" class="mb-0">Estate</label>
                        <?php
                        $options = array('Select option', 'Honour Court', 'Kings Court', 'Eden Pride', 'Distinction');

                        $selected = $options[0];

                        echo '<select class="custom-select" name="estate" id="estate" required>';
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
                        <input type="text" name="received_from" id="received_from" class="form-control" placeholder="Customer's name" required>
                     </div>
                     <div class="col-md-6">
                        <label for="sum_of" class="mb-0">The Sum of</label>
                        <input type="text" name="sum_of" id="sum_of" class="form-control" placeholder="Amount in words" required>
                     </div>
                  </div>

                  <div class="form-group mb-2 row">
                     <div class="col-md-6">
                        <label for="payment_figure" class="mb-0">Payment in figure</label>
                        <input type="text" name="payment_figure" id="payment_figure" class="form-control" placeholder="Amount in figure" required>
                     </div>
                     <div class="col-md-6 mb-2">
                        <label class="d-block">Mode of payment: </label>
                        <label><input type="checkbox" name="payment_mode" id="mode" value="Cheque"> Cheque
                        </label>

                        <label class="ml-3"><input type="checkbox" name="payment_mode" id="mode" value="Bank Transfer">
                           Bank Transfer
                        </label>

                        <label class="ml-3"><input type="checkbox" name="payment_mode" id="mode" value="Cash">
                           Cash
                        </label>
                     </div>
                  </div>

                  <div class="form-group mb-2 row">
                     <div class="col-md-6 mb-2">
                        <label for="payment_for" class="mb-0">Being payment for</label>
                        <input type="text" name="payment_for" id="payment_for" class="form-control" placeholder="Reason for payment" required>
                     </div>
                     <div class="col-md-6">
                        <label for="no_unit" class="mb-0">Number of unit(s)</label>
                        <?php
                        $options = array('Select option', 'Half plot', '1 plot', '2 plots', '3 plots', '4 plots', '5 plots', '6 plots', '7 plots', '8 plots', '9 plots', '10 plots', '11 plots', '12 plots', '13 plots', '14 plots', '15 plots', '16 plots', '17 plots', '18 plots', '19 plots', '20 plots',);

                        $selected = $options[0];

                        echo '<select class="custom-select" name="no_unit" id="no_unit" required>';
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
                        <input type="currency" name="amount_paid" class="form-control" id="amount" placeholder="Amount Paid" required onkeypress="javascript: return event.charCode >= 48 && event.charCode <= 57" onkeyup="getValue();">
                     </div>
                     <div class="col-md-6">
                        <label for="outstanding" class="mb-0">Total Outstanding</label>
                        <input type="currency" name="outstanding" class="form-control" id="outstandings" placeholder="Outstanding payment" onkeypress="javascript: return event.charCode >= 48 && event.charCode <= 57" onkeyup="getValue();">
                     </div>
                  </div>

                  <div class="form-group mb-1 row justify-content-center align-items-center">
                     <div class="col-md-6">
                        <label for="balance" class="mb-0">Balance as today</label>
                        <input type="currency" name="balance" class="form-control" id="balances" placeholder="Auto calculated" onkeyup="getValue();">
                     </div>
                     <div class="col-md-6">
                        <label for="balance" class="mb-0"></label>
                        <button type="submit" name="btnUpdateReceipt" class="btn btn-secondary btn-md btn-block">Update</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>

      </div>
   </div>