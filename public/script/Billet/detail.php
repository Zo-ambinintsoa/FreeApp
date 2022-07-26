   
<?php
  // Include db config
  require_once '../libs/CrudClass.php';
    $crud = new CrudClass();

if(isset($_POST["id"]))
{
    $id =   $_POST["id"];
    
  $output = array();
  
  $uid = [ 'billet.id' =>  $id ];
  
  $query = ' SELECT billet.* ,users.name AS username FROM billet INNER JOIN users ON  billet.addedBy = users.id ';
  $resultB = $crud->SetQuery($query)
      ->SetOperationType('select')->Where($uid)
      ->Execute();
      
        $idT = [ 'id' => $resultB[0]['idTombola']];
      
    
  $resultT = $crud->Select('tombola', [])->Where($idT)
  ->Execute();

    $uib = [ 'idBillet' => $id];

  $resultN = $crud->Select('billetnum', [])->Where($uib)
  ->Execute();

    $countn = count($resultN);

    $Ncount = ['num' => $countn];

$output['tombola'] = $resultT ;

$output['billet'] = $resultB ;

$output['numero'] = $resultN ;

$output['count'] = $Ncount ;

    header('Content-type: application/json');
    echo json_encode($output);
}
?>