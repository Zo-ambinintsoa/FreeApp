   
<?php
  // Include db config
  require_once '../libs/CrudClass.php';
    $crud = new CrudClass();

if(isset($_POST["id"]))
{
  $output = array();
  $uid = [ 'billetnum.id' => $_POST["id"]];
  $query = ' SELECT billet.nom AS nombillet , billet.address , billet.telephone , billetnum.* , tombola.nom as nomtombola  FROM billetnum INNER JOIN billet INNER JOIN tombola ON billetnum.idBillet = billet.id AND billetnum.idTombola = tombola.id ';
    $result = $crud->SetQuery($query)
        ->SetOperationType('select')
        ->Where($uid)
        ->Execute();
 foreach($result as $row) {
    $output["id"] = $row["id"];
    $output["nombillet"] = $row["nombillet"];
    $output["address"] = $row["address"];
    $output["telephone"] = $row["telephone"];
    $output["nomtombola"] = $row["nomtombola"];
    $output["idTombola"] = $row["idTombola"];
    $output["No1"] = $row["No1"];
    $output["No2"] = $row["No2"];
    $output["No3"] = $row["No3"];
    $output["No4"] = $row["No4"];
    $output["No5"] = $row["No5"];
    $output["No6"] = $row["No6"];
    $output["No7"] = $row["No7"];
    }
    header('Content-type: application/json');
    echo json_encode($output);
}
?>