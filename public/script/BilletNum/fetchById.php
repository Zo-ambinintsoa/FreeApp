<?php 

require_once '../libs/CrudClass.php';

    $crud = new CrudClass();
    if ($_POST['billet_id']) {
        $id = ['idBillet' => 
        trim($_POST['billet_id'])
    ];
            $result = $crud->Select('billetnum' , [])->Where($id)
        ->Execute();
    $data = array();
    $filtered_rows = count($result);
    if ($filtered_rows > 0) {

       foreach($result as $row) {
    $sub_array = array();
    $sub_array['id'] = $row["id"];
    $sub_array['No1'] = $row["No1"];
    $sub_array['No2'] = $row["No2"];
    $sub_array['No3'] = $row["No3"];
    $sub_array['No4'] = $row["No4"];
    $sub_array['No5'] = $row["No5"];
    $sub_array['No6'] = $row["No6"];
    $sub_array['No7'] = $row["No7"];
    $sub_array['No8'] = $row["No8"];
    $sub_array['No9'] = $row["No9"];
    $sub_array['No10'] = $row["No10"];
    $sub_array['prix'] = $row["prix"];
    $sub_array['Action'] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-info btn-sm updatenum rounded-circle"><i class="fa fa-edit"></i> E</button>
        <button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm deletenum rounded-circle"><i class="fa fa-trash"></i> D</button>';
    $data[] = $sub_array;
    }

    header('Content-type: application/json');
    echo json_encode($data);

    } else {
        echo "<h4>No Record Found</h4>";
    }
}
