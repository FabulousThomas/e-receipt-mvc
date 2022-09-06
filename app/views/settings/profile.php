<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="main-content">
   <?php require APPROOT . '/views/inc/nav.php'; ?>

   <main class="bg-secondary text-light">

      <div class="container-fluid mb-5">
         <h2 class="border-bottom"><?php echo $data['title'] ?></h2>
         <h5><?php echo $data['content'] ?></h5>
      </div>

      <div class="container mt-5">
         <?php flashMsg('msg'); ?>
      </div>


   </main>

   <style>
      input {
         color: #f8f9fa ;
      }
   </style>
   <?php require APPROOT . '/views/inc/footer.php' ?>
   <script src="<?php echo URLROOT; ?>/js/currency.js"></script>