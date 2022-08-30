<?php
class Receipts extends Controller
{

   private $pageModel = '';
   public function __construct()
   {
      $this->pageModel = $this->model('Page');
   }

   // =============PREVIEW RECEIPTS===========
   public function preview($id)
   {
      $receipt = $this->pageModel->getReceiptId($id);

      $data = [
         'receipt' => $receipt,
         'title' => 'WELCOME TO PREVIEW PAGE',
         'description' => 'Preview Page',
      ];
      $this->view('receipts/preview', $data);
   }
}
