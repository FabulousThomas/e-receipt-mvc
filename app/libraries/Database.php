<?php
class Database
{
   private $host = DB_HOST;
   private $user = DB_USER;
   private $pass = DB_PASS;
   private $dbname = DB_NAME;

   private $dbh;
   private $error;
   private $stmt;


   public function __construct()
   {
      // Set DSN (Database String Name)
      $dsn = 'mysql:host=' . $this->host . '; dbname=' . $this->dbname;
      $options = array(
         PDO::ATTR_PERSISTENT => true,
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      );

      try {
         $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
      } catch (PDOException $e) {
         $this->error = $e->getMessage();
         echo $this->error;
      }
   }

   // Bind Values
   public function bind($param, $value, $type = null)
   {
      if (is_null($type)) {
         switch (true) {
            case is_int($value):
               $type = PDO::PARAM_INT;
               break;
            case is_bool($value):
               $type = PDO::PARAM_BOOL;
               break;
            case is_null($value):
               $type = PDO::PARAM_NULL;
               break;
            default:
               $type = PDO::PARAM_STR;
         }
      }
      $this->stmt->bindValue($param, $value, $type);
   }

   // Prepare sql querry
   public function query($sql)
   {
      $this->stmt = $this->dbh->prepare($sql);
   }
   // Execute sql querry
   public function execute()
   {
      return $this->stmt->execute();
   }
   // Get resultSet as array of object
   public function resultSet()
   {
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
   }
   // Get Single Set as object
   public function singleSet()
   {
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
   }

   // Get rowCount
   public function rowCount()
   {
      return $this->stmt->rowCount();
   }
}
