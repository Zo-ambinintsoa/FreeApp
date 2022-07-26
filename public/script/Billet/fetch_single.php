   
<?php
  // Include db config
  require_once '../libs/CrudClass.php';
    $crud = new CrudClass();

if(isset($_POST["billet_id"]))
{
  $output = array();
  $uid = [ 'id' => $_POST["billet_id"]];
  $result = $crud->Select('billet', [])->Where($uid)
  ->Execute();
 foreach($result as $row) {
    $output["nom"] = $row["nom"];
    $output["address"] = $row["address"];
    $output["telephone"] = $row["telephone"];
    $output["idTombola"] = $row["idTombola"];
    $output["id"] = $row["id"];
    }
 echo json_encode($output);
}
?>