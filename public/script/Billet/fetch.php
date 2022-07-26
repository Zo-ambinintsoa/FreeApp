<?php
   require_once '../libs/CrudClass.php';
    $crud = new CrudClass();
    $connection = $crud->GetConnection();

    $query = ' SELECT billet.* ,users.name AS username , tombola.nom as nomtombola  FROM billet INNER JOIN tombola INNER JOIN users ON  billet.addedBy = users.id AND billet.idTombola = tombola.id ';
    $output = array();

if (isset($_POST["search"]["value"]))
    {
    $query .= ' WHERE users.name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR tombola.nom LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR billet.nom LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR billet.address LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR billet.telephone LIKE "%'.$_POST["search"]["value"].'%" ';
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
    $sub_array['nom'] = $row["nom"];
    $sub_array['nomtombola'] = $row["nomtombola"];
    $sub_array['username'] = $row["username"];
    $sub_array['address'] = $row["address"];    
    $sub_array['telephone'] = $row["telephone"];      
    $sub_array['Action'] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-info btn-sm update"><i class="fa fa-edit"></i> E</button>
        <button type="button" name="listB" id="'.$row["id"].'" class="btn btn-warning btn-sm listB"><i class="fa fa-list"></i> L</button>
        <a name="detail" id="'.$row["id"].'" href="billetdetail.php?id='.$row["id"].'" class="btn btn-warning btn-sm detail"><i class="fa fa-eye"></i> L</a>
        <button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> D</button>';
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
   