<?php
   require_once '../libs/CrudClass.php';
    $crud = new CrudClass();
    $data = [
        'id' => trim($_POST['id']),
    ];  

        $result = $crud->Select('billetnum' , [])->Where($data)
        ->Execute();
        $idbillet = $result[0]['idBillet'];
   
        $result1 = $crud->Delete('billetnum')->Where($data);
        if ($result1->Execute()) {
        $result = $crud->Select('billetnum' , [])->Where(['idBillet' => $idbillet])
        ->Execute();
            if (count($result)<1) {
            $crud->Delete('billet')->Where(['id'=>$idbillet])->Execute();
            } 
            echo('Numero supprimer');
        };
       