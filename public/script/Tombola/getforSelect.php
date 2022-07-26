   
<?php
  // Include db config
$crud = new CrudClass();
  $output = array();
  $result = $crud->Select('tombola', ['id' , 'nom'])
  ->Execute();
 foreach($result as $row) {
    $output["text"] = $row["nom"];
    $output["value"] = $row["id"];
    }
?>