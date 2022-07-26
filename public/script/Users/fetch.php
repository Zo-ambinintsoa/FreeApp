<?php
   require_once '../libs/CrudClass.php';
    $crud = new CrudClass();
    $connection = $crud->GetConnection();

    $query = ' ';
    $output = array();

if (isset($_POST["search"]["value"]))
    {
    $query .= ' WHERE name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= ' OR email LIKE "%'.$_POST["search"]["value"].'%" ';
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
    $result = $crud->Select('users' , [])
        ->ConcatToQuery($query)  
        ->Execute();
    $data = array();
    $filtered_rows = count($result);
foreach($result as $row)
    {
    $sub_array = array();
    $sub_array['id'] = $row["id"];
    $sub_array['name'] = $row["name"];
    $sub_array['email'] = $row["email"];
     
    if ($row['isAdmin'] == 1) {
        $sub_array['isAdmin'] = 'Admin' ;
    } else {
        $sub_array['isAdmin'] = 'Employer' ;
    }
    
    $sub_array['Action'] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-info btn-sm update"><i class="fa fa-edit"></i> E</button>
                            <button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> D</button>
                            <a href="profile.php?id='.$row["id"].'" class="btn btn-success btn-sm rounded-circle"><i class="fa fa-list"></i> L</a>
                            <a href="affiliate.php?id='.$row["id"].'" class="btn btn-warning btn-sm"><i class="fa fa-list"></i> A</a>
                            ';
        if ($row["isConfirmed"] == 0) {
          $sub_array['Action'] .= '<button type="button" name="confirm" id="'.$row["id"].'" class="btn btn-light btn-sm confirm"><i class="fa fa-check"></i> C</button>';  
        } else {
          $sub_array['Action'] .= '<button type="button" name="unconfirm" id="'.$row["id"].'" class="btn btn-danger btn-sm confirm"><i class="fa fa-times"></i> C</button>';    
        }
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
   