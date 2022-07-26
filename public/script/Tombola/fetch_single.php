   
<?php
  // Include db config
  require_once '../libs/CrudClass.php';
    $crud = new CrudClass();

if(isset($_POST["tombola_id"]))
{
  $output = array();
  $uid = [ 'id' => $_POST["tombola_id"]];
  $result = $crud->Select('tombola', [])->Where($uid)
  ->Execute();
 foreach($result as $row) {
    $output["nom"] = $row["nom"];
    $output["dateTirage"] = $row["dateTirage"];
    $output["lot"] = $row["lot"];
    $output["IdUser"] = $row["IdUser"];
    $output["id"] = $row["id"];
    }
 echo json_encode($output);
}
?>