<?php
   require_once '../libs/CrudClass.php';
    $crud = new CrudClass();
    $connection = $crud->GetConnection();

    $query = ' SELECT billet.nom AS nomprop ,billetnum.* , tombola.nom as nomtombola  FROM billetnum INNER JOIN billet INNER JOIN tombola ON billetnum.idBillet = billet.id AND billetnum.idTombola = tombola.id ';
    $output = array();

if (isset($_POST["search"]["value"]))
    {
        $query .= ' WHERE tombola.nom LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .= ' OR billet.nom LIKE "%'.$_POST["search"]["value"].'%" ';
    // $query .= '  users.name LIKE "%'.$_POST["search"]["value"].'%" ';
    // $query .= ' OR billet.address LIKE "%'.$_POST["search"]["value"].'%" ';
    // $query .= ' OR billet.telephone LIKE "%'.$_POST["search"]["value"].'%" ';
        }
if (isset($_POST["order"]))
    {
    $query .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
else
    {
    $query .= ' ORDER BY id DESC ';
        }
    if($_POST["length"] != -1)
    {
        $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
    $result = $crud->SetQuery($query)
        ->SetOperationType('select')
        ->Execute();
    $data = array();
    $filtered_rows = count($result);
foreach($result as $row)
    {
    $sub_array = array();
    $sub_array['id'] = $row["id"];
    $sub_array['nomprop'] = $row["nomprop"];
    $sub_array['nomtombola'] = $row["nomtombola"];
    $sub_array['No1'] = $row["No1"];      
    $sub_array['No2'] = $row["No2"];      
    $sub_array['No3'] = $row["No3"];      
    $sub_array['No4'] = $row["No4"];      
    $sub_array['No5'] = $row["No5"];      
    $sub_array['No6'] = $row["No6"];      
    $sub_array['No7'] = $row["No7"];      
    $sub_array['Action'] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-info btn-sm updatenum"><i class="fa fa-edit"></i> E</button>
        <button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm deletenum"><i class="fa fa-trash"></i> D</button>';
    $data[] = $sub_array;
    }

$output = array(
    "draw"    => 	intval($_POST["draw"]),
    "recordsTotal"  =>  $filtered_rows,
    "recordsFiltered" => $filtered_rows,
    "data"    => $data
);
echo json_encode($output);
?>
   