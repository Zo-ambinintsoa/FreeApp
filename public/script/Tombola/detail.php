   
<?php
  // Include db config
  require_once '../libs/CrudClass.php';
    $crud = new CrudClass();

if(isset($_POST["id"]))
{
    $id =   $_POST["id"];
// $id =   1;
  $output = array();
  $uid = [ 'id' =>  $id ];
  $resultT = $crud->Select('tombola', [])->Where($uid)
  ->Execute();


      $queryN = ' SELECT billetnum.* , users.name AS username , billet.nom AS nombillet FROM billetnum INNER JOIN billet INNER JOIN users ON  billetnum.addedBy = users.id AND billetnum.idBillet = billet.id ';
      $queryB = ' SELECT billet.* ,users.name AS username FROM billet INNER JOIN users ON  billet.addedBy = users.id ';


    $uib = [ 'billetnum.idTombola' => $id ];
    $resultN = $crud->SetQuery($queryN)
      ->SetOperationType('select')->Where($uib)
      ->Execute();
    $uid = [ 'billet.id' =>  $id ];
    $resultB = $crud->SetQuery($queryB)
        ->SetOperationType('select')->Where($uid)
        ->Execute();


    $countb = count($resultB);
    $countn = count($resultN);

    $Ncount = ['billet' => $countb , 'num' => $countn];

$output['tombola'] = $resultT ;

$output['billet'] = $resultB ;

$output['numero'] = $resultN ;

$output['count'] = $Ncount ;

    header('Content-type: application/json');
    echo json_encode($output);
}
?>