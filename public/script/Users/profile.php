   
<?php
  // Include db config
  require_once '../libs/CrudClass.php';
    $crud = new CrudClass();

if(isset($_POST["id"]))
{
    $id =   $_POST["id"];
        // $id =   2;

    $output = array();
  
  $ui = [ 'id' => $id ];
  
  
  $queryB = ' SELECT billet.* , tombola.nom AS nomtombola FROM billet INNER JOIN tombola ON  billet.idTombola = tombola.id ';
  $queryN = ' SELECT billetnum.* , tombola.nom AS nomtombola , billet.nom AS nombillet FROM billetnum INNER JOIN billet INNER JOIN tombola ON  billetnum.idTombola = tombola.id AND billetnum.idBillet = billet.id ';
    $uib = [ 'billet.addedBy' => $id ];
    $resultB = $crud->SetQuery($queryB)
      ->SetOperationType('select')->Where($uib)
      ->Execute();
    $uib = [ 'billetnum.addedBy' => $id ];
    $resultN = $crud->SetQuery($queryN)
      ->SetOperationType('select')->Where($uib)
      ->Execute();
    $resultU = $crud->Select('users', [])->Where($ui)
    ->Execute();

    $countn = count($resultN);
    $countb = count($resultB);

    $Ncount = ['num' => $countn , 'billet' => $countb];


$output['user'] = $resultU ;

$output['billet'] = $resultB ;

$output['numero'] = $resultN ;

$output['count'] = $Ncount ;

    header('Content-type: application/json');
    echo json_encode($output);
}
?>