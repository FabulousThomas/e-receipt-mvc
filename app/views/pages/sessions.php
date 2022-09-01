<?php
require APPROOT . '/views/inc/header.php';
?>

<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="main-content">
   <?php require APPROOT . '/views/inc/nav.php'; ?>

   <main class="bg-secondary">
      <?php require APPROOT . '/views/inc/cards.php' ?>

      <?php flashMsg('msg'); ?>
      <div class="card bg-dark text-light mt-5">
         <div class="card-header d-flex justify-content-between align-items-center border-bottom">
            <h3>Invoice</h3>

            <form action="" method="post">
               <input type="text" name="search" id="search" class="form-control bg-transparent text-light" placeholder="Search here...">
            </form>

         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table width="100%" class="">
                  <thead class="">
                     <tr>
                        <td>#</td>
                        <td>User Id</td>
                        <td>Username</td>
                        <td>Dates</td>
                     </tr>
                  </thead>
                  <tbody class="">

                     <?php foreach ($data['loginSession'] as $res) : ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                           <input type="text" hidden id="id" value="<?php echo $res->id; ?>">
                        </form>

                        <tr>
                        <td class="name"><?php $i = 1; echo $i++; ?></td>
                           <td class="name"><?php echo $res->user_id ?></td>
                           <td class="name"><?php echo $res->username ?></td>
                           <td class="name"><?php echo $res->date ?></td>

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
                     <?php if (!$data['loginSession']) : ?>
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

   </main>

</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>