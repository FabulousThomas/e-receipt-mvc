<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
   <link rel="shortcut icon" href="<?php echo URLROOT ?>/img/viewdeep-logo.png" type="image/x-icon">

   <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
   <link rel="shortcut icon" href="./img/viewdeep-logo.png" type="image/x-icon">

   <link rel="stylesheet" href="<?php echo URLROOT ?>/css/preview.css" />
   <title><?php echo SITENAME ?></title>
</head>

<body>

   <!-- ALL CODES IN HERE -->
   <div class="container" style="margin-top: 9rem;">
      <div id="receipt">
         <div class="letter-head">
            <img src="<?php echo URLROOT ?>/img/letter-head.PNG" alt="">
         </div>

         <div class="form-container">
            <form method="POST" id="form" class="form" enctype="multipart/form-data">
               <input type="text" id="id" value="<?php echo $data['receipt']->id ?>" hidden>
               <div class="form-group group">
                  <div>
                     <div class="form-group">
                        <label>Date:</label>
                        <input type="text" name="date" class="form-control" id="date" value="<?php echo $data['receipt']->date ?>" readonly>
                     </div>
                  </div>

                  <div class="select">
                     <div class="form-group">
                        <label>Estate:</label>
                        <input type="text" name="estate" class="form-control" id="estate" value="<?php echo $data['receipt']->estate ?>" readonly>
                     </div>
                  </div>
               </div>

               <div class="form-group">
                  <label>Received From:</label>
                  <input type="text" name="received_from" class="form-control" id="from" value="<?php echo $data['receipt']->received_from ?>" readonly>
               </div>

               <div class=" form-group">
                  <label>The sum of:</label>
                  <input type="text" name="sum_of" class="form-control" id="sum" value="<?php echo $data['receipt']->sum_of ?>" readonly>
               </div>

               <div class="form-group">
                  <label>Mode of payment:</label>
                  <input type="text" name="payment_mode" class="form-control" id="sum" value="<?php echo $data['receipt']->payment_mode ?>" readonly>
               </div>

               <div class="form-group">
                  <label>Being payment for:</label>
                  <input type="text" name="payment_for" class="form-control" id="for" value="<?php echo $data['receipt']->payment_for ?>" readonly>
               </div>

               <div class="form-group">
                  <label>Payment in figure</label>
                  <input type="text" name="payment_figure" class="form-control" id="figure" value="<?php echo $data['receipt']->payment_figure ?>" readonly>
               </div>

               <div class="form-group">
                  <label>Number of unit(s):</label>
                  <input type="text" name="no_unit" class="form-control" id="figure" value="<?php echo $data['receipt']->no_unit ?>" readonly>
               </div>

               <div class="form-group">
                  <label for="amount_paid">Amount paid:</label>
                  <input type="text" name="amount_paid" class="form-control" id="amount_paid" value="<?php echo $data['receipt']->amount_paid ?>" readonly>
               </div>

               <div class="form-group">
                  <label for="total_outstanding">Total Outstanding:</label>
                  <input type="text" name="total_outstanding" class="form-control" id="total_outstanding" value="<?php echo $data['receipt']->outstanding ?>" readonly>
               </div>

               <div class="form-group">
                  <label for="balance">Balance as today:</label>
                  <input type="text" name="balance" class="form-control" id="balance" value="<?php echo $data['receipt']->balance ?>" readonly>
               </div>

            </form>
            <p style="text-align: right; margin-top: 2rem; color: red; font-size: 1.2rem; ">Serial Number:
               <?php echo $data['receipt']->serial_no ?>
            </p>
         </div>

         <div class="letter-footer">
            <img src="<?php echo URLROOT ?>/img/letter-footer.PNG" alt="">
         </div>

      </div>

      <div class="share-print">
         <div>
            <button id="printpdf" onclick="printpdf();">Print <span class="las la-print" id="las "></span></button>
         </div>
         <div>
            <button onclick="document.location.href = '<?php echo URLROOT; ?>/receipts/preview/<?php echo $data['receipt']->id; ?>'" download="Receipt.pdf" id="printpdf">Download <span class="las la-download" id="las "></span></button>
         </div>
         <div>
            <p style="display: flex; justify-content: center; align-items: center;">Share |
               <a href="#" class="btn-facebook" target="blank"><i class="lab la-facebook"></i></a>
               <a href="#" class="btn-twitter" target="blank"><i class="lab la-twitter"></i></a>
               <a href="#" class="btn-whatsapp" target="blank"><i class="lab la-whatsapp"></i></a>
            </p>
         </div>
      </div>
   </div>

   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="<?php echo URLROOT ?>/js/main.js"></script>
</body>

</html>