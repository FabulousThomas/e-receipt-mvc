<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="main-content">
   <?php require APPROOT . '/views/inc/nav.php'; ?>

   <main class="bg-secondary text-l">

      <div class="container mb-5">

         <div class="row">
            <div class="col-md-12 col-lg-8 m-auto">
               <form action="" method="post" class="form text-light" id="form" enctype="multipart/form-data">
                  <h2 class="text-center my-4">SALES VALUE</h2>

                  <div class="form-group">
                     <label for="description" class="m-0">Sharing Description</label>
                    <input type="text" name="description" id="" class="form-control" placeholder="SHARING DESCRIPTION" required>
                  </div>

                  <div class="form-group">
                  <label for="amount" class="m-0">Sharing Amount</label>
                     <input type="currency" name="amount" class="form-control text-light" id="sales-input" placeholder="ENTER VALUE" spellcheck="false" required autocomplete="off" onkeyup="sharePercentage(this.value);" onkeypress="javascript: return event.charCode >= 48 && event.charCode <= 57">
                  </div>
                  <!-- ======================== -->
                  <p class="text-cente">Sales Commission Share</p>
                  <div class="row">
                     <div class="col-md-6 form-group">
                        <label class="m-0">Direct Commission<span>(17%)</span></label>
                        <input type="currency" name="dircom" readonly class="form-control" id="dircom" placeholder="0" required>
                     </div>

                     <div class="col-md-6 form-group">
                        <label class="m-0">1st Level Commission<span>(2%)</span></label>
                        <input type="currency" name="level-one" readonly class="form-control" id="level-one" placeholder="0">
                     </div>

                     <div class="col-md-6 form-group">
                        <label class="m-0">2nd Level Commission<span>(1%)</span></label>
                        <input type="currency" name="level-two" readonly class="form-control" id="level-two" placeholder="0">
                     </div>
                  </div>
                  <!-- ======================== -->
                  <p>Loan Repayment Account</p>
                  <div class="row">
                     <div class="col-md-6 form-group">
                        <label class="m-0">Business Re-Investment<span>(30%)</span></label>
                        <input type="currency" name="business-invest" readonly class="form-control" id="business-invest" placeholder="0">
                     </div>

                     <div class="col-md-6 form-group">
                        <label class="m-0">Office Operational Cost<span>(10%)</span></label>
                        <input type="currency" name="office-cost" readonly class="form-control" id="office-cost" placeholder="0">
                     </div>

                     <div class="col-md-6 form-group">
                        <label class="m-0">Business Savings<span>(5%)</span></label>
                        <input type="currency" name="business-savings" readonly class="form-control" id="business-savings" placeholder="0">
                     </div>

                     <div class="col-md-6 form-group">
                        <label class="m-0">Directors Share<span>(2.5%)</span></label>
                        <input type="currency" name="director-share" readonly class="form-control" id="director-share" placeholder="0">
                     </div>
                  </div>
                  <!-- =============================== -->
                  <p>Management Sharing (32.5%)</p>
                  <div class="row align-items-center">
                     <div class="col-md-6 form-group">
                        <label class="m-0">Chief Executive Officer<span>(17%)</span></label>
                        <input type="currency" name="ceo" readonly class="form-control" id="ceo" placeholder="0">
                     </div>

                     <div class="col-md-6 form-group">
                        <label class="m-0">General Manager<span>(4.5%)</span></label>
                        <input type="currency" name="gm" readonly class="form-control" id="gm" placeholder="0">
                     </div>

                     <div class="col-md-6 form-group">
                        <label class="m-0">Managing Director<span>(11%)</span></label>
                        <input type="currency" name="md" readonly class="form-control" id="md" placeholder="0">
                     </div>

                     <div class="col-md-6 form-group">
                        <label class="m-0"></label>
                        <button type="submit" name="share-btn" class="btn btn-dark form-control">Save Data</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>


      </div>

      <div class="card bg-dark text-light">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Shares</h3>

            <div>
               <input type="text" name="search" id="search" class="form-control bg-transparent text-light" placeholder="Search here...">
            </div>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table width="100%" id="table">
                  <thead>
                     <tr>
                        <td>Id</td>
                        <td>Date</td>
                        <td>Amount</td>
                        <td>Dir Comm</td>
                        <td>1st Level</td>
                        <td>2nd Level</td>
                        <td>Bus Re-In</td>
                        <td>Office Opera</td>
                        <td>Bus Sav</td>
                        <td>Dir Share</td>
                        <td>CEO</td>
                        <td>General Man</td>
                        <td>Managing Dir</td>
                     </tr>
                  </thead>
                  <tbody>

                     <?php foreach ($data['sharing'] as $res) { ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                           <input type="text" hidden id="id" value="<?php echo $res->share_id; ?>">
                        </form>
                        <tr>
                           <td><?php echo $res->share_id ?></td>
                           <td><?php echo $res->date ?></td>
                           <td><?php echo $res->amount ?></td>
                           <td><?php echo $res->direct_com ?></td>
                           <td><?php echo $res->level_one ?></td>
                           <td><?php echo $res->level_two ?></td>
                           <td><?php echo $res->business_invest; ?></td>
                           <td><?php echo $res->office_cost; ?></td>
                           <td><?php echo $res->business_savings; ?></td>
                           <td><?php echo $res->director_share; ?></td>
                           <td><?php echo $res->ceo; ?></td>
                           <td><?php echo $res->general_man; ?></td>
                           <td><?php echo $res->managing_direct; ?></td>
                        </tr>
                     <?php } ?>
                     <?php if (!$data['sharing']) : ?>
                        <tr>
                           <td class="text-center" colspan="13">No record found</td>
                        </tr>
                     <?php endif; ?>
                  </tbody>

               </table>
            </div>
         </div>
         <!-- Card-body END -->
      </div>
   </main>

   <style>
      input {
         color: #f8f9fa !important;
      }
   </style>
   <?php require APPROOT . '/views/inc/footer.php' ?>
   <script src="<?php echo URLROOT; ?>/js/currency.js"></script>