<?php
   require_once '../libs/CrudClass.php';
    $crud = new CrudClass();
    $data = [
        'id' => trim($_POST['id']),
    ];

    $result = $crud->Delete('billet')->Where($data);
    if ($result->Execute()) {
            $data = [
        'idBillet' => trim($_POST['id']),
        ];
            $result1 = $crud->Delete('billetnum')->Where($data);
            echo('Billet Deleted');
        };