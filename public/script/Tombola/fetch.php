<?php
   require_once '../libs/CrudClass.php';
    $crud = new CrudClass();
    $connection = $crud->GetConnection();

    $query = ' SELECT users.name As nomUser, users.id As nomId, tombola.*  FROM users INNER JOIN tombola ON   tombola.IdUser = users.id ';
    $output = array();

if (isset($_POST["search"]["value"]))
    {
    $query .= ' WHERE users.name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR tombola.nom LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR tombola.lot LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR tombola.dateTirage LIKE "%'.$_POST["search"]["value"].'%" ';
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
    $sub_array['nomUser'] = $row["nomUser"];
    $sub_array['nom'] = $row["nom"];
    $sub_array['dateTirage'] = $row["dateTirage"];
    $sub_array['lot'] = $row["lot"];
    
    $sub_array['Action'] = '<button type="submit" name="update" id="'.$row["id"].'" class="btn btn-info btn-sm update rounded-circle"><div class="fa fa-edit"></div> E</button>
    <a name="detail" id="'.$row["id"].'" href="tomboladetail.php?id='.$row["id"].'" class="btn btn-warning btn-sm detail rounded-circle"><i class="fa fa-eye"></i> L</a>
            <button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete rounded-circle"><i class="fa fa-trash"></i> D</button>';
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
   