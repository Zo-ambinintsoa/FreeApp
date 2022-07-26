<?php
    // use \PDO;
    class CrudClass  {
        private string $hostName = 'localhost' ;
        private string $dbName = 'lotoapp';
        private string $userName = "root";
        private string $Password = "";

        // ============================= **************** ============================= //


        private string $Query = "";
        private string $paramName;
        private string $paramValue;
        private string $OperationType;

        // ============================= *********   Iterator Used to Check bad implementation ******* ============================= //


        private int $IterationS = 0;
        private int $IterationI = 0;
        private int $IterationU = 0;
        private int $IterationD = 0;
        private int $IterationSe = 0;
        private int $IterationW = 0;

        public function SetQuery($query)
        {
          $this->Query = $query;
          return $this;
        }
        public function ConcatToQuery($query)
        {
          $this->Query .= $query;
          return $this;
        }
        public function SetOperationType($operationType)
        {
          $this->OperationType = $operationType;
          return $this;
        }

public function GetConnection() {
    $connection = new PDO( 'mysql:host='.$this->hostName. ';dbname='. $this->dbName, $this->userName, $this->Password );
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connection;
}

        // ============================= ********  Insert Generate Query for Insert ******** ============================= //


public function Insert($table){
        $this->Query = "INSERT INTO ".$table." ";
        $this->OperationType = 'insert';
    return $this;
}

public function Data($Data = array()) {
      $loop = 0;
      $this->paramName = " ( ";
      $this->paramValue = " ( ";
    //   formating the array into an SQL Query  
      foreach ($Data as $key => $value) {
        $this->paramName .= $key;
        $this->paramValue .= "'".$value."'"; 
        if  ( $loop < count($Data) -1 ) {
        $this->paramName .=" ,";
        $this->paramValue .=  " ,"; 
          } 
          $loop ++ ;
          
      }
      $this->paramName .= " ) ";
      $this->paramValue .= " ) ";

      $this->Query .= $this->paramName. " VALUES " . $this->paramValue ; 
      return $this; 
}


              // ============================= ******** Generate Query for Update ******** ============================= //


public function Update($table) {   
        $this->Query = " UPDATE ".$table." ";
        $this->OperationType = 'update';
    return $this;
}

public function Set($Data = array()){
        $loop = 0;
        $this->Query .= " SET ";
    //   formating the array into an SQL Query   
      foreach ($Data as $key => $value) {
        $this->Query .= $key . " = '" . $value."'";
        if  ( $loop < count($Data) -1 ) {
                $this->Query .=' , ';
          } 
          $loop ++ ;
      } 
      return $this; 
}
            // ============================= ******** Generate Query For Select ******** ============================= //

public function Select(string $table , array $Data)  {

  $this->OperationType = "select";
   if (!isset($Data) || empty($Data)) {
      $this->Query = 'SELECT * FROM ' .$table;
      return $this;
    }

  $column = "";
  $loop = 0;
  //   formating the array into an SQL Query  
  foreach ($Data as $key ) {
    $column .= $key;
    if ($loop < count($Data) - 1 ) {
      $column .= ", ";
    }
    $loop ++;
  }
      $this->Query = 'SELECT ' . $column .' FROM ' .$table;
  return $this;
}
                    // ============================= ********Generate Query For Delete ******** ============================= //
public function Delete(string $table){
  $this->OperationType = "delete";
  $this->Query = 'DELETE FROM ' .$table;
  return $this;
}


                    // ============================= ********Generate Query For Truncate ******** ============================= //
public function Truncate(string $table){
  $this->OperationType = "truncate";
  $this->Query = 'TRUNCATE ' .$table;
  return $this;
}



public function Where($Data = array()) {
 
  $loop = 0 ;
  if (!isset($Data) || empty($Data)) {
    return $this;
  }
  $this->Query .= " WHERE ";
  //   formating the array into an SQL Query  
  foreach ($Data as $key => $value) {
    $this->Query .= $key. " = '" .$value."'";
    if ($loop < count($Data) - 1 ) {
      $this->Query .=" AND ";
    } 
    $loop ++;   
  }

  return $this;
}


protected function Exec(){
      $stmt = $this->GetConnection()->prepare($this->Query);
      
      if ($stmt->execute()) {
        unset($this->Query);
        if ($this->OperationType == 'insert') {
          //  $stmt->lastInsertId();
          unset($this->OperationType);
           return true;
        } else {
        return true;
      }
    } else {
      unset($this->Query);
       return false; 
      }
}

protected function ExecSelect()
{
  $stmt = $this->GetConnection()->prepare($this->Query);
  $stmt->execute();
  $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
  unset($this->Query);
    return $row;  
}

public function Execute(){
      switch ($this->OperationType) {
        case 'select':
          return $this->ExecSelect();
          break;      
        default:
         return $this->Exec();
          break;
      }
        }
    }   
?>