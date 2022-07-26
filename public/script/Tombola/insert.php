<?php
   require_once '../libs/CrudClass.php';
    $crud = new CrudClass();
    if(isset($_POST["operation"]) 
    // && $_SESSION['userId'] 
    )  {

    switch ($_POST["operation"]) {
        case 'Add':
            $data = [
                'nom' => trim($_POST['nom']),
                'dateTirage' => trim($_POST['datetirage']),
                // 'IdUser' => trim($_SESSION['userId']),
                'lot' => trim($_POST['lot']),
            ];
                $result = $crud->Insert('tombola')->Data($data);
                if ($result->Execute()) {
                    echo('tombola Created');
                }
            break;
        case 'Edit':
            $Tid = trim($_POST['tombolaId']);
            $data = [
                'nom' => trim($_POST['nom']),
                'dateTirage' => trim($_POST['datetirage']),
                'lot' => trim($_POST['lot']),
            ];
                $result = $crud->Update('tombola')->Set($data)->Where(['id' => $Tid]);
                    if ($result->Execute()) {
                        echo('tombola Mis a jour');
                    }            
            break;        
        default:
            echo('tombola Updated');
            break;
    }
        }