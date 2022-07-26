<?php
   require_once '../libs/CrudClass.php';
    $crud = new CrudClass();
    $data = [
        'id' => trim($_POST['id']),
    ];
        $result = $crud->Delete('users')->Where($data);
        if ($result->Execute()) {
            echo('utilisateur supprimer');
        };
       