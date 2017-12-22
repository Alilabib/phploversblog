<?php
    
class DBConnect{
    public $host    =DB_HOST;
    public $username=DB_USER;
    public $password=DB_PASS;
    public $db_name =DB_NAME;

    public $link;
    public $error;

    /*
     * Class constractor 
     */
    public function __construct(){
        //Calling Connect Function
      $this->connect();
          
      }
      /*
       * Private connect function it's private because we wil use jsut in this class .     
       */

      private function connect(){
          $this->link = new mysqli($this->host,$this->username,$this->password,$this->db_name);
          if(!$this->link){
              $this->error ="Can't connect To Database ".$this->link->connect_error;
              return false;
          }
      }

      /*
      * Select Method
      */


      public function select($query){
        $result = $this->link->query($query) or die('Can\'t Show This Data Form DataBase'.$this->link->error.__LINE__);
        if($result->num_rows >0){
            return $result;
        }else{
            return false;
        }
      }

      /*
      * insert Data To DataBase
      */

      public function insert($query){
          $insert_row = $this->link->query($query) or die('Can\'t ADD This to database '.$this->link->error.__LINE__);
          if($insert_row){
              header("Location:index.php?msg=".urlencode ('Data ADD Successfully'));
              exit();
          }else{
            die('Can\'t ADD This Data To Data Base'.$this->link->error.__LINE__);
          } 
      }

      /*
      * UpDate database record
      */

      public function update($query){
        $update_row = $this->link->query($query)or die('Can\'t Update This Post check Database Connection '.$this->link->error.__LINE__);
        if($update_row){
            header("Location:index.php?msg=".urlencode('Data Editing Successfully Well Done !'));
            exit();
        }else{
            die('Can\'t Edit this Post data please Check Connection if you Can'.$this->link->error.__LINE__);
        }
      }
      /*
      * Delete Database Record 
      */
      public function delete($query){
        $delete_row = $this->link->query($query) or die ('Can\'t Delete this record From Data base please check connection error '.$this->link->error.__LINE__);
        if($delete_row){
            header("Location:index.php?msg=".urlencode('Record Deleted Successfully'));
            exit();
        }else{
            die("Can't Delete this Record please Check Connection First for this error ".$this->link->error.__LINE__);
        }
      }

   } 

?>