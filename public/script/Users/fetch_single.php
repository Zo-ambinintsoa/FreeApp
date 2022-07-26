   
<?php
  // Include db config
  require_once '../libs/CrudClass.php';
    $crud = new CrudClass();

if(isset($_POST["user_id"]))
{
  $output = array();
  $uid = [ 'id' => $_POST["user_id"]];
  $result = $crud->Select('users', [])->Where($uid)
  ->Execute();
 foreach($result as $row) {
    $output["email"] = $row["email"];
    $output["name"] = $row["name"];
    $output["isAdmin"] = $row["isAdmin"];
    $output["addedBy"] = $row["addedBy"];
    $output["quota"] = $row["quota"];
    $output["BilletLafo"] = $row["BilletLafo"];
    }
 echo json_encode($output);
}
?>