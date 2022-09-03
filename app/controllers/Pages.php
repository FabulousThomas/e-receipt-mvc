<?php
class Pages extends Controller
{
   private $pageModel = '';
   public function __construct()
   {
      // Redirects to login page if user is not logged in
      if (!isLoggedIn()) {
         redirect('users/login');
      }
      $this->pageModel = $this->model('Page');
   }

   public function index()
   {
      $receiptLimit = $this->pageModel->getReceiptLimit();

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         if (isset($_POST['btnCreateReceipt'])) {
            // Sanitize input
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
               'date' => trim($_POST['date']),
               'estate' => trim($_POST['estate']),
               'received_from' => trim($_POST['received_from']),
               'sum_of' => trim($_POST['sum_of']),
               'payment_figure' => trim($_POST['payment_figure']),
               'payment_mode' => trim($_POST['payment_mode']),
               'payment_for' => trim($_POST['payment_for']),
               'no_unit' => trim($_POST['no_unit']),
               'amount_paid' => trim($_POST['amount_paid']),
               'outstanding' => trim($_POST['outstanding']),
               'balance' => trim($_POST['balance']),
            ];

            if ($this->pageModel->addReceipts($data)) {
               flashMsg('msg', '<strong>Success!</strong> Receipt created');
               redirect('pages/index');
            } else {
               die('Failed to create');
            }
         }
      }

      $data = [
         'receipt' => $receiptLimit,
         'title' => 'WELCOME TO THE INDEX PAGE',
         'description' => 'Home Page',
      ];
      $this->view('pages/index', $data);
   }

   // ==============ABOUT PAGE===================
   public function about()
   {
      $data = [
         'title' => 'WELCOME TO ABOUT PAGE',
      ];
      $this->view('pages/about', $data);
   }

   // ==============INVOICE PAGE================
   public function invoice()
   {
      $receipt = $this->pageModel->getAllReceipt();
      $data = [
         'receipt' => $receipt,
         'title' => 'WELCOME TO INVOICE PAGE',
         'description' => 'Invoice Page',
      ];
      $this->view('pages/invoice', $data);
   }

   // ===============PROFILE PAGE===============
   public function profile()
   {
      $data = [
         'title' => 'WELCOME TO PROFILE PAGE',
         'description' => 'Profile Page',
      ];
      $this->view('pages/profile', $data);
   }

   // ================SESSION PAGE=============
   public function sessions()
   {
      $sessions = $this->pageModel->getLoginSessions();
      $data = [
         'loginSession' => $sessions,
         'title' => 'WELCOME TO SESSIONS PAGE',
         'description' => 'Sessions Page',
      ];
      $this->view('pages/sessions', $data);
   }

   // ==============SHARING PAGE===============
   public function sharing()
   {
      $data = [
         'title' => 'WELCOME TO SHARING PAGE',
         'description' => 'Sharing Page',
      ];
      $this->view('pages/sharing', $data);
   }

   // ==============DELETE=================
   public function delete($id)
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         if ($this->pageModel->deleteReceipts($id)) {
            flashMsg('msg', 'Receipt deleted', 'alert alert-danger');
            redirect('pages/index');
         } else {
            die('Failed to delete');
         }
      }
   }

   public function deleteLoginSessions($id)
   {
      if ($this->pageModel->deleteSession($id)) {
         flashMsg('msg', 'Session deleted', 'alert alert-danger');
         redirect('pages/sessions');
      } else {
         die('Failed to delete');
      }
   }
}
